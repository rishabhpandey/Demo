function validateform()
{
    var name=document.login.username.value;
    var password=document.login.password.value;
    
    if(name===null||name===""){
        alert("Please enter the username");
        return false;
    }else if(password===null||password===""){
        alert("Please enter password");
    }
}
function validateReg(){
    var name = document.regisration.name.value;
    var age = document.regisration.age.value;
    var phone = document.regisration.phone.value;
    var email = document.regisration.email.value;
    var username = document.regisration.username.value;
    var password = document.regisration.password.value;

    if(name===null||name===""){
        alert("name can't be blank");
        return false;
    }
    if(age===""){
        alert("age can't be blank");
        return false;
    }
    if(phone==="")   {
        alert("phone can't be blank");
        return false;
    }
    if(email===""){
        alert("email can't be blank");
        return false;
    }
    if(username===""){
        alert("username can't be blank");
        return false;
    }
    if(password===""){
        alert("password can't be blank");
        return false;
    }
}

function validateProf(){
    var name = document.profile.name.value;
    var age = document.profile.age.value;
    var phone = document.profile.phone.value;
    var email = document.profile.email.value;
    var username = document.profile.username.value;
    var password = document.profile.password.value;

    if(name===null||name===""){
        alert("name can't be blank");
        return false;
    }
    if(age===""){
        alert("age can't be blank");
        return false;
    }
    if(phone==="")   {
        alert("phone can't be blank");
        return false;
    }
    if(email===""){
        alert("email can't be blank");
        return false;
    }
    if(username===""){
        alert("username can't be blank");
        return false;
    }
    if(password===""){
        alert("password can't be blank");
        return false;
    }
}