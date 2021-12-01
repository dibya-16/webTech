function isValid(){
    var email = document.forms['SForm']['email'].value;
    var username = document.forms['SForm']['username'].value;
    var password = document.forms['SForm']['password'].value;
   
   
    if(email === ""){
    document.getElementById('emailjsE').innerHTML = "*Email empty";
    
    }
    if(username === ""){
    document.getElementById('usernamejsE').innerHTML = "*username empty";
    
    }
    if(password === ""){
    document.getElementById('passwordjsE').innerHTML = "*password empty";
    return false;
    }
    else{
        return true;
    }
    
    }