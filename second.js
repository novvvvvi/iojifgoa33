
/**
 * File: js/showhide.js
 * Author: design1online.com, LLC
 * Purpose: toggle the visibility of fields depending on the value of another field
 **/
window.onload = function () {
    var sessionValue = sessionStorage.getItem("loggedin");
if(sessionStorage.getItem("loggedin") === null) {
	window.location.href="index.html";	   
} 
}
$(document).ready(function () {

   toggleFields(); //call this first so we start out with the correct visibility depending on the selected form values
    //this will call our toggleFields function every time the selection value of our underAge field changes
    $("#age").change(function () {
        toggleFields();
    });
        $("#reset").click(function () {
this.disabled=true;
this.value='Sending…';
$.ajax({
    url:'restart.php',
    type:'POST',
    success:function(data){
           window.location.href = "third.php";


    }
  });

    });

$("#ipcon").click(function () {
var newipconfig = $.trim($('#newip').val());
if (/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$|^(([a-zA-Z]|[a-zA-Z][a-zA-Z0-9\-]*[a-zA-Z0-9])\.)*([A-Za-z]|[A-Za-z][A-Za-z0-9\-]*[A-Za-z0-9])$|^\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*$/.test(newipconfig)) {
var dataString = 'newipconfig=' + newipconfig;
this.disabled=true;
this.value='Sending…';
$.ajax({
    url:'ipauth.php',
    type:'POST',
    data: dataString,
    success:function(data){
	window.location.href = "third.php";

    }
  });
}
else
{
 alert("Enter Valid Ip");
}
});

    

   $('#newusepass').click(function() {
	
        if (!$.trim($('#password').val())) {
            alert("textbox value can't be empty");
        }
  if( !$.trim($('#password').val()).match(/^[a-z0-9]*$/)|| $.trim($('#password').val().length) != 8 )
        alert("Invalid Password.Password must 8 alphabet lowercase and number");
else if( !$.trim($('#username').val()).match(/^[a-z]*$/) || $.trim($('#username').val().length) != 7)
        alert("Invalid Username, User name only 7 alphabet lowercase");
    else
    {
this.disabled=true;
this.value='Sending…';
	var username = $.trim($('#username').val());
	var password = $.trim($('#password').val());
        $.ajax({
    url:'newusepass.php',
    type:'POST',
    data:{ username: username, password: password },
    success:function(data){
     window.location.href = "third.php?user="+data;
    }
  });
    }

    });


});

//this toggles the visibility of our parent permission fields depending on the current selected value of the underAge field
function toggleFields() {
    if ($("#age").val() ==1)
    {
        $("#first").show();
        $("#second").hide();
        $("#third").hide();
	$("#user").show();
	$("#ip").hide();
    }
    else if ($("#age").val() ==2)
    {
        $("#second").show();
        $("#first").hide();
        $("#third").hide();
	  $("#user").hide();
        $("#ip").show();
    }
    else
    {
        $("#third").show();
        $("#first").hide();
        $("#second").hide();
	  $("#user").hide();
        $("#ip").show();    
}




}
$('.form-group input').on('focus blur', function (e) {
    $(this).parents('.form-group').toggleClass('active', (e.type === 'focus' || this.value.length > 0));
}).trigger('blur');
