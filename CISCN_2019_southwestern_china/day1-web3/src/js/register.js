// 检测用户输入的信息是否符合要求，若符合则发送给后端
function beforeSubmit() {

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var password_again = document.getElementById('password_again').value;

    if(username == ""){
        alert("用户名不能为空");
        return false;
    }
    if(password == ""){
        alert("密码不能为空");
        return false;
    }
    if(password_again == ""){
        alert("请再次输入密码");
        return false;
    }
    //确认两次输入的密码相同
    if (password != password_again) {
        alert("两次输入的密码必须相同");
        return false;
    }


    // 创建一个FormData对象，直接把表单传进去  
    var formData = new FormData(document.forms.namedItem("register_form"));

    formData.append('username',username);
    formData.append('password',password);
    formData.append('password_again',password_again);
        
    // 通过jquery发送出去
    $.ajax({
        async:true,
        url: "api/users/register.php",
        type: "POST",
        data: formData,
        processData: false,  // 告诉jQuery不要去处理发送的数据
        contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
        success:function (result) {           //成功回调
             if (result == "0"){
                alert("注册成功");
                window.location.href='index.html';
                return true;
            }
            else {
                alert("该账号已被使用");
                return false;
            }
        }
    }).done(function(resp) {
        //alert('success!');
    }).fail(function(err) {
        alert("网络连接错误");
    });


    return true;

}