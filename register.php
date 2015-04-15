<html>
    <body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="register_finish.php">
姓名：<input type="text" name="name" /> <br>
帳號(Email): <input type="text" name="id" /> <br>
密碼: <input type="password" name="pw" /> <br>
再一次密碼: <input type="password" name="pw2" /> <br>
手機: <input type="text" name="phone" /> <br>

<label>請輸入驗證碼(點擊圖片可更換)</label>
<input type="text" name="captcha" id="captcha" /><br>
<img onclick="this.src='captcha.php?rand='+Math.random()" src="captcha.php" title="點擊更換驗證碼" />
<!-- 備註：<textarea name="other" cols="45" rows="5"></textarea> <br> -->
<input type="submit" name="button" value="送出" />
</form>
        </body>
</html>