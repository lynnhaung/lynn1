<?php session_start(); error_reporting(0);?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<style>
legend {
    display: block;
    padding-left: 2px;
    padding-right: 2px;
    border: none;
}
</style>
</head>
<body>


<?php
include("mysql_connect.inc.php");
$id = $_SESSION['email'];
$cor = $_SESSION['cor'];
echo $id, '，您好';
echo '<br>';
echo '<a href="logout.php">登出</a>  <br><br>';
echo '<a href="member_index.php">會員中心</a> <br><br>';
?>


<?php
$Rand = Array();
for ($i = 1; $i <= 4; $i++) 
{
    $randval = mt_rand(1,475); 
    if (in_array($randval, $Rand)) 
	{
        $i--;
    }
	else
	{
        $Rand[] = $randval;
    }
}
$a = $Rand[0];
$b = $Rand[1];
$c = $Rand[2];
$d = $Rand[3];
/*
$db=mysql_connect('localhost','s10144101','s10144101') or die('無法連上資料庫伺服器');
  mysql_select_db('lynn',$db) or die('無法連上資料庫');
*/
$query = "select * from TOEFL_IS_600 where id = '$a'" or die("Error in the consult.." . mysqli_error($conn)); 
//$sql="select * from pydict where master_id = '$a'";
$result = $conn->query($query); 
//$result = mysql_query($sql,$db) or die("無法執行：".mysql_error());
if($data=mysqli_fetch_assoc($result))
{
$core = $data['english'];
echo "Q:$core";
echo '<br>';
}
$_SESSION['cor'] = $a;

shuffle($Rand);
$a = $Rand[0];
$b = $Rand[1];
$c = $Rand[2];
$d = $Rand[3];

$query="select * from TOEFL_IS_600 where id = '$a'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$eca = $data['english'];
}
$query="select * from TOEFL_IS_600 where id = '$b'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ecb = $data['english'];
}
$query="select * from TOEFL_IS_600 where id = '$c'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ecc = $data['english'];
}
$query="select * from TOEFL_IS_600 where id = '$d'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ecd = $data['english'];
}
$query = "select * from TOEFL_IS_600 where id = '$a'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
//$sql="select * from pydict where master_id = '$a'";
//$result = mysql_query($sql) or die("無法執行：".mysql_error());
if($data=mysqli_fetch_assoc($result))
{
$ca = $data['meaning'];
}
$query = "select * from pydict where english = '$eca'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$cca = $data['chinese'];
}
$query = "select * from TOEFL_IS_600 where id = '$b'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
//$sql="select * from pydict where master_id = '$b'";
//$result = mysql_query($sql) or die("無法執行：".mysql_error());
if($data=mysqli_fetch_assoc($result))
{
$cb = $data['meaning'];
}
$query = "select * from pydict where english = '$ecb'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ccb = $data['chinese'];
}
$query = "select * from TOEFL_IS_600 where id = '$c'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
//$sql="select * from pydict where master_id = '$c'";
//$result = mysql_query($sql) or die("無法執行：".mysql_error());
if($data=mysqli_fetch_assoc($result))
{
$cc = $data['meaning'];
}
$query = "select * from pydict where english = '$ecc'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ccc = $data['chinese'];
}
$query = "select * from TOEFL_IS_600 where id = '$d'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
//$sql="select * from pydict where master_id = '$d'";
//$result = mysql_query($sql) or die("無法執行：".mysql_error());
if($data=mysqli_fetch_assoc($result))
{
$cd = $data['meaning'];
}
$query = "select * from pydict where english = '$ecd'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ccd = $data['chinese'];
}

?>
   

<br>
<br>
<form method="get"> 
<div style="width: 300px;">
<fieldset>
<legend>選擇答案</legend>
<input type="button" value="<?php echo "(A)$ca"; echo "$cca"; ?>" onClick="this.form.action='quiz_600.php';this.form.submit();"> 
<input type="hidden" value="<?php echo $a; ?>" name="ans" >
</form>
<br>
<br>
<form method="get"> 
<input type="button" value="<?php echo "(B)$cb"; echo "$ccb"; ?>" onClick="this.form.action='quiz_600.php';this.form.submit();"> 
<input type="hidden" value="<?php echo $b; ?>" name="ans" >
</form>

<form method="get"> 
<input type="button" value="<?php echo "(C)$cc"; echo "$ccc"; ?>" onClick="this.form.action='quiz_600.php';this.form.submit();"> 
<input type="hidden" value="<?php echo $c; ?>" name="ans" >
</form>

<form method="get"> 
<input type="button" value="<?php echo "(D)$cd"; echo "$ccd"; ?>" onClick="this.form.action='quiz_600.php';this.form.submit();"> 
<input type="hidden" value="<?php echo $d; ?>" name="ans" >
</fieldset>
</div>
</form>

<?php

if($_GET[ans] != null)
{
if($_GET[ans] == $cor)
{
    echo '<br>';
	echo '<br>';
	echo "正確";
	echo '<br>';
	$sql="select * from TOEFL_IS_600 where id = '$cor'" or die("Error in the consult.." . mysqli_error($conn)); 
	$result = $conn->query($sql);
	if($data=$result -> fetch_row())
	{
	$core = $data[2];
	}
	$sql = "insert into quiz_600_record (master_id, english, correct_time, error_time, time, member) values ( '".$cor."','".$core."', '1',  '', now(), '".$id."'  )"; 
	$result = $conn->query($sql);
    //$sql = "update quiz_600_record SET correct_time = correct_time +1 where english = '$core'";
    //$result = $conn->query($sql);
	echo "此單字累計正確";
	$sql="SELECT COUNT(*) AS C1 FROM quiz_600_record WHERE `master_id`=$cor AND `correct_time`= '1'" or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	echo "次，錯誤";
	$sql="SELECT COUNT(*) AS C2 FROM quiz_600_record WHERE `master_id`=$cor AND `correct_time`= '0'" or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	echo "次。";
    
    //$sql = "Update TOEFL_IS_600 SET lala_correct = lala_correct +1 where english = '$core'";
    //$result = $conn->query($sql);
}
else if($_GET[ans] != $cor)
{
    echo '<br>';
	echo '<br>';
    echo "錯誤";
	echo '<br>';
	$sql="select * from TOEFL_IS_600 where id = '$cor'" or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	if($data=$result -> fetch_row())
	{
	$core = $data[2];
	}
	$sql = "insert into quiz_600_record (master_id, english, correct_time, error_time, time, member) values ( '".$cor."','".$core."', '',  '1', now(), '".$id."'  )"; 
	$result = $conn->query($sql);
    //$sql = "update quiz_600_record SET error_time = error_time +1 where english = '$core'";
    //$result = $conn->query($sql);
	echo "此單字累計正確";
	$sql="SELECT COUNT(*) AS C1 FROM quiz_600_record WHERE `master_id`=$cor AND `correct_time`= '1'" or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	echo "次，錯誤";
	$sql="SELECT COUNT(*) AS C2 FROM quiz_600_record WHERE `master_id`=$cor AND `correct_time`= '0'" or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	echo "次。";
    
    //$sql = "Update TOEFL_IS_600 SET lala_incorrect = lala_incorrect +1 where english = '$core'";
    //$result = $conn->query($sql);
}

 $sql="SELECT *  COUNT(`english`) AS 總查詢次數 FROM `quiz_600_record`  WHERE member = '$id',correct_time = 1 GROUP BY english" or die("Error in the consult.." . mysqli_error($conn));
if ($result=mysqli_query($sql))
  {
  $rowcount=mysqli_num_rows($result);
  }
echo '已完成';
echo $rowcount;
echo '/475';

$sql="select * from TOEFL_IS_600 where id = '$cor'" or die("Error in the consult.." . mysqli_error($conn));
$result = $conn->query($sql);

while($data=$result -> fetch_array()){
echo "<br> - 英文單字： " . $data[2]. "<br>- 英文解釋： " . $data[6]. "";
    
}
$sql="select * from pydict where english = '$core'" or die("Error in the consult.." . mysqli_error($conn));
$result = $conn->query($sql);
    
while($data=$result -> fetch_array()){
echo "<br> - 中文解釋： " . $data[2]. " ";
}
}
?>
 