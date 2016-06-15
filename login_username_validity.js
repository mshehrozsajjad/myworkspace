
function validate(query) {
var xmlhttp;
if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else { // for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {

document.getElementById("userStatus").innerHTML = xmlhttp.responseText;
if($("#userStatus").text()==" "){
    $("#userGroup").attr("class","form-group  has-feedback");
    $("#userIcon").attr("class","form-control-feedback");
}
else {
     $("#userGroup").attr("class","form-group has-error  has-feedback");
      $("#userIcon").attr("class","glyphicon glyphicon-remove form-control-feedback");
}
} 

xmlhttp.open("GET", "login-validity.php?query=" + query, false);
xmlhttp.send();
}

//------------------------------------------------------  Signup Function--------------------------------------------//

function validateSignUp(query,field) {
var xmlhttp;
if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else { // for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
    if (field == "user"){
document.getElementById("userStatus").innerHTML = xmlhttp.responseText;
if(($("#userStatus").text() =="Username not available") || ($("#user").val() == "")) {
     $("#userGroup").attr("class","form-group has-error has-feedback");
    $("#userIcon").attr("class","glyphicon glyphicon-remove form-control-feedback");
}
else{
     $("#userGroup").attr("class","form-group has-success   has-feedback");
    $("#userIcon").attr("class","glyphicon glyphicon-ok form-control-feedback");
}
    }
    else if(field == "email"){
 document.getElementById("emailStatus").innerHTML = xmlhttp.responseText;
if(($("#emailStatus").text()=="Email address already registered") || ($("#email").val() == "")){
    $("#emailGroup").attr("class","form-group has-error  has-feedback");
    $("#emailIcon").attr("class","glyphicon glyphicon-remove form-control-feedback");
}
else {
     $("#emailGroup").attr("class","form-group has-success  has-feedback");
     $("#emailIcon").attr("class","glyphicon glyphicon-ok form-control-feedback");
}
        
    }

}
xmlhttp.open("GET", "signup-validity.php?query=" + query+"&field="+field, false);
xmlhttp.send();
}


