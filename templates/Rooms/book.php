<head>
	<style>
		<?php echo $this->Html->css('book.css',['block'=>true]); ?>
	</style>
</head>
<center>
<div class="container">
	<div class="row">
		<div class="thankyou" style="display: none;">

			<h4>THANKYOU FOR BOOKING!</h4><br>
			<h5>It may take upto 30 minutes for confirmation.</h5><br>
			<h6>Note: If your booking request is cancelled, your money will be refunded back to you soon.</h6>
			
<button class="btn btn-success"><a class="text-white" href="/rooms/homepage"> Home </a></button>
		</div>
		<div class="paymentCont">
						<div class="headingWrap">
								<h3 class="headingTop text-center">Select Your UPI Payment Method</h3>	
								<p class="text-center">Created with bootsrap button and using radio button</p>
						</div>
						<div class="paymentWrap">
							<div class="btn-group paymentBtnGroup btn-group-justified" >
					            <label class="btn paymentMethod">
					            	<div class="method visa"></div>
					                <input type="radio" value="phonepe" name="options"> 
					            </label>
					            <label class="btn paymentMethod">
					            	<div class="method master-card"></div>
					                <input type="radio" value="paytm" name="options"> 
					            </label>
					            <label class="btn paymentMethod">
				            		<div class="method amex"></div>
					                <input type="radio" value="gpay" name="options">
					            </label>
					             <label class="btn paymentMethod">
				             		<div class="method vishwa"></div>
					                <input type="radio" value="amazonpay" name="options"> 
					            </label>
					            <label class="btn paymentMethod">
				            		<div class="method ez-cash"></div>
					                <input type="radio" value="bhimupi" name="options"> 
					            </label>
					         
					        </div>        
						</div>
	<div style="display: none;" name="otherAnswer1" id="otherAnswer1"/> 
		<br><br>
		Please use the below upi id for transaction<br><br>
		<?=$pgdetails->phone?>@ybl
		<br><br><br><br>
		<a href="/rooms/bookingconfirmation/<?=$room->room_id?>">Please Click here, after successfully paying the owner.</a>
	</div>
	<div style="display: none;" name="otherAnswer2" id="otherAnswer2"/> 
		<br><br>
		Please use the below upi id for transaction<br><br>
		<?=$pgdetails->phone?>@paytm
		<br><br><br><br>
		<a href="/rooms/bookingconfirmation/<?=$room->room_id?>">Please Click here, after successfully paying the owner.</a>
	</div>
	<div style="display: none;" name="otherAnswer3" id="otherAnswer3"/> 
		<br><br>
		Please use the below upi id for transaction<br><br>
		<?=$pgdetails->phone?>@okhdfcbank
		<br><br><br><br>
		<a href="/rooms/bookingconfirmation/<?=$room->room_id?>">Please Click here, after successfully paying the owner.</a>
	</div>
	<div style="display: none;" name="otherAnswer4" id="otherAnswer4"/> 
		<br><br>
		Please use the below upi id for transaction<br><br>
		<?=$pgdetails->phone?>@apl
		<br><br><br><br>
		<a href="/rooms/bookingconfirmation/<?=$room->room_id?>">Please Click here, after successfully paying the owner.</a>
	</div>
	<div style="display: none;" name="otherAnswer5" id="otherAnswer5"/> 
		<br><br>
		Please use the below upi id for transaction<br><br>
		<?=$pgdetails->phone?>@bhim
		<br><br><br><br>
		<a href="/rooms/bookingconfirmation/<?=$room->room_id?>">Please Click here, after successfully paying the owner.</a>
	</div>
						<div class="footerNavWrap clearfix">
							<button class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span><a class="text-white" href="/rooms/viewroom/<?=$room->room_id?>"> Go Back</a></button>
							<button class="btn btn-success pull-right btn-fyi"><span class="glyphicon glyphicon-chevron-right"></span><a class="text-white cancel" href="#">Cancel</a></button>
						</div>
					</div>
	</div>
</div>
</center>
<script>
$(document).ready(function(){
	$(".cancel").click(function()
	{
		$("#otherAnswer").slideUp('fast');
	});
$("input[type='radio']").change(function(){
if($(this).val()=="phonepe")
{
	$("#otherAnswer2").slideUp('fast');
	$("#otherAnswer3").slideUp('fast');
	$("#otherAnswer4").slideUp('fast');
	$("#otherAnswer5").slideUp('fast');
	$("#otherAnswer1").slideDown('fast');
}
else if($(this).val()=="paytm")
{	$("#otherAnswer1").slideUp('fast');
	$("#otherAnswer3").slideUp('fast');
	$("#otherAnswer4").slideUp('fast');
	$("#otherAnswer5").slideUp('fast');
	$("#otherAnswer2").slideDown('fast'); 
}
else if($(this).val()=="gpay")
{	$("#otherAnswer2").slideUp('fast');
	$("#otherAnswer1").slideUp('fast');
	$("#otherAnswer4").slideUp('fast');
	$("#otherAnswer5").slideUp('fast');
	$("#otherAnswer3").slideDown('fast');
}
else if($(this).val()=="amazonpay")
{	$("#otherAnswer2").slideUp('fast');
	$("#otherAnswer3").slideUp('fast');
	$("#otherAnswer1").slideUp('fast');
	$("#otherAnswer5").slideUp('fast');
	$("#otherAnswer4").slideDown('fast');
}
else if($(this).val()=="bhimupi")
{	$("#otherAnswer2").slideUp('fast');
	$("#otherAnswer3").slideUp('fast');
	$("#otherAnswer4").slideUp('fast');
	$("#otherAnswer1").slideUp('fast');
	$("#otherAnswer5").slideDown('fast');
}
});
});
</script>

