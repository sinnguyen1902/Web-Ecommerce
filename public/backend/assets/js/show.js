
const socket = io();
 socket.emit("test", "please"); 

socket.on("student_list", (msg) => {
        //document.getElementById("test_code").innerHTML = msg;   




     let data_str = "";
    msg_object = JSON.parse(msg);
    for (let i = 0; i < msg_object.length; i++) {
        let row = "<tr>" + "<td>" + msg_object[i].mssv + "</td>"
            + "<td>" + msg_object[i].name + "</td>"
            + "<td>" + msg_object[i].email + "</td>"
            + "<td>" + msg_object[i].dien_thoai + "</td>"
            + "<td>" + msg_object[i].dia_chi + "</td>"
            + "</tr>"
        data_str += row;
    };
    document.getElementById("tb").innerHTML = data_str;  

});