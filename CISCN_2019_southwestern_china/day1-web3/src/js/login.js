function beforeSubmit() {

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    if(username == ""){
        alert("用户名不能为空");
        return false;
    }
    else if(password == ""){
        alert("密码不能为空");
        return false;
    }


    // 创建一个FormData对象，直接把表单传进去  
    // var formData = new FormData(document.forms.namedItem("login_form"));
    var formData = new FormData();

    formData.append('username',username);
    formData.append('password',password);

    // 通过jquery发送出去
    $.ajax({
        async:true,
        url: "api/users/login.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false,
        success:function (result) {           //成功回调
            //alert(result);
            if (result == "0"){
                alert("登录成功"+"\n"+"您好，亲爱的"+username+"\n"+"祝您有愉快的一天~");
		        window.location.href='index.html';
                return true;
            }
            else {
                alert("账号或者密码错误");
                return false;
            }
        }
    }).done(function(resp) {
        //alert("登录成功");
    }).fail(function(err) {
        alert("网络连接错误");
    });
    return false;
}
