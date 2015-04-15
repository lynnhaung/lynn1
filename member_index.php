<?PHP

//===== DB Connection & Session  =====//
session_start(); 
include("mysql_connect.inc.php");

$id = $_SESSION['email'];
echo $id, '，您好', "<div> <a href = logout.php>登出</a></div>";
echo '<a href = update.php>修改資料</a> <br>';
echo '<br>';
echo '<a href = search.php>查詢單字</a><br>';
echo '<br>';
echo '<a href = quiz.php>進行測驗</a><br>';
echo '<a href = quiz_7000.php>7000測驗</a><br>';
echo '<a href = quiz_600.php>TOEFL測驗</a><br>';
?>
