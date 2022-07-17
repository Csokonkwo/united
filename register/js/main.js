var errors = [];

function arrayRemove(arr, value) { 
    
    return arr.filter(function(ele){ 
        return ele != value; 
    });
}

function checkLength(x, z){

    if(x.value.length < z ){
        x.style.border= "1px solid red";
    }else{
        x.style.border = "1px solid green";
    }
}


function validatePassword(x){

    if(x.value.length < 6 ){
        x.style.border = "1px solid red";
    }

    if(x.value.length > 5 ){
        x.style.border = "1px solid green";
    }

    if(x.value != document.querySelector(".password").value){
        document.querySelector(".password_label").innerHTML = "Passwords do not match";
        document.querySelector(".password_2_label").innerHTML = "Passwords do not match";
        document.querySelector(".password_label").style.color = "red";
        document.querySelector(".password_2_label").style.color = "red";
    }else{
        document.querySelector(".password_label").innerHTML = "";
        document.querySelector(".password_2_label").innerHTML = "Passwords match";
        document.querySelector(".password_label").style.color = "green";
        document.querySelector(".password_2_label").style.color = "green";
    }

}


function validateReg(x){

    if(document.querySelector(".username").value.length < 4){
        document.querySelector(".username_label").innerHTML = "Username Must be between 4 - 20 characters";
        document.querySelector(".username_label").style.color = "red";
        return false;
    }else{
        document.querySelector(".username_label").innerHTML = "";
        arrayRemove(errors, "username");
    }

    if(document.querySelector(".email").value.length < 4){
        document.querySelector(".email_label").innerHTML = "Please enter a valid email address";
        document.querySelector(".email_label").style.color = "red";
        return false;
    }else{
        document.querySelector(".email_label").innerHTML = "";
    }

    if(document.querySelector(".password").val != document.querySelector(".password_2_label").value){
        document.querySelector(".password_label").innerHTML = "Passwords do not match";
        document.querySelector(".password_2_label").innerHTML = "Passwords do not match";
        return false;
    }else{
        document.querySelector(".password_label").innerHTML = "";
        document.querySelector(".password_2_label").innerHTML = "";
    }
    
    if(document.querySelector(".password").value.length < 6){
        document.querySelector(".password_label").innerHTML = "Password must be atleast 6 characters";
        document.querySelector(".password_label").style.color = "red";
        return false;
    }else{
        document.querySelector(".password_label").innerHTML = "";
    }

}