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

<div align="center">

 <span class="subHead">Customers Booking<br /></span><br />

<table border="0" cellpadding="5" cellspacing="5" class="t">
<tr class="labels t"><th class="t">Sr.No.</th><th class="t">E-Mail</th><th class="t">Package Name</th>
<th class="t">Journey By</th>
<th class="t">Total Amount</th>
<th class="t">Members</th>
<th class="t">Date</th>
<th class="t">Status</th>
<th class="t">Delete</th></tr>
<?php
$u=1;
$x=mysqli_query($al, "SELECT * FROM bookings");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels t">
<td class="t"><?php echo $u;$u++;?></td>
<td class="t"><?php echo $y['email'];?></td>
<td class="t"><?php echo $y['package'];?></td>
<td class="t"><?php echo $y['journey'];?></td>
<td class="t"><?php echo "INR ".$y['amount'];?></td>
<td class="t"><?php echo $y['members'];?></td>
<td class="t"><?php echo $y['date'];?></td>
<?php if($y['status']==0)
{
	
?> <td class="t"><a href="app.php?a=<?php echo $y['id'];?>" class="link">Approve</a></td>
<?php } else { ?>
<td class="t">Approved</td>
<?php }
?>
<td class="t"><a href="deleteH.php?dd=<?php echo $y['id'];?>" class="link">Delete</a></td>
</tr>
<?php } ?>
</table>
<br />
<br />
<a href="ahome.php" class="link">HOME</a>
</div>
</body>

</html>