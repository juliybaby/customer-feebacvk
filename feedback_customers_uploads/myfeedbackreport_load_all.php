<?php
error_reporting(0);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);




include('data6rst.php');

$queryid = $_POST['queryid'];
$page_row_call = $_POST['page_row_call'];


$owner_id= strip_tags($_POST['owner_id']);


$res= $db->prepare("SELECT count(*) as totalcount FROM feedback_reports order by id");
$res->execute(array());
$t_row = $res->fetch();
$totalcount = $t_row['totalcount'];

if($totalcount == 0){
//echo "<div style='background:red;color:white;padding:10px;border:none;'>No One has Created any Feedback Reports Yet.. <b></b></div>";
echo 11;
exit();
}

$result = $db->prepare("SELECT * FROM feedback_reports order by id DESC limit :row1, :rowpage");
$result->bindValue(':rowpage', (int) trim($page_row_call), PDO::PARAM_INT);
$result->bindValue(':row1', (int) trim($queryid), PDO::PARAM_INT);
//$result->bindValue(':userid', trim($owner_id), PDO::PARAM_STR);
//$result->bindValue(':project_id', trim($projectid), PDO::PARAM_INT);
$result->execute();

$count_post = $result->rowCount();


$result_arr = array();
$result_arr[] = array("allcount" => $totalcount);
while($row = $result->fetch()){






$reportid = htmlentities(htmlentities($row['id'], ENT_QUOTES, "UTF-8"));
$title = htmlentities(htmlentities($row['title'], ENT_QUOTES, "UTF-8"));
$details = $row['content'];
$timer1 = htmlentities(htmlentities($row['timer1'], ENT_QUOTES, "UTF-8"));
$timer2 = htmlentities(htmlentities($row['timer2'], ENT_QUOTES, "UTF-8"));
$fullname = htmlentities(htmlentities($row['fullname'], ENT_QUOTES, "UTF-8"));
$userphoto = htmlentities(htmlentities($row['userphoto'], ENT_QUOTES, "UTF-8"));
$userid = htmlentities(htmlentities($row['userid'], ENT_QUOTES, "UTF-8"));
$status = htmlentities(htmlentities($row['status'], ENT_QUOTES, "UTF-8"));
$total_comments = htmlentities(htmlentities($row['total_comments'], ENT_QUOTES, "UTF-8"));
$appointment_date = htmlentities(htmlentities($row['report_date'], ENT_QUOTES, "UTF-8"));
$appointment_month = htmlentities(htmlentities($row['report_date'], ENT_QUOTES, "UTF-8"));
$priority = htmlentities(htmlentities($row['priority'], ENT_QUOTES, "UTF-8"));
$points = htmlentities(htmlentities($row['points'], ENT_QUOTES, "UTF-8"));

$overall = htmlentities(htmlentities($row['overall'], ENT_QUOTES, "UTF-8"));
$positivity = htmlentities(htmlentities($row['positivity'], ENT_QUOTES, "UTF-8"));
$negativity = htmlentities(htmlentities($row['negativity'], ENT_QUOTES, "UTF-8"));
$emotion_img = htmlentities(htmlentities($row['emotion_img'], ENT_QUOTES, "UTF-8"));
$email = htmlentities(htmlentities($row['email'], ENT_QUOTES, "UTF-8"));
$phone_no = htmlentities(htmlentities($row['phone_no'], ENT_QUOTES, "UTF-8"));

$result_arr[] = array(
"reportid" => $reportid,
"title" => $title,
"description_default" => $details,
"timer1" => $timer1,
"timer2" => $timer2,
"fullname" => $fullname,
"userphoto" => $userphoto,
"userid" => $userid,
"status" => $status,
"total_comments" => $total_comments,
"report_date" => $report_date,
"report_month" => $report_month,
"priority" => $priority,
"points" => $points,
"overall" => $overall,
"positivity" => $positivity,
"negativity" => $negativity,
"emotion_img" => $emotion_img,
"email" => $email,
"phone_no" => $phone_no






);


}
echo json_encode($result_arr);