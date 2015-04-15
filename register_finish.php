<?php
session_start();
$cap = 'notEq'; // This php variable is passed to jquery variable to show alert
include("mysql_connect.inc.php");
//include("captcha.php");
$name= $_POST['name'];
$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$phone = $_POST['phone'];
$hash = md5( rand(0,1000) );
//echo $hash;
// Captcha verification is Correct. Do something here!
   
    if($id != null && $pw != null && $pw2 != null && $pw == $pw2 && $_POST['captcha'] == $_SESSION['cap_code'] && preg_match('/^([.0-9a-z]+)@([0-9a-z]+).([.0-9a-z]+)$/i',$id) == true && preg_match("/09[0-9]{2}[0-9]{6}/", $phone) == true )
{
        //新增資料進資料庫語法
        $cap = 'Eq';
       /* $sql = "CREATE TABLE `search_$id` (searchnum int(7)AUTO_INCREMENT UNIQUE ,master_id int(7),english varchar(80),chinese varchar(250),time timestamp, PRIMARY KEY (searchnumber))DEFAULT CHARACTER set utf8 COLLATE utf8_unicode_ci";
		$result = $conn -> query($sql);
		$sql = "CREATE TABLE `quiz_$id` (quiznum int(7)AUTO_INCREMENT UNIQUE ,master_id int(7),english varchar(80),correct_time tinyint(1),error_time tinyint(1) ,time timestamp, PRIMARY KEY (testnumber))DEFAULT CHARACTER set utf8 COLLATE utf8_unicode_ci";
		$result = $conn -> query($sql) ;
        $sql = "INSERT INTO lynn.member(name, email, password, phone , hash) VALUES ('$name','$id', '$pw', '$phone' ,'$hash' )";
        */
        
        if(mysqli_query($conn, $sql))
        {
        /*    
        $sql1= "CREATE TABLE $id (master_id int(7),english varchar(80),chinese varchar(250) ,date date ,counter int(5))DEFAULT CHARACTER set utf8 COLLATE utf8_unicode_ci" or die("Error in the consult.." . mysqli_error($conn));
        $result1 = $conn->query($sql1);
        */
                require_once "Mail.php";

				$from = '<s10144101040709@gmail.com>';
				$to = "<$id>";
				$subject = '帳號 | 驗證';
				$body = "
                感謝您加入會員!
                你的帳號已被建立, 請點以下連結來啟用帳號
 
                ------------------------
                帳號: $id
                密碼: $pw
                ------------------------
 
                請點連結來啟用帳號:
                http://www.polochen.com/lynn/verify.php?email=$id&hash=$hash 
                
                ";

				$headers = array(
				'From' => $from,
				'To' => $to,
				'Subject' => $subject
				);

				$smtp = Mail::factory('smtp', array(
				'host' => 'ssl://smtp.gmail.com',
				'port' => '465',
				'auth' => true,
				'username' => 's10144101040709@gmail.com',
				'password' => 'poloissohandsome'
				));

				$mail = $smtp->send($to, $headers, $body);
				
                echo $from;
                echo $to;
				echo '已發送認證信至帳號信箱!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '註冊失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
        }

}

  else if($name == null)
  {    
    echo '請輸入姓名';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
  }    
  else if($id == null)
  {
     echo '請輸入帳號';
     echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
   }
  else if (preg_match('/^([.0-9a-z]+)@([0-9a-z]+).([.0-9a-z]+)$/i',$id) != true) 
{
        echo '請輸入正確電子信箱格式';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=register.php>';
}
  
   else if($pw == null)
   {    
    echo '請輸入密碼';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
   } 
   else if($phone == null)
   {    
    echo '請輸入手機';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
   } 
   else if (preg_match("/09[0-9]{2}[0-9]{6}/", $phone) != true) 
{
        echo '請輸入正確手機格式';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=register.php>';
}
  else if($id != null && $pw != null && $pw2 != null && $pw != $pw2 )
   {    
    echo '兩次密碼不同，重新輸入';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
   } 

  
  else if($_POST['captcha'] != $_SESSION['cap_code'])
   {    
    echo '驗證碼錯誤';
    $cap = '';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
   } 
   



?>