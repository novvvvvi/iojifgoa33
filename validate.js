$(document).ready(function () {
$("#validate").click(function ()
{   var username = $.trim($('#username').val());
        var password = $.trim($('#password').val());
        $.ajax({
    url:'validate.php',
    type:'POST',
    data:{username: username,password: password},
    success:function(data){
console.log("here");
	if(data=="Yes")
   {

sessionStorage.setItem("loggedin", "Y");
window.location.href = "second.php";
    }
    else
    {
window.location.href = "index.html";
    }     

    }
  });
});});
