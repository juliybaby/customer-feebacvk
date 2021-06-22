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






$data[] = array('Sentiments', 'Total Sentiments', 'Positive Sentiments', 'Negative Sentiments');

$result = $db->prepare('SELECT * FROM feedback_statistics');
$result->execute(array());
$nosofrows = $result->rowCount();
while($row = $result->fetch()){
$id= $row['id'];


//foreach($json['data'] as $v1){
$total_sentiments = $row['total_sentiments'];
$total_postive = $row['total_postive'];
$total_negative = $row['total_negative']; 

$sentiments= 'Feedback_Sentiments';
$data[] = array($sentiments,(int)$total_sentiments,(int)$total_postive,(int)$total_negative);
}


/*
$data[] = array('Employee','Boys', 'Girls');
$query = mysqli_query($db, "SELECT 0 FROM population");
while($row = mysqli_fetch_array($query)){
$data[] = array($row['locality'],(int)$row['boys'],(int)$row['girls']);

}
*/
echo json_encode($data);
