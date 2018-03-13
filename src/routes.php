<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

//$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});
//
//$app = new Slim\App(); index.php で指定されてる
//$app->get('/hello/{name}', function ($request, $response, $args) {
//    $response->getBody()->write("Hello, ".$args['name']);
//    return $response;
//});



$app->get('/famTwi', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response,'/index.phtml');
});

$app->get('/famTwi/home', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response,'/twitter.php');
});

$app->get('/famTwi/home/{userName}', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello,".$args['name']);
    return $this->renderer->render($response,'/myPage.php');
});


$app->get('/famTwi/tweet',function(Request $request, Response $response, array $args){
    return $this->renderer->render($response,'/tweet.php');
});

$app->post('/register/insert',function(Request $request, Response $response, array $args){
    $subject = $request->getParsedBodyParam('subject');
    // ここに保存の処理を書く
    // 保存が正常にできたら一覧ページへリダイレクトする
    return $response->withRedirect("/tickets");
    return $this->renderer->render($response,'/registerInsert.php');
});

$app->get('/register',function(Request $request, Response $response, array $args){
    return $this->renderer->render($response,'/register.php');
});


$app->get('/login',function(Request $request, Response $response, array $args){
    return $this->renderer->render($response,'/login.php');
});

//
//$app->post('/tweet/{tweet_id}/like',function(Request $request, Response $response, array $args){
//    return $this->renderer->render($response,'.php');
//});
//
//
//$app->post('/follow/{followed_user_id}',function(Request $request, Response $response, array $args){
//    return $this->renderer->render($response,'.php');
//});


$app->get('/user/{id}',function(Request $request, Response $response, array $args){

    return $this->renderer->render($response,'.php');
});
