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



$app->get('/famPhoto', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response,'/index.phtml');
});

$app->get('/famPhoto/home/{$userName}', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response,'/famPhoto.php');
});

$app->get('/famPhoto/home/{$famName}', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello,".$args['name']);
    return $this->renderer->render($response,'/family.php');
});

$app->get('/famPhoto/home/familyRoomFind', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello,".$args['name']);
    return $this->renderer->render($response,'/familyFind.php');
});


$app->get('/famPhoto/tweet',function(Request $request, Response $response, array $args){
    return $this->renderer->render($response,'/tweet.php');
});

//$app->post('/register', function (Request $request, Response $response) {
//    $subject = $request->getParsedBodyParam('subject');
//    // ここに保存の処理を書く
//    // 保存が正常にできたら一覧ページへリダイレクトする
//    return $response->withRedirect("/tickets");
//});

$app->post('/register/insert',function(Request $request, Response $response, array $args){
    return $this->renderer->render($response,'/registerInsert.php');
});

$app->get('/register',function(Request $request, Response $response, array $args){
    return $this->renderer->render($response,'/register.php');
});


$app->get('/login',function(Request $request, Response $response, array $args){
    return $this->renderer->render($response,'/login.php');
});

$app->post('/login/confirm',function(Request $request, Response $response, array $args){
    return $this->renderer->render($response,'/loginConfirm.php');
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
