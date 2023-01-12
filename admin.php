<?php
include("setting.php");
session_start();
if(isset($_SESSION['aid']))
{
	header("location:ahome.php");
}
$e=mysqli_real_escape_string($al, $_POST['aid']);
$p=mysqli_real_escape_string($al, $_POST['pass']);
if($_POST['aid']!=NULL && $_POST['pass']!=NULL)
{
	$pp=sha1($p);
	$sql=mysqli_query($al, "SELECT * FROM admin WHERE aid='$e' AND password='$pp'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['aid']=$e;
		header("location:ahome.php");
	}
	else
	{
		$info="Incorrect Admin ID or Password";
	}
}
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


        <span class="subHead">Admin Login</span><br />
        <br />

        <form method="post" action="">
            <table border="0" align="center" cellpadding="5" cellspacing="5" class="design">
                <tr>
                    <td colspan="2" class="info" align="center"><?php echo $info;?></td>
                </tr>
                <tr>
                    <td class="labels">Admin ID : </td>
                    <td><input type="text" size="25" name="aid" class="fields" placeholder="Enter Admin ID"
                            required="required" /></td>
                </tr>
                <tr>
                    <td class="labels">Password : </td>
                    <td><input type="password" size="25" name="pass" class="fields" placeholder="Enter Password"
                            required="required" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Login" class="fields" id="fields" /></td>
                </tr>


                <tr>
                    <td colspan="2" align="center"><a href="index.php" id="fields">BACK</a></td>
                </tr>
            </table>

        </form>


    </div>
</body>



</html>