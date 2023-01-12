<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:admin.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($al, "SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$n=$_POST['name'];
$am=$_POST['amount'];
if($n!=NULL && $am!=NULL)
{
	$sql=mysqli_query($al, "INSERT INTO holiday(name,amount) VALUES('$n','$am')");
	if($sql)
	{
		$info="Successfully Added";
	}
	else
	{
		$info="Package Name Already Exists";
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

        <div align="center"> <span class="Head"><h4>Manage Holiday Packages</h4><br />
                <br />
                <form method="post" action="">
                    <table border="0" cellpadding="2" cellspacing="2" class="design">
                        <tr>
                            <td align="center" class="info"><?php echo $info;?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="name" placeholder="Enter Holiday Package Name" size="40"
                                    class="fields" required="required" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="amount" placeholder="Enter Amount Per Member" size="40"
                                    class="fields" required="required" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td align="center"><input type="submit" value="ADD" class="fields" /></td>
                        </tr>
                    </table>
                </form>
                <br />

                <a href="ahome.php" class="link">HOME</a>
                <br />


                <span class="subHead">Current Holiday Packages<br /></span><br />

                <table border="0" cellpadding="5" cellspacing="5" class="t">
                    <tr class="labels t">
                        <th class="t">Sr.No.</th>
                        <th class="t">Package Name</th>
                        <th class="t">Amount Per Member</th>
                        <th class="t">Delete</th>
                    </tr>
                    <?php
$u=1;
$x=mysqli_query($al, "SELECT * FROM holiday");
while($y=mysqli_fetch_array($x))
{
	?>
                    <tr class="labels t">
                        <td class="t"><?php echo $u;$u++;?></td>
                        <td class="t"><?php echo $y['name'];?></td>
                        <td class="t"><?php echo "INR ".$y['amount'];?></td>
                        <td class="t"><a href="deleteH.php?del=<?php echo $y['id'];?>" class="link">Delete</a></td>
                    </tr>
                    <?php } ?>
                </table>

        </div>
</body>


</html>