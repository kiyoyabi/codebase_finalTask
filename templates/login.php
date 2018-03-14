<?php
// ログイン済みの場合はリダイレクト
if( isset($_SESSION['user']) != "") {
    header("Location: /famPhoto/home");
}?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FamilyTwi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="famPhoto.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
</head>
<body>
<h1>FamTwi</h1>
<h3>ログイン</h3>
<form class="login" name="login" method="post" action="/login/confirm">
    <div class="form-group">
        <label for="exampleInputEmail1">User Name</label>
        <input type="text" name="userName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UserName">
        <!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="userPass" class="form-control" id="exampleInputPassword1" placeholder="UserPass">
    </div>
    <button type="submit" class="btn btn-primary">ログインする</button>
</form>

<a href="/famPhoto">戻る</a>
</body>
</html>
