const mysql= require("mysql2/promise");

const db = mysql.createPool({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'tienda',
    port: 3307 // puerto mySql
});

module.exports = db;