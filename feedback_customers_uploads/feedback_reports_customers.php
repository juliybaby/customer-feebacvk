<?php


ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);

error_reporting(0);



$mt = microtime(true);
$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$dt2=date("Y-m-d H:i:s");
$title = strip_tags($_POST['title']);
$topic = $title;

$uid = 'Customer_100';
$photo = 'customer.png';
$fullname = strip_tags($_POST['fullname']);
$email = strip_tags($_POST['email']);
$phone_no = strip_tags($_POST['phone_no']);
$userid = 'Customer_100';
$user_rank='Customer';


//replace any space with hyphen
$sp ='-';
$tt = time();
$title_seo = str_replace(' ', '-', $title.$sp.$tt);


include('data6rst.php');

$description= strip_tags($_POST['description']);
$v_date = strip_tags($_POST['report_date']);
$report_priority = 'none';
$report_status = 'none';

/*
//$v_date ="02/29/2020";
$ff1 = explode('/', $v_date);
$monthing1= $ff1[0];
$daying1= $ff1[1];
$yearing1 =$ff1[2];
//$bvb1 ='-';
$issue_date ="$yearing1-$monthing1-$daying1";
*/


$report_date = $v_date;
//$report_month= date('m');

//$str_date = '2021-01-14';

$str_date =$report_date;
$ff1 = explode('-', $str_date);
$yearing1 =$ff1[0];
$monthing1= $ff1[1];
$daying1= $ff1[2];


$string = $monthing1;
 
//Get the first character.
$firstCharacter = $string[0];

//Get the second character.
$secondCharacter = $string[1];

if($firstCharacter ==0){
$report_month = $secondCharacter;
}

if($firstCharacter !=0){
$report_month = $monthing1;
}


// Make API Call to ExpertAI Sentimental Analysis

$url = 'https://developer.expert.ai/oauth2/token';
$ch = curl_init($url);


$uname ="API-EMAIL-ADDRESS-GOES HERE";
$upass  ="API PASSWORD GOES HERE";
$data = array(
    'username' => $uname,
    'password' => $upass
);
$payload = json_encode(array($data));
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$access_token = $result;

//$text_post='Michael Jordan was one of the best basketball players of all time. Scoring was Jordan stand-out skill,but he still holds a defensive NBA record, with eight steals in a half';
//$text_post= 'Hello Site Admin, I am happy with the product that I purchased being delayed in delivery. I need it asap.';

$text_post= $description;

$url1 = 'https://nlapi.expert.ai/v2/analyze/standard/en/sentiment';
$ch1 = curl_init($url1);
$data1 = array(
    'text' => $text_post
);
$payload1 = json_encode(array("document" => $data1));
curl_setopt($ch1, CURLOPT_POSTFIELDS, $payload1);
curl_setopt($ch1, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token", 'Content-Type:application/json'));
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch1);
$http_status = curl_getinfo($ch1, CURLINFO_HTTP_CODE);

// catch error message before closing
if (curl_errno($ch1)) {
   // echo $error_msg = curl_error($ch1);
}

curl_close($ch1);

if($http_status==200){

//echo 21;
//echo "success";
}
else {
//echo "Problem connecting to ExpertAI API"
echo 22;
exit();

}   


$json = json_decode($output, true);

$resArr = [];
$keys = ['lemma', 'sentiment', 'overall', 'negativity', 'positivity'];



array_walk_recursive($json, function($value, $key) use(&$keys, &$resArr) {
    
    if(in_array($key, $keys)){
        $resArr[$key][] = $value;
    }
    
});

/*
print_r($resArr['lemma']);
print_r($resArr['sentiment']);
print_r($resArr['positivity']);
print_r($resArr['negativity']);
print_r($resArr['overall']);
*/

/*
// print all lemma 
echo $lemma = implode(", ", $resArr['lemma']); 
echo "<br><br>";  
// print all sentiment 
echo $sentiment = implode(", ", $resArr['sentiment']);
echo "<br><br>";  
// print overall 
echo $overall = implode(", ", $resArr['overall']); 
echo "<br><br>";   
//print negativity 
echo $negativity = implode(", ", $resArr['negativity']);
echo "<br><br>";
*/


$overall = implode(", ", $resArr['overall']);
$negativity = implode(", ", $resArr['negativity']);
$positivity = implode(", ", $resArr['positivity']);

if($positivity == 0){

$img_emotion ='sad.png';
}else{
$img_emotion ='happy.png';
}





          
$statement = $db->prepare('INSERT INTO feedback_reports
(title,title_seo,content,timer1,timer2,username,fullname,userphoto,userid,total_comments,status,report_date,report_month,priority,email,phone_no,overall,positivity,negativity,emotion_img)
                        values
(:title,:title_seo,:content,:timer1,:timer2,:username,:fullname,:userphoto,:userid,:total_comments,:status,:report_date,:report_month,:priority,:email,:phone_no,:overall,:positivity,:negativity,:emotion_img)');
$statement->execute(array( 
':title' => $title,
':title_seo' => $title_seo,
':content' => $description,
':timer1' => $timer,
':timer2' => $created_time,
':username' => 'Customer',
':fullname' => $fullname,
':userphoto' => $photo,
':userid' => $uid,
':total_comments' => '0',
':status' => 'Open',
':report_date' => $report_date,
':report_month' => $report_month,
':priority' => $report_priority,
':email' => $email,
':phone_no' => $phone_no,
':overall' => $overall,
':positivity' => $positivity,
':negativity' => $negativity,
':emotion_img' => $img_emotion


));



$res = $db->query("SELECT LAST_INSERT_ID()");
$lastId_post = $res->fetchColumn();



// query table to update notification_post table
$result = $db->prepare('SELECT * FROM users where user_rank=:user_rank');
$result->execute(array(':user_rank' => 'Admin' ));
$nosofrows = $result->rowCount();



if($nosofrows > 0){
while($row = $result->fetch()){

$reciever_userid = $row['id'];
$reciever_username = $row['username'];

		    
//insert into notification table

$statement1 = $db->prepare('INSERT INTO notification
(post_id,userid,fullname,photo,user_rank,reciever_id,status,type,timing,title,title_seo)
                        values
(:post_id,:userid,:fullname,:photo,:user_rank,:reciever_id,:status,:type,:timing,:title,:title_seo)');
$statement1->execute(array( 

':post_id' => $lastId_post,
':userid' => $userid,
':fullname' => $fullname,
':photo' => $photo,
':user_rank' => $user_rank,
':reciever_id' => $reciever_userid,
':status' => 'unread',
':type' => 'report_post',
':timing' => $timer,
':title' => $title,
':title_seo' => $title_seo
));

}
}




/*

create table feedback_statistics
(id int primary key auto_increment,
 total_sentiments varchar(30),
total_postive varchar(30),
total_negative varchar(30),
total_overall varchar(30),
total_design varchar(30),
total_bug varchar(30),
total_pricing varchar(30),
total_supports varchar(30),
total_others varchar(30));

insert into feedback_statistics(total_sentiments,total_postive,total_negative,total_overall,total_design,
total_bug,total_pricing,total_supports,total_others) values ('0','0','0','0','0','0','0','0','0');

*/




$pst = $db->prepare('select * from feedback_statistics');
$pst->execute(array());
$r = $pst->fetch();
$counter_points=$r['total_sentiments'];
$final_count = $counter_points + 1;
$update= $db->prepare('UPDATE feedback_statistics set total_sentiments =:total_sentiments');
$update->execute(array(':total_sentiments' => $final_count));





$total_postive = 1;
$total_negative = 1;

if($total_postive != 0){

$pst = $db->prepare('select * from feedback_statistics');
$pst->execute(array());
$r = $pst->fetch();
$counter_points=$r['total_postive'];
$final_count = $counter_points + 1;
$update= $db->prepare('UPDATE feedback_statistics set total_postive =:total_postive');
$update->execute(array(':total_postive' => $final_count));
}



if($total_negative != 0){

$pst = $db->prepare('select * from feedback_statistics');
$pst->execute(array());
$r = $pst->fetch();
$counter_points=$r['total_negative'];
$final_count = $counter_points + 1;
$update= $db->prepare('UPDATE feedback_statistics set total_negative =:total_negative');
$update->execute(array(':total_negative' => $final_count));
}


if($topic =='Design'){
$pst = $db->prepare('select * from feedback_statistics');
$pst->execute(array());
$r = $pst->fetch();
$counter_points=$r['total_design'];
$final_count = $counter_points + 1;
$update= $db->prepare('UPDATE feedback_statistics set total_design =:total_design');
$update->execute(array(':total_design' => $final_count));

}



if($topic =='Bugs'){
$pst = $db->prepare('select * from feedback_statistics');
$pst->execute(array());
$r = $pst->fetch();
$counter_points=$r['total_bug'];
$final_count = $counter_points + 1;
$update= $db->prepare('UPDATE feedback_statistics set total_bug =:total_bug');
$update->execute(array(':total_bug' => $final_count));

}



if($topic =='Pricing'){
$pst = $db->prepare('select * from feedback_statistics');
$pst->execute(array());
$r = $pst->fetch();
$counter_points=$r['total_pricing'];
$final_count = $counter_points + 1;
$update= $db->prepare('UPDATE feedback_statistics set total_pricing =:total_pricing');
$update->execute(array(':total_pricing' => $final_count));

}



if($topic =='Supports'){
$pst = $db->prepare('select * from feedback_statistics');
$pst->execute(array());
$r = $pst->fetch();
$counter_points=$r['total_supports'];
$final_count = $counter_points + 1;
$update= $db->prepare('UPDATE feedback_statistics set total_supports =:total_supports');
$update->execute(array(':total_supports' => $final_count));

}



if($topic =='Others'){
$pst = $db->prepare('select * from feedback_statistics');
$pst->execute(array());
$r = $pst->fetch();
$counter_points=$r['total_others'];
$final_count = $counter_points + 1;
$update= $db->prepare('UPDATE feedback_statistics set total_others =:total_others');
$update->execute(array(':total_others' => $final_count));

}


if($statement){
echo 1;	

}
else{
//echo "Post submission Failed";
echo 2;
}




?>