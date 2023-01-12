<?php
include("setting.php");
$n=$_POST['name'];
$e=$_POST['email'];
$c=$_POST['contact'];
$p=sha1($_POST['pass']);
if($n!=NULL && $e!=NULL && $c!=NULL && $_POST['pass']!=NULL)
{
	$sql=mysqli_query($al, "INSERT INTO customers(name,email,contact,password) VALUES('$n','$e','$c','$p')");
	if($sql)
	{
		$info="Successfully Registered";
	}
	else
	{
		$info="Email ID Already Exists";
	}
}
?>

<!DOCTYPE html>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Holiday Hype</title>
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

<div align="center"><br />
<br />
<span class="subHead">Registration Panel</span><br />
<br />

<form method="post" action="">
<table border="0" align="center" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
<tr><td class="labels">Name : </td><td><input type="text" size="25" name="name" class="fields" placeholder="Enter Full Name" required="required" autocomplete="off" /></td></tr>
<tr><td class="labels">Email : </td><td><input type="email" size="25" name="email" class="fields" placeholder="Enter Email ID" required="required" autocomplete="off" /></td></tr>
<tr><td class="labels">Contact : </td><td><input type="text" size="25" name="contact" class="fields" placeholder="Enter Mobile No." required="required" autocomplete="off" /></td></tr>
<tr><td class="labels">Password : </td><td><input type="password" size="25" name="pass" class="fields" placeholder="Enter Password" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Login" class="fields" id="fields"/></td></tr>
</table>
</form>
<br />
<br />
<a href="index.php" class="link" id="fields">HOME</a>
</div>
</body>

</html>