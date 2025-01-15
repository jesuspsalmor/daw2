const mysql= require("mysql2/promise");

const db = mysql.createPool({
    host: 'localhost',
    user: 'jesus',
    password: '1234',
    database: 'tienda',
    port: 3306 // puerto mySql
});

module.exports = db;