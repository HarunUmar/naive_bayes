// Preload Images
img1 = new Image(16, 16);  
img1.src="../images/spinner.gif";

img2 = new Image(220, 19);  
img2.src="../images/ajax-loadear.gif";

// When DOM is ready
$(document).ready(function(){


// When the form is submitted
$("#main-login > form").submit(function(){  

// Hide 'Submit' Button
$('#signin_submit').hide();

// Show Gif Spinning Rotator
$('#ajax_loading').show();

// 'this' refers to the current submitted form  
var str = $(this).serialize();  

// -- Start AJAX Call --

$.ajax({  
    type: "POST",
    url: "proses-login.php",  // Send the login info to this page
    data: str,  
    success: function(msg){  
   
$("#main-login").ajaxComplete(function(event, request, settings){  
 
 // Show 'Submit' Button
$('#signin_submit').show();

// Hide Gif Spinning Rotator
$('#ajax_loading').hide();  

 if(msg == 'OK') // LOGIN OK?
 {  
 var login_response = '<div id="logged_in"><br /><br />' +
	 '<div style="width: 350px; float: left; margin-left: 70px;">' + 
	 '<div style="width: 40px; float: left;">' +
	 '<img style="margin: 10px 0px 10px 0px;" align="absmiddle" src="images/loading.gif">' +
	 '</div>' +
	 '<div style="margin: 10px 0px 0px 10px; float: right; width: 300px; color:#000; font-size:15px;">'+ 
	 "Anda Telah berhasil melakukan Login ! <br /> Mohon tunggu beberapa detik untuk proses selanjutnya...<br /><br /><br /><br /></div></div>";  

$('a.modalCloseImg').hide();  

$('#simplemodal-container').css("width","500px");
$('#simplemodal-container').css("height","120px");
 
 $(this).html(login_response); // Refers to 'status'

// After 3 seconds redirect the 
setTimeout('go_to_private_pageadmin()', 3000); 
 }  
 else // ERROR?
 {  
 var login_response = msg;
 $('#login_response').html(login_response);
 }  
      
 });  
   
 }  
   
  });  
  
// -- End AJAX Call --

return false;

}); // end submit event

});

function go_to_private_pageadmin()
{
window.location = 'hal_admin/index.php?main=home'; // Members Area
}
