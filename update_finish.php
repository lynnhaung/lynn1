<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$id = $_SESSION['email'];
$phone = $_POST['phone'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
echo $id ,'<br>';
if($id != null && $pw != null && $pw2 != null && $pw == $pw2 && $phone == "/09[0-9]{2}[0-9]{6}/")
{
       	$sql = "update member SET  `password` = '".$pw."',`phone` = '".$phone."' where email = '$id' ";
        if(mysqli_query($conn, $sql))
        {
                echo '<br>更新成功!<br>請重新登入!';
				unset($_SESSION['id']);
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '<br>更新失敗!';
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=update.php>';
        }
}

else if($pw == null )
{
        echo '請輸入密碼';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=update.php>';
}

else if($phone = null )
{
        echo '請輸入手機號碼';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=update.php>';
}


else if($id != null && $pw != null && $pw2 != null && $pw != $pw2)
{
        echo '兩次密碼不同，請重新輸入';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=update.php>';
}

else if (preg_match("/09[0-9]{2}[0-9]{6}/", $phone) != true) 
{
        echo '請輸入正確手機格式';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=update.php>';
}

else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>