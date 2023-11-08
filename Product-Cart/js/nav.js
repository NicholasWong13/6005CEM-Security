$(document).ready(function(){
setTimeout(function(){$("form").removeClass("loading");},2000);	
});


function booking(){
	$("#contact-page").hide();
	$("#billing-page").hide();
	$("#confirmdetails-page").hide();
	$("#booking-page").fadeIn("slow"); 	
	return false;
}
function contact(){
	$("#contactbtn").removeClass("disabled");	
	$("#booking-page").hide();
	$("#billing-page").hide();
	$("#confirmdetails-page").hide();
	$("#contact-page").fadeIn("slow"); 	
return false;
}

function billing(){
$("#billingbtn").removeClass("disabled");	
	$("#booking-page").hide();
	$("#confirmdetails-page").hide();
	$("#contact-page").hide();
	$("#billing-page").fadeIn("slow");

$("#payment-info").html("Confirm the payment of the bus number of seats");
return false;	
	
	
}

function confirmdetails(){
	
$("#confimationbtn").removeClass("disabled");
$("#billing-page").hide();
$("#booking-page").hide();
$("#contact-page").hide();

destination=$("#destination").val();
typeofbus=$("#typeofbus").val();
seats=$("#seats").val();
traveldate=$("#traveldate").val();

amount=$("#amount").val();
code=$("#codebox").val();
paymethod=$("#paymentmethod").val();

fullname=$("#fullname").val();


$("#details").html("<ul><li>TICKET OWNER: "+fullname+"</li><li>DESTINATION: "+destination+"</li><li>DATE OF TRAVEL: "+traveldate+"</li><li>TYPE OF BUS: "+typeofbus+"</li><li>NUMBER OF SEATS: "+seats+"</li><li>AMOUNT PAYING: "+amount+" Via "+paymethod+" Transaction ID: "+code+"</li></ul>");	

$("#confirmdetails-page").fadeIn("slow");
return false;
	
}

function senddata(){
$("#finishbtn").removeClass("disabled");

destination=$("#destination").val();
typeofbus=$("#typeofbus").val();
seats=$("#seats").val();
traveldate=$("#traveldate").val();

fullname=$("#fullname").val();
contact=$("#contact").val();
gender=$("#gender").val();

amount=$("#amount").val();
code=$("#codebox").val();
paymethod=$("#paymentmethod").val();


$("#dynamic").html("<div class='ui text container'><div id='err001' class='ui success icon message'><i class='notched circle loading icon'></i><div class='content'><div class='header'>Please wait....</div><p>We are doing everything for you</p></div></div>");    


$.ajax({
url: "request.php",
type: "POST",
data: "d="+destination+"&tc="+typeofbus+"&s="+seats+"&td="+traveldate+"&f="+fullname+"&c="+contact+"&g="+gender+"&a="+amount+"&code="+code+"&p="+paymethod,
		   success: function(data){    
			if(data=='success'){
  setTimeout(function(){$("#dynamic").html("<div class='ui text container'><div class='ui positive message'> Success! Your tickets are ready. Incase you misplaced your ticket, you can <a>reprint</a> it anytime. <p align='center'><a class='ui button green' href='validate.php?ticket'> Download ticket.</a></p></div></div>");},6000); 			 
			}
			else {

  setTimeout(function(){$("#dynamic").html("<div class='ui text container'><div class='ui negative message'><div class='header'>Sorry Error Processing your request..!</div><div class='ui horizontal divider'>ERROR FEEDBACK</div> "+data+"<br>If you keep seeing this error, <a onclick='location.reload()'>go back</a> or contact our <a href='#0'>Support team</a> for assistance</div></div>");},8000);              
                
			}
		   }});
		

return false;	
}

