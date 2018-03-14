
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
    <link href="twitter.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
</head>
<body>
<h1>FamTwi</h1>
<div>新規登録</div>

<form class="register" name="register" method="post" action="/register/insert">
    <div class="form-group">
        <label for="exampleInputEmail1">User Name</label>
        <input type="text" class="userName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User Name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">登録</button>
</form>
<!--<form class="register" method="post" action="/register/insert">-->
<!--    <div>-->
<!--        <span>FamilyName</span>-->
<!--        <input type="text" class="famName" name="famName">-->
<!--    </div>-->
<!--    <div>-->
<!--        <span>Password</span>-->
<!--        <input type="text" class="famPass" name="famPass">-->
<!--    </div>-->
<!--    <div>-->
<!--        <input type="submit" value="登録" name="register">-->
<!--    </div>-->
<!--    <div>-->
<!--    </div>-->
<!--</form>-->

<a href="/famTwi">戻る</a>
</body>
</html>
