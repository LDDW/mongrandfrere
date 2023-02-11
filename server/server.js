const express = require('express');
const mysql = require('mysql');

const app = express();

const db = mysql.createConnection({
    host: 'localhost',
    port: '8889',
    user: 'root',
    password: 'root',
    database: 'mongrandfrere',
})

db.connect((err) => {
    if(err){
        console.error(err);
    } else {
        console.info('MYSQL Connected')
    }
});

//route 
app.get('/', (req, res) => {
    res.send('<h1>Home page</h1>')
});

//listen route on port 3000
app.listen(3000, () => {
    console.log('server started on port 3000');
}); 