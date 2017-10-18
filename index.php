<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\user;
use \Hcode\Model\Category;

$app = new Slim();

$app->config('debug', true);

require_once("site.php");
require_once("admin.php");
require_once("users.php");
require_once("categorys.php");
require_once("products.php");
require_once("functions.php");
require_once("artistas.php");

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$app->run();

 ?>