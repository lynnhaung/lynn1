<html>
<head>
<title> Search </title>
</head>
<body>
    


<?PHP

//===== DB Connection & Session  =====//
session_start(); 
include("mysql_connect.inc.php");

$id = $_SESSION['email'];
echo $id, '，您好', "<div> <a href = logout.php>登出</a></div>";
echo '<a href="member_index.php">會員中心</a>  <br><br>';

?>

<div style="width: 500px; margin: 80px auto 0 auto;">
    <form name="form" method="post" action="search_finish.php">
    查詢單字:<input type="text" name="keyword" />
    <input type="submit" name="button" value="查詢" />
    </form>

<?PHP
if($_SESSION['email'] != null)
{
    


}
else
{
        echo '您尚未登入，請登入';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}

?>
</div>

   <div align="right">
  <h5>近期查詢:</h5>

  

<p align="right">
<?php
 $sql="SELECT `english` AS 英文,MAX(`time`) AS 最後查詢時間,COUNT(`english`) AS 總查詢次數 FROM `search_record` WHERE  `member`='$id' GROUP BY `english` ORDER BY MAX(`time`) DESC limit 0, 10";
 $res = $conn->query($sql);
 echo "<table border=2 align='right'><tr>";
 while($field=$res->fetch_field())
 {
   echo "<th>{$field->name}</th>";
 }
 echo "</tr>";
 while($row=$res->fetch_row()){
  echo "<tr>";
  foreach($row as $value){
   echo "<td>$value</td>";
  }
  echo "</tr>";
 }
 echo "</table>"; 

 $res->free();

//$keyword = $_POST['keyword'];
//echo '<br>';
//echo "-近期查詢-";
/*
echo '<br>';
$sql="select * from search_record where `member`='$id' order by searchnum DESC limit 0, 10"or die("Error in the consult.." . mysqli_error($conn)); 

//$result = mysqli_query($sql) or die("無法執行：".mysqli_error());
$result = $conn->query($sql); 

while ($search = mysqli_fetch_array($result))
{
echo $search['english'];
echo "-";
echo $search['time'];
echo '<br>';
*/


//$query = "SELECT * from lynn.pydict WHERE english = '$keyword'" or die("Error in the consult.." . mysqli_error($conn)); 
/*
$sql="SELECT COUNT(*) FROM search_record WHERE `english`= '$keyword'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($sql); 
//$result = mysql_query($sql) or die("無法執行：".mysql_error());
$row=mysqli_fetch_array($result);
while($row = mysqli_fetch_row($result))
{
echo "-";
echo "查詢";
echo $row['COUNT(*)'];
echo "次";
echo '<br>';

}
*/
/*
  $db=mysql_connect('localhost','s10144101','s10144101') or die('無法連上資料庫伺服器');
  mysql_select_db('lynn',$db) or die('無法連上資料庫');
  $sql="select english from $id;";
  $result=mysql_query($sql,$db);
  mysql_close($db);
  $no_fields=mysql_num_fields($result);

  echo "<table>";
  while($x=mysql_fetch_row($result)){
     echo "<tr>";
     for($j=0;$j<$no_fields;$j++)
        echo "<td> $x[$j]</td>";
     echo "</tr>";
  }
  echo "</table>";
*/
?>    
</div>

