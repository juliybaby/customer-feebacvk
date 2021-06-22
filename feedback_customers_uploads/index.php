<!DOCTYPE html>
<html lang="en">

<head>
 <title><?php include('header_title.php'); echo $header_tit; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="landing page, website design" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>



<style>


/* navigation */


.left-column-all {
    overflow-x: hidden;
    position: fixed;
    z-index: 9999;
    width:50vw;
    height: 100vh;
    background: url(home.jpg) center no-repeat purple;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -ms-background-size: cover;
    -o-background-size: cover;

/*
    margin-top: 0px;
    margin-left: 0px;
    */
}



@media screen and (max-width: 1440px) {
.left-column-all {
width:100vw;
width:100vh;

}

}
	
.right-column-all {
 margin-left:40vw;
/*
margin-left:47vw;
*/
}

@media screen and (max-width: 800px) {
.left-column-all {
    width: 100vw;
    position: inherit;
    background-position: inherit;
}

.right-column-all {
    margin-top: 0px;
margin-left: 0px;

}
}




/*ensure that category button does not jam about us or event section when on mobile start here. you can remove it if you
like. this will make product contain maximum of 8 categories button*/
@media screen and (max-width: 768px) {
.left-column-all {
   padding-bottom:700px;
}
}

@media screen and (max-width: 600px) {
.left-column-all {
   padding-bottom:700px;

}
}

/*ensure that category button does not jam about us or product section when on mobile ends here.*/




.section_padding {
padding: 60px 40px;
}

.imagelogo_li_remove {
list-style-type: none;
margin: 0;
 padding: 0;
}

.imagelogo_data{
 width:120px;
 height:80px;
}



  .navbar {
    letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
   background-color:purple;

    z-index: 9999;
    border: 0;
    font-family: comic sans ms;
//color:white;
  }



  
.navbar-toggle {
background-color:orange;
  }

.navgate {
padding:16px;color:white;

}



.navgate:hover{
 color: black;
 background-color: orange;

}


.navbar-header{
height:60px;
}

.navbar-header-collapse-color {
background:white;
}

.dropdown_bgcolor{

background: #800000;
color:white;
}

.dropdown_dashedline{
 border-bottom: 2px dotted white;
}

.navgate101:hover{
background:800000;
color:white;

}





/* home starts */
  
.home_image {	
width:100%;
/*
height:500px;
max-height:500px;
*/
height:100vh;
max-height:100vh;
       
        
}

.home_content_head {
        color: white;
        font-size:40px;
        font-weight:bold;
	font-family:comic sans ms; 
width:40vw;
margin-left:-110px;
  
}

.home_content_text {
        color: white;
        font-size:20px;
        font-weight:bold;
	box-sizing: border-box;
      //position: relative;
        
}

.home{
background:#ec5574;
}

.home:hover{
box-shadow: inset 0 0 0 25px purple;

}


.home_text_transparent_home {
border-style: solid; border-width:1px; border-color: orange;
  width: 100%;
  padding: 90px;
  position: absolute;
  bottom: 0px;
  background: rgba( 0, 0, 0, 0.50);

  color: white;
  height:100%;
text-align: center;

}



@media screen and (max-width: 768px) {
  .home_text_transparent_home{

  width: 100%;
  padding: 20px;
  }
}



@media screen and (max-width: 600px) {
  .home_content_home{
  width: 100%;
  padding: 20px  
  }
}













.marquee_button{
background-color: #800000;
padding: 6px;
color:white;
font-size:14px;
//border-radius: 50%;
transform: skew(15deg);
border: none;
cursor: pointer;
text-align: center;



}
.marquee_button:hover {
background: black;
color:white;
}


.marquee_image{ 
width:60px;height:60px;
border-radius: 50%;
border-style: solid; border-width:2px; border-color: #800000;
}






/* footer */


  .navbar_footer {
letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
    //background-color:#800000;
    color:white;
    padding:20px;
    border: 0;
    font-family: comic sans ms;
  }


.footer_bgcolor{
background: black;
}

.footer_text1{
color:white;
font-size:20px;
border:none;
cursor:pointer;
}

.footer_text2{
color:grey;
font-size:14px;
border:none;
cursor:pointer;
}

.footer_text1:hover{
color:grey;
}


.footer_text2:hover{
color:orange;
}


.footer_dashedline{
 border-top: 1px dashed white;
}


.contact_info{

background: #800000;
color:white;
cursor: pointer;
padding:16px;
border-radius: 10%;

}
.contact_info:hover{
background: orange;
color:black;

}


.contact_info_dashedline{
  border-bottom: 5px dashed #800000;

}


.left_shifting{

width:40%;
}

@media screen and (max-width: 768px) {
.left-column-all {
width:100%;

}

.home_resize_padding {
padding-top:100px;
}


}



@media screen and (max-width: 600px) {
.left-column-all {
width:100%;

}

.home_resize_padding {
padding-top:100px;
}

}

.modaling_sizing{
width:59%;
}


@media screen and (max-width: 768px) {
.modaling_sizing {
width:99%;

}

.home_content_head {       
margin-left:0px; 
padding-top:10px;
width:100%;
text-align:center;
}


}

@media screen and (max-width: 600px) {
.modaling_sizing {
width:99%;
}

.home_content_head {       
margin-left:0px; 
padding-top:10px;
width:100%;
text-align:center; 
}



}

.category_post{
background-color: #800000;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}
.category_post:hover {
background: black;
color:white;
}	




.category_post1{
background-color: purple;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}

.category_post1:hover {
background: black;
color:white;
}	



</style>



 
</head>
<body>






















<!--start left column all-->

    <div class="left-column-all left_shifting">

<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img class="img-rounded imagelogo_data" src="logo.png"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">



      <ul class="nav navbar-nav navbar-right">

        <li class="navgate about_click">Home/About</li>
       



      </ul>


    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->






<div class="home_text_transparent_home" >
<div class="home_resize_padding"> 


<p class="home_content_head pull-left"><?php include('header_title.php'); echo $header_tit; ?></p>
<marquee> <p class=""><button class="contact_click marquee_button"><img class="marquee_image" src="home.jpg" /><?php include('header_title.php'); echo $header_tit; ?></button> </p></marquee>

                        <p class="home_content_text access2"><span> For Site Admin Use Only


<br><br>
<style>

.access2{
border-style: dashed; border-width:4px; border-color:orange;color:white;font-size:14px;
}

.access{
border-style: solid; border-width:4px; border-color:white;color:white;font-size:14px;
}

.access:hover{
color:black;

}


.dropdown_color:hover{
background: black;
color:white;

}
</style>



<a  class="category_post1" href="admin_signup.php" title="Admin Signup" >Site Admin Signup</a>
<br><br><br>
<a  class="category_post1" href="login.php" title="Admin  Login" >Site Admin  Login</a>
<br><br>

</p>








<br> 
     
</div> 
</div>


    </div>
<!--end left column all-->












<!--start right column all-->
    <div class="right-column-all">




















<!-- about Section start-->
<div  class="about section_padding aboutus_bgcolor" style=''>


  <h2 class="text-center"><span class="contact_name_color">About <?php include('header_title.php'); echo $header_tit; ?></span></h2>
  <p class="footer_text2"><?php echo $heading; ?> </p>

<div class='well' style='background:#ddd;'><h1 style='text-align:center;color:purple'> Customers Feedback Form</h1>
We appreciate the time you have taken to help us improve our site and Services. Please use the form
below to provide us your feedback.<br><br>

<div data-toggle='modal' data-target='#myModal_reports'  title='Click to Submit Feedback' style='cursor:pointer;font-size:20px;font-family:comis sans ms;color:purple' title='Make a Suggestion'>Make a Suggestion</div><br>
<div data-toggle='modal' data-target='#myModal_reports'  title='Click to Submit Feedback' style='cursor:pointer;font-size:20px;font-family:comis sans ms;color:purple' title='Report a Bug'>Report a Bug</div><br>
<div data-toggle='modal' data-target='#myModal_reports'  title='Click to Submit Feedback' style='cursor:pointer;font-size:20px;font-family:comis sans ms;color:purple' title='Send Complaints'>Send Complaints</div><br>
</div>


<img style="width:100%;min-width:100%;max-width:100%;height:400px;display:none;" src="home1.jpg">

<style>
.hh{
color:#800000;
}

.hh:hover{
color:black;
}
</style>
  <h2 class="text-center"><span class="contact_name_color hh">Powered <?php echo $poweredby; ?>.</span></h2>


</div>




<!-- about Section ends-->










<!-- footer Section start -->

<footer class=" navbar_footer text-center footer_bgcolor">

<div class="row">

        <div class="col-sm-12">

<p class="footer_text1"><?php echo $header_tit; ?></p>
<p class="footer_text2"><?php include('footer_title.php'); echo $footer_tit1; ?></p>
<br>

<p><?php echo $footer_tit2; ?><a class="btn_copyright" href="<?php echo $footer_tit3; ?>"><?php echo $footer_tit3; ?></a></p>


        </div>

 
</div>



</div>

<div class="footer_text1">
<p class="footer_text1"></p>
</div>


<div class="footer_dashedline"></div>

 </footer>

<!-- footer Section ends -->
	




<div>
  <!--end right column all-->    











   
</body>
</html>





<style>

/* make modal appear at center of the page */
.modal-appear-center {
margin-top: 25%;
//width:40%;
}


/* make modal appear at center of the page */
.modal-appear-center1 {
margin-top: 15%;
//width:40%;
}


.modal_head_color{
background-color: #8B008B;
padding: 6px;
color:white;
}


.modal_footer_color{
background-color: #8B008B;
padding: 6px;
color:white;
}

</style>


<script>

// clear Modal div content on modal closef closed
$(document).ready(function(){
$('#myModal_reports').on('hidden.bs.modal', function() {
//alert('Modal Closed');
   $('.myform_issue').empty();  
 console.log("modal closed and content cleared");
 });
});

</script>



<!--  report Modal starts here --->


<div class="container_action">

  <div class="modal fade " id="myModal_reports" role="dialog">
    <div class="modal-dialog modal-lg modal-appear-center1 modal_mobile_resize modaling_sizing pull-right">
      <div class="modal-content">
        <div class="modal-header" style='color:black; background:#ddd'>
 <button type="button" class="pull-right btn btn-default" data-dismiss="modal">Close</button>

          <h4 class="modal-title">Customers Feedback Submission System</h4>
        </div>
        <div class="modal-body">
          



<!-- form START -->





<!-- start pForm  -->


<div style='background:#f1f1f1; padding:16px; color:black'>


<center><h4>Create Feedback.</h4></center>

<br>

Please Tell us what you Feel about our Products, the Price, Our Services, Our design. Just Tweet Your Feedback on what ever
you feel. We will get back to you in the Comment Section</b>
<!--start form1-->

<script>

$(document).ready(function(){
$('#post_btn').click(function(){
		
var title = $('#title').val();
var description = $("#description").val();
var report_date = $("#report_date").val();
var fullname = $("#fullname").val();
var email = $("#email").val();
var phone_no = $("#phone_no").val();

if(title==""){
alert('Feedback Reports Topic cannot be Empty');
//return false;
}


else if(description==""){
alert('Feedback Reports Description cannot be Empty');
//return false;
}


else if(report_date==""){
alert('Feedback Report Date cannot be Empty');
//return false;
}


else if(fullname==""){
alert('Customers Fullname cannot be Empty');
//return false;
}


else if(email==""){
alert('Customers Email Address cannot be Empty');
//return false;
}


else if(phone_no==""){
alert('Phone Number cannot be Empty');
//return false;
}

else{

$('#loader_l2').fadeIn(400).html('<br><div style="color:white;background:#3b5998;padding:10px;"><img src="ajax-loader.gif">&nbsp;Please Wait,Feedback  is being Analyzed...</div>');
var datasend = {title:title, description:description, report_date:report_date,fullname:fullname,email:email,phone_no:phone_no};	
		$.ajax({
			
			type:'POST',
			url:'feedback_reports_customers.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){




if(msg == 22){


 alert('There is an Issue Making Sentimentals API Call to ExpertAI ..Please Check Internet Connections.');			
$('#loader_l2').hide();
$('#result_l2').html("<div style='color:white;background:red;padding:10px;'>There is an Issue Making Sentimentals API Call to ExpertAI. Please Check Internet Connections</div>");
setTimeout(function(){ $('#result_l2').html(''); }, 5000);				
			
}




if(msg == 1){

alert('Feedback Reports Successfully Created..');			
$('#loader_l2').hide();
$('#result_l2').html("<div style='color:white;background:green;padding:10px;'>Feedback Successfully Submitted</div>");
//setTimeout(function(){ $('#result_l2').html(''); }, 5000);

$('#title').val('');
$('#description').val('');
$('#report_date').val('');
$('#fullname').val('');
$('#email').val('');
$('#phone_no').val('');

//location.reload();
//window.location='dashboard.php';				
			
}else{

alert('Feedback Reports submission Failed.');			
$('#loader_l2').hide();
$('#result_l2').html("<div style='color:white;background:red;padding:10px;'>Feedback Reports submission Failed</div>");
setTimeout(function(){ $('#result_l2').html(''); }, 5000);				
	

}




			
			}
			
		});
		
		}
		
	})
					
});




</script>






<div class="col-sm-12 form-group">
<label>Select Feedback by Topic </label>

<select class="form-control contact_input_color" id="title" name="title" required>
<option value=''>--Select Feedback Category</option>
<option value='Design'>Design</option>
<option value='Bugs'>Bugs</option>
<option value='Pricing'>Pricing</option>
<option value='Supports'>Supports</option>
<option value='Others'>Others</option>
</select>
</div>





<div class="col-sm-12 form-group">
<label>Enter Your Feedback</label>
<textarea  class="desc form-control contact_input_color" id="description"  name="description" placeholder="Enter Feedback"  required></textarea>
</div>



<div class="col-sm-12 form-group">
<label>Feedback Reporting Date</label>
<input  class="form-control contact_input_color" id="report_date" name="report_date" placeholder="Report Date" type="date" required>
</div>


<br>

<h3> Customers Info</h3>


<div class="col-sm-12 form-group">
<label>Fullname</label>
<input  class="form-control contact_input_color" id="fullname" name="fullname" placeholder="Customers Fullname" type="text" required>
</div>


<div class="col-sm-12 form-group">
<label>Email</label>
<input  class="form-control contact_input_color" id="email" name="email" placeholder="Customers Email" type="text" value="ciustomer1@gmail.com" required>
</div>


<div class="col-sm-12 form-group">
<label>Phone No</label>
<input  class="form-control contact_input_color" id="phone_no" name="phone_no" placeholder="Customers Phone No" type="text" required>
</div>


<div class="col-sm-12 form-group">
                        <div id="loader_l2"></div>
                        <div id="result_l2"></div>
</div>


<button type="button" id="post_btn" class="post_btn category_post"  /> Submit Feedback</button>
</div>







<!--end form1-->


<br><br>
</div>




</div>



<!--   end pForm  -->








<br /><br />
<br /><br />
<br /><br />
</div>

<!--   form ENDS   -->



        </div>
        <div class="modal-footer modal_footer_color" style={{color:'black',background:'#ddd'}}>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



<!--  report Modal ends here  -->













