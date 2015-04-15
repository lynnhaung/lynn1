<?php // error_reporting(0);?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include ("mysql_connect.inc.php");
             
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysqli_escape_string($conn,$_GET['email']); // Set email variable
    $hash = mysqli_escape_string($conn,$_GET['hash']); // Set hash variable
                 
    $search = "SELECT email, hash, active FROM member WHERE email='$email' AND hash='$hash' AND active='0'" or die("Error in the consult.." . mysqli_error($conn)); 
    $result = $conn->query($search);
    $match  = mysqli_num_rows($result);
                 
    if($match > 0){
        // We have a match, activate the account
    $sql = "UPDATE member SET active='1' WHERE email='$email' AND hash='$hash' AND active='0'" or die("Error in the consult.." . mysqli_error($conn));
        $result1 = $conn->query($sql);
        echo '<div class="statusmsg">你的帳號已被啟用，請從首頁登入</div>';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">無效連結/帳號已啟用</div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">啟用帳號失敗</div>';
}


?>