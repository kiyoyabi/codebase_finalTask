
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>FamilyTwi</title>
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
</head>
<body>
<h1>FamTwi</h1>
<div>新規登録</div>
<form class="register" method="post" action="/register/insert">
    <div>
        <span>FamilyName</span>
        <input type="text" class="famName" name="famName">
    </div>
    <div>
        <span>Password</span>
        <input type="text" class="famPass" name="famPass">
    </div>
    <div>
<!--        <input type="submit" value="登録" name="register">-->
        <button type="submit" value="登録">登録</button>
    </div>
    <div>
    </div>
</form>
<a href="/famTwi">戻る</a>
</body>
</html>
