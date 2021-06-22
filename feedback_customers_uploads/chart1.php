<?php
//error_reporting(0);

//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);


include('data6rst.php');




session_start();
$userid_sess_data = htmlentities(htmlentities($_SESSION['uid3'], ENT_QUOTES, "UTF-8"));
$email_sess =  htmlentities(htmlentities($_SESSION['email3'], ENT_QUOTES, "UTF-8"));
$user_rank = strip_tags($_SESSION['user_rank3']);



/*

Full texts	
id
total_sentiments
total_postive
total_negative
total_overall
total_design
total_bug
total_pricing
total_supports
total_others

*/






$data[] = array('Sentiments', 'Total Sentiments', 'Design', 'Bug', 'Pricing', 'Supports', 'Others');

$result = $db->prepare('SELECT * FROM feedback_statistics');
$result->execute(array());
$nosofrows = $result->rowCount();
while($row = $result->fetch()){
$id= $row['id'];


//foreach($json['data'] as $v1){
$total_sentiments = $row['total_sentiments'];
$total_design = $row['total_design'];
$total_bug = $row['total_bug']; 
$total_pricing = $row['total_pricing'];
$total_supports = $row['total_supports'];
$total_others = $row['total_others'];

$sentiments= 'Feedback Sentiments by Topics';
$data[] = array($sentiments,(int)$total_sentiments,(int)$total_design,(int)$total_bug,(int)$total_pricing,(int)$total_supports,(int)$total_others);
}


echo json_encode($data);
