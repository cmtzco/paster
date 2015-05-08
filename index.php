<?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
date_default_timezone_set('America/Mexico_City');

?>
<!HTML>

<head>
    <link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
   <title>DRLpaste</title>

   <style>
        a {
        text-decoration:none;
	color:#595C5E;
        }
        a:visited {
        color:#595C5E;
        }
        header {
        padding:45px;
        font-size:35px;
        font-family:'Raleway', sans-serif;
        background-color:#A4A9AD;
        color:#595C5E;
        }
        .mid {
            margin:0px auto;
        }
        .content {
            width:80%;
            text-align:center;
            background-color:#A4A9AD;
            color:#A4A9AD;
            font-family:'Raleway', sans-serif;
        }
        .midtext {
            text-align:center;
        }
        .pastebox {
            color:#A4A9AD;
            width:95%;
            height:55%;
            background-color:#595C5E;
            border: 1px;
            border-radius:2px;
            margin:0 0 35px;
            padding-left:10px;
	    
        }
        .namefield {
            color:#A4A9AD;
            width:40%;
            background-color:#595C5E;
            border: 1px;
            border-radius:2px;
            font-size:25px;
        }

        .submitbutton {
            color: #595C5E;
            font-size:18px;
            border-radius: 3px;
            border: 1px solid #78BE20;
            background-color:#78BE20;
            padding: 15px 20px;
            margin:5px;
	    box-shadow: 2px 2px 1px;
        }
        body {
            background-color:#A4A9AD;
        }
        .namefieldspan {
            background-color:#595C5E;
            padding: 20px 10px;
            text-align:center;
        }
        *:focus {
            outline: 0;
        }
        .submittext {
            font-size:10;
	    color: A4A9AD;
        }
        .titletext {
            letter-spacing:3px;
            font-size:25px;
        }
        .publiccheck {
        margin:45px; 
        }
    </style>


</head>

<body>
<header><a href="http://drl.dev">DRLpaste</a></header>
    <div class="mid content">
        <form action="assets/paste.php" method="POST">
            <textarea rows="25" cols="50" class="pastebox" name="pastetext" placeholder="Insert text here...."></textarea>
            <br>
             <span class="namefieldspan"><a class="submittext">Submitted By</a> |&nbsp; 
            <input type="textfield" class="namefield" name="submittext" placeholder="Your Name"></span>
            <br>
            <!--Make Public: <input type="checkbox" name="public" class="publiccheck" value="1">-->
            <br>
            <input type=hidden name="ip" value="<?php print $_SERVER['REMOTE_ADDR']; ?>">
            <input type=hidden name="randomkey" value="<?php print generateRandomString(9); ?>">
            <input type=hidden name="timestamp" value="<?php print date("m.d.Y h:i:sa"); ?>" />
            <input type="submit" class="submitbutton" value="Paste!" name="submit">
        </form>
    </div>
</body>
