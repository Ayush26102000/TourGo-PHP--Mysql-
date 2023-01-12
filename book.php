<?php
include("setting.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$a=mysqli_query($al, "SELECT * FROM customers WHERE email='$email'");
$b=mysqli_fetch_array($a);

$name=$b['name'];
$id=$_POST['pack'];
$p=mysqli_query($al, "SELECT * FROM holiday WHERE id='$id'");
$q=mysqli_fetch_array($p);
$rate=$q['amount'];
$pack=$q['name'];
$j=$_POST['j'];
$m=$_POST['mem'];
$d=$_POST['d'];

$amount=$m*$rate;
if($id!=NULL && $j!=NULL && $m!=NULL && $d!=NULL)
{
	$sql=mysqli_query($al, "INSERT INTO bookings(email,package,members,journey,amount,date,status) VALUES('$email','$pack','$m','$j','$amount','$d','0')");
	if($sql)
	{
		$info="Successfully Received Your Booking Info.<br> Total Amount Payable for $m Member(s) is INR $amount";
	}
	else
	{
		$info="Error Please Try Again";
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
    <link
        href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&family=Roboto:wght@100&family=Ubuntu:wght@300&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="background" id="bg">
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

        <div class="book"> <span class="subHead">Book Holiday Package</span> <br />

            <form method="post" action="">

                <?php echo $info;?>
                <h4 class="margin"> Package :</h4>
                <select name="pack" class="fields sele" required>
                    <option value="" selected="selected" disabled="disabled"> - - Select Package - -</option>
                    <?php
 $x=mysqli_query($al, "SELECT * FROM holiday");
 while($y=mysqli_fetch_array($x))
 {
	 ?>
                    <option value="<?php echo $y['id'];?>"><?php echo "INR ".$y['amount']."".$y['name'];?></option>
                    <?php } ?>
                </select>
                <h4 class="margin">Journey By :</h4>
                <select name="j" class="fields sele" required>
                    <option value="" selected="selected" disabled="disabled">- - Ticket By - -</option>
                    <option value="Air">Air</option>
                    <option value="Train">Train</option>
                    <option value="Travels(BUS)">Travels(BUS)</option>
                </select>
                <h4 class="margin sele">Members : </h4>
                <input type="number" class="fields sele" size="5" placeholder="Select Members" required="required"
                    name="mem" />
                <h4 class="margin"> Date :</h4>
                <input type="date" class="fields sele" size="10" placeholder="DD/MM/YYY" required="required" name="d" />

                <input type="submit" value="BOOK NOW" id="fields" />

            </form>
        </div>

        <span class="subHead">Current Holiday Packages<br /></span><br />

        <table border="0" cellpadding="5" cellspacing="5" class="t">
            <tr class="t">
                <th class="t">Sr.No.</th>
                <th class="t">Package Name</th>
                <th class="t">Journey By</th>
                <th class="t">Total Amount</th>
                <th class="t">Date</th>
                <th class="t">Status</th>
                <th class="t">Delete</th>
            </tr>
            <?php
$u=1;
$x=mysqli_query($al, "SELECT * FROM bookings WHERE email='$email'");
while($y=mysqli_fetch_array($x))
{
	?>
            <tr class="labels t">
                <td class="t"><?php echo $u;$u++;?></td>
                <td class="t"><?php echo $y['package'];?></td>
                <td class="t"><?php echo $y['journey'];?></td>
                <td class="t"><?php echo "INR ".$y['amount'];?></td>
                <td class="t"><?php echo $y['date'];?></td>
                <td class="t"><?php if($y['status']==1){echo "Approved";}else{echo "Pending";}?></td>

                <td class="t"><a href="deleteH.php?d=<?php echo $y['id'];?>">Delete</a></td>
            </tr>
            <?php } ?>

        </table>


    </div>
    </div>
</body>


</html>