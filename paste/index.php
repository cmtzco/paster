<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>
<!HTML>

<head>

    <link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script src="http://bigcommerce.xyz/paste/lined/jquery-linedtextarea.js"></script>
	<link href="http://bigcommerce.xyz/paste/lined/jquery-linedtextarea.css" type="text/css" rel="stylesheet" />

    
<style>
    header {
        padding:45px;
        font-size:35px;
        font-family:'Raleway', sans-serif;
        background-color:#A4A9AD;
        color:#A4A9AD;

    }
    body {
        background-color:#A4A9AD;
        width:100%;
    }
    .pastedcontent {
        margin:0px auto;
        background-color:#595C58;
        color:#A4A9AD;
        border:1px;
    }
    .pasteddiv {
    margin:0px auto;
    text-align:center;
    
    }
    header > a {
	color:#595C58;
    }
    header > a:visited {
   	color:#595C58;
    }
    a {
        text-decoration:none;
	color:#A4A9AD;
        }
    a:visited {
        color:#A4A9AD;
        }
    .pasteagain {
    font-family:'Raleway', sans-serif;
    color:#A4A9AD;
    width:15%;
    padding:10px;
    box-shadow:2px 2px 1px;
    border:1px solid #78BE20;
    background-color:#78BE20;
    text-align:center;
    margin:0 auto;
    font-size:25px;
    border-radius:3px;
    }
    .pasteagaintext {
    color:#595C58;
    }
    .pasteagaintext:visited {
    color:#595C58;
    }
    .pageurl {
    font-family:'Raleway', sans-serif;
    color:#A4A9AD;
    width:45%;
    padding:10px;
    border:1px solid;
    background-color:#595C58;
    text-align:center;
    margin:0 auto;
    font-size:20px;
    border-radius:1px;
    }
    .submitby {
    font-family:'Raleway', sans-serif;
    color:#A4A9AD;
    width:35%;
    padding:10px;
    border:1px solid;
    background-color:#595C58;
    text-align:center;
    margin:0 auto;
    font-size:20px;
    border-radius:1px; 
    font-style: italic;
    }   
    .submittitle {
    text-align:left;
    font-style: normal;

    }
    
    

</style>
</head>

<body>
<header><a href="http://drl.dev">Your Paste:</a></header>
<div class="pageurl"><?php echo curPageURL();?></div> <br>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$con=mysqli_connect($host, $user, $password, $database);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$randomkey = $_GET['rkey'];
$result = mysqli_query($con,"SELECT * FROM `pastes` WHERE randomkey='$randomkey'");

while($row = mysqli_fetch_array($result)) {
  echo "<div class='pasteddiv'>";
  echo "<form>";
  echo "<textarea cols='130' rows='30' class='pastedcontent lined' readonly>";
  echo $row['pastetext'];
  echo "</textarea>";
  echo "<script> $(function() { $('.lined').linedtextarea( {selectedLine: 0} ); }); </script>";
  echo "</form>";
  echo "</div>";
  echo "<div class='submitby'>";
  echo "<a class='submittitle'>Submitted By:     </a>";
  echo $row['submittext'];
  echo "</div>";
  echo "<br>";
}
?>

<div class="pasteagain"><a class="pasteagaintext" href="http://drl.dev">Paste again</a></div>

</body>
