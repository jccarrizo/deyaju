/**
 * Real Time chatting app
 * @author Shashank Tiwari
 */
const mysql = require('mysql');

class Db {
    constructor(config) {
        this.connection = mysql.createPool({
            connectionLimit: 100,
            host: 'localhost',
            user: 'root',
            password: 'root',
            database: 'deyaju',
            socketPath: '/Applications/MAMP/tmp/mysql/mysql.sock',
            debug: false,
            charset: 'utf8mb4'

        });
    }
    test() {
        try {
            this.connection.getConnection(function (err, connection) {
                if(connection){
                    console.log('connection: ', connection.state);
                }else{
                    console.log('fail');
                }
            });
        } catch (error) {
            console.error(error);
        }
    }
    query(sql, args) {
        return new Promise((resolve, reject) => {
            this.connection.query(sql, args, (err, rows) => {
                if (err)
                    return reject(err);
                resolve(rows);
            });
        });
    }
    close() {
        return new Promise((resolve, reject) => {
            this.connection.end(err => {
                if (err)
                    return reject(err);
                resolve();
            });
        });
    }
}
module.exports = new Db();