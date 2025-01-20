const mysql= require("mysql2/promise");

const db = mysql.createPool({
    host: 'localhost',
    user: 'pepito',
    password: '123456',
    database: 'tienda',
    port: 3307 // puerto mySql
});

module.exports = db;