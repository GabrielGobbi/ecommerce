<?php


use \Hcode\PageAdmin;
use \Hcode\Model\user;
use \Hcode\Model\Category;

$app->get('/admin', function() {
    
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");
	

});

$app->get('/admin_login', function() {
    
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
		]);

	$page->setTpl("login");
	

});

$app->get('/admin/login', function() {
    
 	/*User::login($_POST["login"], $_POST["password"]);*/

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
		]);

	$page->setTpl("login");

	/*header("location: /admin");
	exit;*/
	

});

$app->post('/admin/login', function() {
    
	User::login($_POST["login"], $_POST["password"]);

	/*$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
		]);

	$page->setTpl("login");*/

	header("location: /admin");
	exit;
	

});

$app->get('/admin/logout', function() {
    
	User::logout();

	header("Location: /admin/login");
	exit;

});


?>