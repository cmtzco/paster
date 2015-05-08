<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
$con=mysqli_connect($host, $user, $password, $database);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



// escape variables for security
$pastetext = mysqli_real_escape_string($con, $_POST['pastetext']);
$submittext = mysqli_real_escape_string($con, $_POST['submittext']);
$ip = mysqli_real_escape_string($con, $_POST['ip']);
$randomkey = mysqli_real_escape_string($con, $_POST['randomkey']);
$public = mysqli_real_escape_string($con, $_POST['public']);
$timestamp = mysqli_real_escape_string($con, $_POST['timestamp']);
$GLOBALS['randomkey']=$randomkey;

$sql="INSERT INTO pastes (pastetext, submittext, ip, randomkey, public, timestamp)
VALUES ('$pastetext', '$submittext', '$ip', '$randomkey', '$public', '$timestamp')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo ".";

mysqli_close($con);
?>
<!HTML>
<head>
<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
    <style>
    
        .mid {
        margin:0 auto;
        }
        .content {
            text-align:center;
            color:#595C58;
            width:relative;
             margin:95px;
        }
        body{
            background-color:#A4A9AD;
            font-family:'Raleway', sans-serif;
        }
        .urlcontent {
            padding:15px 5px;
            border:1px solid;
            background-color:#A4A9AD;
            width:relative;
            border-radius:1px;
        }
        a {
        color:#595C58;
        text-decoration:none;
        }
        header {
        padding:45px;
        font-size:35px;
        font-family:'Raleway', sans-serif;
        background-color:#A4A9AD;
        color:#595C58;
        }
        a:visited {
        color:#595C58;
        }
    </style>
</head>
<body>
<header>
<?php echo "<a href='" . $url . "'>Your URL is:</a>"; ?>
</header>
<div class="mid content">
<?php 
$url1= $url . "/paste/"; 
$url2= $_POST['randomkey'];
echo "Click on URL to view content";
echo "<br>";
echo "<div class='urlcontent'>";

echo "<a href=$url1$url2>$url1$url2</a>";
?>
</div>
    </div>
</body>
