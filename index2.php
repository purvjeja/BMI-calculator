<?php
$name = filter_input(INPUT_POST, 'name');
$age = filter_input(INPUT_POST, 'age');
$gender = filter_input(INPUT_POST, 'gender');
$weight = filter_input(INPUT_POST, 'weight');
$height = filter_input(INPUT_POST, 'height');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bmii";
$res=round(calculatebmi(),2); 
function calculatebmi(){
    $input=$_POST['weight'];
    $input1=$_POST['height'];
    $num=$input1/100;
    $num=$num*$num;
    $result=$input/$num;
    return $result;
}     
function Calculatebmii(float $w, float $h):float {
    $val=$h/100;
    $val=$val*$val;
    $resss=$w/$val;
    return $resss;
}
function Calculateoverobsesweight(){
    $fweight=$_POST['weight'];
    $fheight=$_POST['height'];
    $originalweight=$fweight;
    for($x=100;$x>1;$x--){
          $fweight--;
        $bmivalue=Calculatebmii($fweight,$fheight);
        if( $bmivalue > "24" && $bmivalue < "25")
        { 
             $value=$originalweight-$fweight;
             return $value;
             break;
        }
    }
}
function Calculateunderweight(){
    $fweight=$_POST['weight'];
    $fheight=$_POST['height'];
    $originalweight=$fweight;
    for($x=100;$x>1;$x--){
          $fweight++;
        $bmivalue=Calculatebmii($fweight,$fheight);
        if( $bmivalue > "18" && $bmivalue < "19")
        {
             $value=$fweight-$originalweight;
             return $value;
             break;
        }
    }
}
if($res<=18.5){
    $category="Underweight";
    $linkk="https://www.medicalnewstoday.com/articles/321612.php#when-is-a-person-underweight";
}
elseif($res >= 18.6 && $res <= 24.9) {
    $category="HealthyWeight";
    $linkk="https://www.nia.nih.gov/health/maintaining-healthy-weight";
}
elseif($res>=25.00 && $res<=29.9){
    $category="Overweight";
    $linkk="https://www.medicalnewstoday.com/articles/320460.php#what-is-morbid-obesity";
}
else{
    $category="Obesity(Bulky)";
    $linkk="https://www.medicalnewstoday.com/articles/320460.php#what-is-morbid-obesity";
}
$message1="You Need to Gain atleast";
$message2="You Need to Lose atleast";
$message23=" KG's";
$message3=" to Reach Healthy Weight Category";
$advice="Get an Help From Doctor";
if($category=="Overweight"||$category=="Obesity(Bulky)"){
  $weightdifference=Calculateoverobsesweight();
  $goal=$weight-$weightdifference; 
}
 elseif ($category=="Underweight"){
     $weightdifference=Calculateunderweight();
     $goal=$weight+$weightdifference; 
 }
 else{
     $goal=0;
 }
 
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
$sql = "INSERT INTO bmicheckers(name,age,gender,weight,height,BMI,category,goal) values ('$name','$age','$gender','$weight','$height','$res','$category','$goal')";
if ($conn->query($sql)){
        
    }
    else{
    echo "Error: ". $sql ." ". $conn->error;
    } 
$conn->close();
}  
?>
<!Doctype html>
<html>
<head>
    <title>YOUR_BMI</title>
    </head>

<body>
<center>
    <br><br/>
    <br><br/>
   <div class="phptext">
    <br>
    Hey <b><?php print($name);?></b>,
    <br><br/>
    Your Body Mass Index is <b><?php print($res);?></b>,
   <br><br/>
   Your BMI Category is<b> <?php print($category);?></b><?php if($category=="Underweight" || $category=="Overweight") { ?> &#128543; <?php } elseif($category=="Obesity(Bulky)") {?> &#128542; <?php } elseif($category=="HealthyWeight"){ ?> &#128519; <?php } ?><b>{</b><a href="category.html">CATEGORYs</a><b>}</b> 
   ,<br><br/>
   <?php if($category=="Obesity(Bulky)" || $category=="Overweight"||$category=="Underweight"){ ?>
   <?php if($category=="Obesity(Bulky)" || $category=="Overweight") { print($message2);?> <b><?php print($weightdifference);print($message23);?></b> <?php print($message3);} elseif($category=="Underweight"){print($message1);?> <b><?php print($weightdifference);print($message23);?></b> <?php print($message3);}?>
   ,<br><br/>
   Your Weight Should Be <u><b><?php print($goal);?></b></u><?php print($message23);?>,
   <br><br/> 
   <?php if($category=="Underweight" || $category=="Overweight") {print($advice);?>&nbsp;<b>{</b><a href="https://www.tatahealth.com/online-doctor-consultation/general-physician/3?utm_source=google&utm_medium=search&utm_campaign=instadoc">CONSULT DOCTORS</a><b>}</b> <?php } elseif($category=="Obesity(Bulky)") { print($advice); ?>&nbsp; <b>{</b><a href="https://www.tatahealth.com/online-doctor-consultation/general-physician/3?utm_source=google&utm_medium=search&utm_campaign=instadoc">CONSULT DOCTORS</a><b>}</b><?php }?>
   .<br><br/>
   <?php }?>
   </div>
   </center>   
   <b><br><br/><br><br/>
   <div class="links">
      <div class="link1">&nbsp;&nbsp; <button onclick="goBack()"><=BACK</button>
   </div>
     <div class="link2"> 
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Click This Button To Get Help To Manage Your 
        <form method="get" action="<?php print($linkk);?>">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button><?php print($category);?></button>
   </form>
   </div>
</div>
   <script>
            function goBack() {
              window.history.back();
            }
            </script>
</body>
 <style>
     body{
    background-image: url(backg.jpg);       
     }
     button{
        font-size: 20px;
        background-color:white;
        color:black;
        border: 3px solid black;
       
       }
       .links{
           display:flex;
       }
       button:hover{
        box-shadow: 0 5px 5px 0 white;
        background-color: black;
        color: white;
       }
     .phptext{
        text-align:center;
        font-size: 30px;
        background-image:none;
        border-radius: 20px;
        background-size: 100%; 
        width: 70%;
        height:80%;
        border: 6px solid black;
        padding: 5px;
        background-color:green;
        opacity:0.9;
    }
    .phptext:hover{
        box-shadow: 0 0 15px 15px white;
    }
     .phptext a{
         color:blue;     
         animation: blink 2s linear infinite;
         background-color:cyan;
     }
     @keyframes blink{
         0%{opacity: 0;}
         50%{opacity: .5;}
         100%{opacity: 1;}
        } 
     b{
         color:white;
         
     }
     a{
         font-size:17px;
         color:white; 
     }
     table{
         margin:10px;
         
      }
      .links a{ 
           color:black;
      }
 </style>
</html> 