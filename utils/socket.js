'use strict';

//const path = require('path');
const helper = require('./helper');
const DB = require('./db');

class Socket {

    constructor(socket) {
        this.io = socket;
        console.log('constructor socketEvents');
        this.db = DB;
        this.db.test()
    }
    count = 0;
    socketEvents() {

        this.io.on('connection', (socket) => {
//            console.log('New user connected...');
            let data = (socket.handshake.query.data).toString();
            let user;
            let id = data.split(',')[0];
            let username = data.split(',')[1];
            //****************************//
            let channel_type = 0;
            socket.on('message-from-client-to-server', (data) => {
                //console.log('mensaje...');
                channel_type = data.channel_type;//privado
                let ch = [id, data.toUserId];
                let channelArray = ch.sort((a, b) => {
                    return a - b;
                });
                let channel = 'private_message' + channelArray[0] + '_' + channelArray[1];
                let userId = data.toUserId;
                let destino = this.userMap.get(userId + '');
                try {
                    if (destino != undefined) {
                        if (destino.getStatus() == 'online') {
                            helper.insertMessages(data).then(value => {
                                this.message(destino.getId(), channel, data);
                            });
                            const result = helper.getMessages(data.fromUserId, userId);
//                            result.then(value => {
//                                message(destino.getId(), channel, data);
//                            });

                        } else {
                            helper.insertMessages(data);
                            console.log('mensaje guardado', userId);
                        }
                    } else {
                        helper.insertMessages(data);
                        //socket.broadcast.emit(channel, data);
                        console.log('destino undefined guardado', userId);
                    }

                } catch (e) {
                    console.log('Error: ', e);
                    //socket.broadcast.emit(channel, data);
                }
                //console.log('Sending to: ', destino);
            });
            socket.on('message-from-public-to-server', (data) => {
                console.log("data: ",data);
//                channel_type = data.channel_type;//publico
                //my_channel
                let channel = '';
                let ch = [];
                let channelArray = [];
                if (data.my_channel != undefined) {
                    channel = data.channel;
                } else {
                    ch = [0, data.toUserId];
                    channelArray = ch.sort((a, b) => {
                        return a - b;
                    });
                    channel = 'public_message' + channelArray[0] + '_' + channelArray[1];
                }
                console.log('channel: ', channel);
                helper.insertMessages(data).then(value => {
                    if(value === null){
                        let error = {
                            error:true,
                            message:'¡Ocurrion un error al registrar el mensaje!'
                        }
                        socket.emit(channel,error);
                    }else{
                        socket.broadcast.emit(channel, data);
                    }
                });
            });
            socket.emit('message-from-server-to-client', 'Hello World!');
            socket.broadcast.emit('user connected');
            //****************************//

        });
    }

    socketConfig() {
        this.io.use(async (socket, next) => {
            let data = (socket.handshake.query.data).toString();
            let user;
            let id = data.split(',')[0];
            let username = data.split(',')[1];
            let annonimusId = this.userMap.size;
            if (id == 0) {
                id = id + '-' + annonimusId;
            }
            if (this.userMap.has(id)) {
                user = this.userMap.get(id);
                user.id = socket.id;
                user.username = username;
            } else {
                let user = new User(socket.id, id, username);
                this.userMap.set(id, user);
            }
            next();
        });

        this.socketEvents();
    }
    userMap = new Map();
    message(userId, event, data) {
        this.io.sockets.to(userId).emit(event, data);
    }
}
function User(socketId, userId, username) {
    this.id = socketId;
    this.id_user = userId;
    this.status = "online";
    this.username = username;
    this.getId = function () {
        return this.id;
    };
    this.getName = function () {
        return this.username;
    };
    this.getStatus = function () {
        return this.status;
    };
    this.setStatus = function (newStatus) {
        this.status = newStatus;
    }
}
module.exports = Socket;