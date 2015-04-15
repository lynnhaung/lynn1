<html>
<head>
<title> Search </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<?php session_start(); ?>
    <body>
<?php
include("mysql_connect.inc.php");
$id = $_SESSION['email'];
$keyword = $_POST['keyword'];

//$keyword = mysql_real_escape_string($keyword);

$query = "SELECT * from lynn.pydict WHERE english = '$keyword'" or die("Error in the consult.." . mysqli_error($conn)); 

//execute the query. 

$result = $conn->query($query); 

//display information: 
if(!empty($result)){
while($row = $result->fetch_array()) {
    
echo "$row[0] - 英文單字：$row[1] <br><br> 中文解釋：$row[2]<br>";
		$m=$row["0"];
		$e=$row["1"];
		$c=$row["2"];
		echo "曾查詢此單字:";
		$sql="SELECT COUNT(*) as c FROM `search_record` WHERE `english`= '$keyword' && `member`='$id'" or die("Error in the consult.." . mysqli_error($conn)); 
        
       $result1 = $conn->query($sql); 
       //echo $sql;
		//$result = mysql_query($sql) or die("無法執行：".mysql_error());
		//$row=mysqli_fetch_array($result);
       if(!empty($result1)){
        while($rrow = $result1->fetch_array()){
		echo $rrow['c'];
        //var_dump($rrow);
		echo "次";
		$sql="INSERT INTO `lynn`.`search_record` (`master_id`, `english`, `chinese`, `time`, `member`) VALUES ( '" . $m. "','" . $e. "', '" . $c. "',now(), '".$id."' );";
		//$result = mysql_query($sql) or die("無法執行：".mysql_error());
        $result2 = $conn->query($sql);
		echo '<br>';
        
        $sql = "update search_record SET times = ".$rrow['c']." where english = '$keyword'";
    $result3 = $conn->query($sql);
	
       }
       }
    
/*
$mid=$row['master_id'];
//echo $mid;
//echo '<br>';
$eng=$row['english'];
//echo $eng;
//echo '<br>';
$chi=$row['chinese'];
//$time=date("Y-m-d");
//echo $chi;
//$sql = "CREATE TABLE $id (master_id int(7),english varchar(80),chinese varchar(250) ,date date ,counter int(5))DEFAULT CHARACTER set utf8 COLLATE utf8_unicode_ci" or die("Error in the consult.." . mysqli_error($conn)); 
$sql="INSERT INTO `lynn`.$id (`master_id`,`english`, `chinese` , `date` ,`counter`) VALUES ( '".$mid."','".$eng."', '".$chi."' , now() , '1');" or die("Error in the consult.." . mysqli_error($conn)); 
//$result = mysql_query($sql) or die("無法執行：".mysql_error($conn));
$result1 = $conn->query($sql);
//$result2 = $conn->query($sql1);
    echo $row['english'];
    echo '<br>';
    echo $row['chinese'];
*/    
} 
}
else
{
 //var_dump($result);
 echo '查無此單字!';
}

echo "<div> <a href = search.php>繼續查詢</a></div>";


?>
</body>
</html>