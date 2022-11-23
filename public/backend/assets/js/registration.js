const socket = io();

function save_info(){
    let mssv_value = document.getElementById("mssv").value;
    let name_value = document.getElementById("name").value;
    let email_value = document.getElementById("email").value;
    let dien_thoai_value = document.getElementById("dien_thoai").value;
    let dia_chi_value = document.getElementById("dia_chi").value;
    let info = {"mssv":mssv_value , "name":name_value, "email":email_value, "dien_thoai":dien_thoai_value, 
        "dia_chi":dia_chi_value};
    let info_str = JSON.stringify(info);
 /*     document.getElementById("test_code").innerHTML = info_str;  */
    socket.emit("save_info", info_str);
    
}