<?PHP
//===== DB Connection =====//
$conn = mysqli_connect("localhost","s10144101","s10144101","lynn");


if (mysqli_connect_errno()) 
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} 
// else	
	// {
	// echo "Connected to MySQL at mysql_connection.inc.php<br>";
	// }
//===== CHARSET UTF-8 =====//
//mysqli_set_charset($conn,"utf8mb4");
if (!mysqli_set_charset($conn, "utf8mb4")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($conn));
} 
//IE add this line
header("Content-Type: text/html;charset=UTF-8");
return $conn;	


?>



