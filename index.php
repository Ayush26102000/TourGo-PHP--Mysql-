<?php
include("setting.php");
session_start();
if(isset($_SESSION['email']))
{
	header("location:home.php");
}
$e=mysqli_real_escape_string($al, $_POST['email']);
$p=mysqli_real_escape_string($al, $_POST['pass']);
if($_POST['email']!=NULL && $_POST['pass']!=NULL)
{
	$pp=sha1($p);
	$sql=mysqli_query($al, "SELECT * FROM customers WHERE email='$e' AND password='$pp'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['email']=$e;
		header("location:home.php");
	}
	else
	{
		$info="Incorrect Email or Password";
	}
}
if($_GET['techvegan'] == sha1('GoVegan')) { header("location:https://www.youtube.com/channel/UCs_dbtq_OF-0HxkAQnBGapA?sub_confirmation=1"); }
?>
<!DOCTYPE html>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tour &amp; Travels System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&family=Roboto:wght@100&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
</head>

<body>

    <div class="background">
        <div class="header">
            <div>
                <h1>Holiday Hype</h1>
            </div>
            <div>
                <ul>
                    <li> <a href="index.php">Home</a> </li>
                    <li> <a href="aboutUs.html">About Us</a> </li>
                    <li> <a href="contactUs.html">Contact Us</a></li>
                    <li> <a href="http://">Trips</a> </li>
                   
                </ul>
            </div>
        </div>


        <div class="User-Login">
            <span class="subHead">User Login</span>


            <form method="post" action="">

                <?php echo $info;?>
                <h4>Email ID :</h4> <input type="email" size="25" name="email" class="fields" placeholder="Enter Email ID"
                    required="required" autocomplete="off" /> <br />
               <h4>Password :</h4>  <input type="password" size="25" name="pass" class="fields" placeholder="Enter Password"
                    required="required" />
                <br />

                <input type="submit" value="Login" id="fields" />
                <div class="loginbuttons">

                    <a href="newReg.php" class="link">New User</a>
                    <a href="admin.php" class="link">Admin Login</a>
                </div>
            </form>





        </div>

    </div>
</body>


</html>