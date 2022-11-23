
const socket = io();

function find(){
    let tinh_find = document.getElementById("tinh_find").value;
    socket.emit("find_student", tinh_find);
}

socket.on("find_list", (msg_object) => {  
    let data_str = "";
   // mgs_object = JSON.parse(msg);

    for(let i = 0; i < msg_object.length; i ++) {
        let row = "<tr>" 
        + "<td>" + msg_object[i].mssv + "</td>"
        + "<td>" + msg_object[i].name + "</td>"
        + "<td>" + msg_object[i].email + "</td>"
        + "<td>" + msg_object[i].dien_thoai + "</td>"
        + "<td>" + msg_object[i].dia_chi+ "</td>"
        + "</tr>"
        data_str += row;
    }

    document.getElementById("table_body").innerHTML = data_str;
});