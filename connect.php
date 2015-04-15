<?PHP
session_start(); 
include("mysql_connect.inc.php");
?>
<?PHP
$id = $_POST['id'];
$pw = $_POST['pw'];

$sql = mysqli_query ($conn, "SELECT * FROM lynn.member WHERE email = '$id' ");
$row = mysqli_fetch_array ($sql);

if($id != null && $pw != null && $row[2] == $id && $row[3] == $pw) {
	$_SESSION['email'] = $id;
	echo '登入成功!';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=member_index.php>';
	}
else {
    echo '登入失敗';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
	}
?>