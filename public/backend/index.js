//npm install express socket.io request

const express = require('express');
const app = express();
const server = require('http').Server(app);

const io = require('socket.io')(server);

const request = require('request');
const port = process.env.PORT || 8000;


app.use(express.static('assets/'));


app.get('/', (req, res) => {
    res.sendFile(__dirname + '/assets/html/registration.html');
});

app.get('/test', (req, res) => {
    res.sendFile(__dirname + '/assets/html/show.html');
});

app.get('/loc', (req, res) => {
    res.sendFile(__dirname + '/assets/html/loc.html');
});

io.on('connection', (socket) => {
    console.log('a user connected');

    socket.on("ms1", (arg) => {
        console.log(arg); // world
    });


    socket.on("save_info", (arg) => {
        console.log(arg); // in thông tin nhận được từ client
        let info = JSON.parse(arg);

        var mysql = require('mysql');

        var con = mysql.createConnection({
            host: "localhost",
            user: "root",
            password: "",
            database: "info_db"
        });
        con.connect(function (err) {
            if (err) throw err;
            console.log("Connected!");
            var sql = "INSERT INTO students (mssv, name, email, dien_thoai, dia_chi) VALUES ('" + info.mssv + "','" + info.name + "','" + info.email + "','" + info.dien_thoai + "','" + info.dia_chi + "')";
            con.query(sql, function (err, result) {
                if (err) throw err;
                console.log("1 record inserted");
            });
        });
    });

    socket.on("test", (arg) => {
        console.log(arg); // world

        var mysql = require('mysql');

        var con = mysql.createConnection({
          host: "localhost",
          user: "root",
          password: "",
          database: "info_db"
        });
        
        var result_object = [];
        var result_str;
        
        con.connect(function(err) {
            if (err) throw err;
            //Select all customers and return the result object:
            con.query("SELECT * FROM students", function (err, result, fields) {
              if (err) throw err;
             /*  console.log(result); */
             result.forEach(element => {
               result_object.push({"mssv":element.mssv,"name":element.name,"email":element.email,"dien_thoai":element.dien_thoai,"dia_chi":element.dia_chi})
             });
             result_str = JSON.stringify(result_object);
            /*  console.log(result_str); */
             socket.emit("student_list",result_str);
            });
          });
        
    });


    //tìm sinh viên
    socket.on("find_student", (tinh) => {
        // console.log(arg);
         var mysql = require('mysql');
 
         var con = mysql.createConnection({
             host: "localhost",
             user: "root",
             password: "",
             database: "info_db"
         });
         
         var result_object = [];
 
         con.connect(function (err) {
             if (err) throw err;

             tinh_f = '%' + tinh + '%';
             
             var sql = 'SELECT * FROM students WHERE dia_chi LIKE ' + mysql.escape(tinh_f); 
             
             
                     con.query(sql, function (err, result) {
                 if (err) throw err;
                 //console.log(result);
                 result.forEach(element => {
                     result_object.push({ "mssv":element.mssv,"name":element.name,"email":element.email,"dien_thoai":element.dien_thoai,"dia_chi":element.dia_chi })
                 });
 
                 socket.emit("find_list", result_object);
             });
         });
 
     });







});


server.listen(port, '127.0.0.1', () => {
    console.log(`Socket.IO server running at http://localhost:${port}/`);
    
});

