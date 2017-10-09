<?php 

session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\user;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");
	

});

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


$app->run();

 ?>