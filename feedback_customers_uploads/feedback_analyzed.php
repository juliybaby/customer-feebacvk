<?php


ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);

error_reporting(0);
session_start();
include ('authenticate.php');

$uid = strip_tags($_SESSION['uid3']);
$userid = $uid;
$fullname = strip_tags($_SESSION['fullname3']);
$username =  strip_tags($_SESSION['username3']);
$photo = strip_tags($_SESSION['photo3']);
$email = strip_tags($_SESSION['email3']);
$user_rank = strip_tags($_SESSION['user_rank3']);



$mt = microtime(true);
$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$dt2=date("Y-m-d H:i:s");


include('data6rst.php');

$feedback= strip_tags($_POST['feedback']);


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

$text_post= $feedback;

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

echo "<div style='color:white;background:green;padding:10px;'>Feedback Successfully Analyzed. See Below</div>";

}
else {
echo "<div style='color:white;background:red;padding:10px;'>There is an Issue Making Sentimentals API Call to ExpertAI. Please Check Internet Connections</div>";
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


$lemma_word=  $resArr['lemma'];

$overall = implode(", ", $resArr['overall']);
$negativity = implode(", ", $resArr['negativity']);
$positivity = implode(", ", $resArr['positivity']);
$lemma = implode("<br>, ", $resArr['lemma']); 

$sentiment = implode("<br>, ", $resArr['sentiment']);


if($positivity == 0){

$img_emotion ='sad.png';
}else{
$img_emotion ='happy.png';
}



if($positivity == 0){
$sentiments ='Negative';

}else{
$sentiments ='Positive';
}


if($positivity == 0){
$confidence =$negativity;
$confidence1 ='Sad';
$emotion_img = 'sad.png';

}else{


$confidence =$positivity;
$confidence1 ='Happy';
$emotion_img = 'happy.png';

}





if($positivity == 0 && $negativity ==0){
$sentiments ='Neutral';
$confidence =0;
$confidence1 ='Mild';
$emotion_img = 'neutral.png';

}





echo 
  "<div style='background:#c1c1c1;color:black;'><b style='color:#800000'>Feed Back Sentimental Analysis</b>
 <div class='title_css1'><b>Overall: </b> $overall</div>
 <div class='title_css1'><b>Positivity: </b> $positivity</div>
 <div class='title_css1'><b>Negativity: </b> $negativity </div>
 <div class='title_css1'><b style='color:#800000;font-size:16px;'>Analyzed Feedback Sentimental Tags: &nbsp;
</b> $sentiments&nbsp;&nbsp;&nbsp;
<b style='color:#800000;font-size:16px;'>Confidence:</b> $confidence %</div>

<div>
The Customer/User is <b> $confidence1 &nbsp;&nbsp;</b><img src='$emotion_img'style='width:60px;max-width:60px;height:60px;max-height:60px;border-style: solid; border-width:3px; border-color: orange;border-radius:50%'>
</div>

<br>


<span class='col-sm-6'>
<center><b>Characters, Traits and Entities/KeyPhrases Involved in the Text</b></center><br>
$lemma
</span>


<span class='col-sm-6'>
<center><b> Scores</b></center><br>
$sentiment
</span>





</div><br>";



?>

<br><br><h3 style='width:100%;min-width:100%;'>Feedback Statistical Text Analytics</h3>

<style type="text/css">
BODY {
    width: 550PX;
}

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


    
<div id="loadera" class='res_center_css'></div>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {


$('#loadera').fadeIn(400).html('<br><div style="color:black;background:#c1c1c1;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i>  &nbsp;Please Wait,  Chart Statistics is being Loaded...</div>');
  
var negativity = '<?php echo $negativity ?>';
var positivity = '<?php echo $positivity ?>';
var overall = '<?php echo $overall ?>';

                $.post('feedback_statictics.php?negativity='+negativity + "&positivity=" + positivity + "&overall=" + overall,
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].sentiments);
                        marks.push(data[i].scores);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Feedback Sentimental Text Analysis',
                                backgroundColor: 'purple',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]

                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
$('#loadera').hide();
            }
        }
        </script>








