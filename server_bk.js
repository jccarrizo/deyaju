const express = require('express');
const app = express();
const port = process.env.PORT || 3018;
const host = `localhost`;
const helper = require('./utils/helper');

const server = app.listen(port, host, () => {
    console.log(`Listening on http://${host}:${port}`);
});
const io = require('socket.io')(server);

io.on('connection', (socket) => {
    console.log('new user connected...');
    let data = (socket.handshake.query.data).toString();
    let user;
    let id = data.split(',')[0];
    let username = data.split(',')[1];
    
    if (userMap.has(id)) {
        console.log('id: '+id+' existe');
        user = userMap.get(id);
        user.id = socket.id;
        user.username = username;
        console.log('user:',user);
    }else{
        console.log('id: '+id+' no existe');
        userMap.set(id, new User(socket.id,id,username));
    }
    let channel_type = 0;
    socket.on('message-from-client-to-server', (data) => {
        //console.log('mensaje...');
        channel_type = data.channel_type;//privado
        let ch = [id,data.toUserId];
        let channelArray = ch.sort((a, b) => {
            return a - b;
        });
        let channel = 'private_message' + channelArray[0] + '_' +channelArray[1];
        let userId = data.toUserId;
        let destino = userMap.get(userId+'');
        try {
            if(destino != undefined){
                if(destino.getStatus() == 'online'){
                helper.insertMessages(data);
                const result = helper.getMessages(data.fromUserId,userId);
                result.then(value => {
                    message(destino.getId(), channel, data);
                });
                
                }else{
                    helper.insertMessages(data);
                    console.log('mensaje guardado',userId);
                }
            }else{
                helper.insertMessages(data);
                //socket.broadcast.emit(channel, data);
                console.log('destino undefined guardado',userId);
            }
            
        } catch (e) {
            console.log('Error: ',e);
            //socket.broadcast.emit(channel, data);
        }
        //console.log('Sending to: ', destino);
    });
    socket.on('message-from-public-to-server', (data) => {
        channel_type = data.channel_type;//publico
        
        let ch = [data.fromUserId,data.toUserId];
        let channelArray = ch.sort((a, b) => {
            return a - b;
        });
        let channel = 'public_message' + channelArray[0] + '_' +channelArray[1];
        socket.broadcast.emit(channel, data);
        helper.insertMessages(data);
    });
    socket.emit('message-from-server-to-client', 'Hello World!');
    socket.broadcast.emit('user connected');


});
function message(userId, event, data) {
    io.sockets.to(userId).emit(event, data);
}

var userMap = new Map();

function User(socketId,userId,username) {
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