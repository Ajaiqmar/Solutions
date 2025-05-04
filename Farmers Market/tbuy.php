<?php
	$val = sizeof($_GET);
	if($val==0)
	{
		echo "<script>location.href='tlogin.html'</script>";
	}
?>
<?php
  $val = $_GET["key"];
	$sellname = $_GET["name"];
	$sellemail = $_GET["email"];
	$product = $_GET["pro"];
	$buyemail = "";
	$buyphone = "";

	$conn = new mysqli("localhost","root","","rural");

	if($conn -> connect_error)
	{
		echo "ERROR";
	}

	$sql = "SELECT `username`,`email`,`phonenumber` FROM `signup`;";
	$table = mysqli_query($conn,$sql);
	$n = mysqli_num_rows($table);

	while($n!=0)
	{
		$row = mysqli_fetch_assoc($table);
		if($row["username"]==$val)
		{
			$buyemail = $row["email"];
			$buyphone = $row["phonenumber"];
			break;
		}
		$n-=1;
	}

	require_once __DIR__.'/vendor/autoload.php';

	use Twilio\Rest\Client;

	$sid = "";
	$token = "";
	$twilio = new Client($sid, $token);

	$message = $twilio->messages
                  ->create("", // to
                           [
                               "body" => "அன்பே $sellname, $val வாங்க கோரியுள்ளது $product உங்கள் பிடியில் இருந்து. வாங்குபவரின் மின்னஞ்சல் முகவரி $buyemail மற்றும் வாங்குபவரின் தொலைபேசி எண் $buyphone.",
                               "from" => "+"
                           ]
                  );

	print($message->sid);

	if(mail($sellemail,"உங்கள் தயாரிப்பு வாங்க கோரிக்கை","அன்பே $sellname, $val வாங்க கோரியுள்ளது $product உங்கள் பிடியில் இருந்து. வாங்குபவரின் மின்னஞ்சல் முகவரி $buyemail மற்றும் வாங்குபவரின் தொலைபேசி எண் $buyphone."))
	{
		echo "<script>alert('கோரிக்கை செய்யப்பட்டது.')</script>";
		echo "<script>location.href='tmainproduct.php?key=$val'</script>";
	}
	else {
		echo "ERROR";
	}

?>
