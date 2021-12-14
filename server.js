'use strict';

const express = require("express");
const http = require('http');
const socketio = require('socket.io');
const bodyParser = require('body-parser');

const socketEvents = require('./utils/socket');
const routes = require('./utils/routes');
//const config = require('./utils/config'); 
const cors = require('cors');
const corsOptions ={
    origin:'*', 
    credentials:true,            //access-control-allow-credentials:true
    optionSuccessStatus:200
}


class Server {
    constructor() {
        this.port = process.env.PORT || 3018;
        this.host = `localhost`;

        this.app = express();
        this.http = http.Server(this.app);
        //this.socket = socketio(this.http);
    }
    
    appConfig() {
        this.app.use(cors(corsOptions));
        this.app.use(
                bodyParser.json()
                );
        this.app.use(bodyParser.text());
        this.app.use(
                bodyParser.urlencoded({
                    extended: true
                })
                );
    }
    
    includeRoutes(io) {
        new routes(this.app,io).routesConfig();
    }
    includeSocket(io) {
        new socketEvents(io).socketConfig();
    }
    appExecute() {
        this.appConfig();
        
        const server = this.app.listen(this.port, () => {
            console.log(`Listening on http://${this.host}:${this.port}`);
        });
        const io = socketio(server);
        this.includeRoutes(io);
        this.includeSocket(io);
    }

}
const APP = new Server();
APP.appExecute();