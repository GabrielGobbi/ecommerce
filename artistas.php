<?php

use \Hcode\PageAdmin;
use \Hcode\Model\user;
use \Hcode\Model\Category;
use \Hcode\Model\Product;
use \Hcode\Model\Artistas;


$app->get("/admin/artistas", function(){
    
    User::verifyLogin();
  	
  	$artistas = Artistas::listAll();

  	$page = new PageAdmin();
  	
  	$page->setTpl("artistas", [
  		'artistas'=>$artistas

  		]);

  

});

$app->get("/admin/artistas/create", function(){
    
	  User::verifyLogin();

  	$page = new PageAdmin();
  	
  	$page->setTpl("artistas-create");
  

});

$app->post("/admin/artistas/create", function(){
    
	User::verifyLogin();

	$artistas = new Artistas();

	$artistas->setData($_POST);

	$artistas->save();

	header("Location: /admin/artistas");
    exit;
  

});

$app->get("/admin/artistas/:idartistas/delete", function($idartistas){
    
    User::verifyLogin();

	$artistas = new Artistas();	

	$artistas->get((int)$idartistas);

	$artistas->delete();

	header('Location: /admin/artistas');
    exit;
  

});

$app->get("/admin/artistas/:idartistas", function($idartistas){
    
	User::verifyLogin();

	$artistas = new Artistas();

	$artistas->get((int)$idartistas);

	$page = new PageAdmin();
  	
  	$page->setTpl("artistas-update", [
  		'artistas'=>$artistas->getValues()

  	]);
});

$app->post("/admin/artistas/:idartsitas", function($idartistas){
    
	User::verifyLogin();

	  $artistas = new Artistas();

    $artistas->get((int)$idartistas);

    $artistas->setData($_POST);

    $artistas->save();

    header("Location: /admin/artistas");
    exit;

});

$app->get("/admin/artistas/:idartistas/products", function($idartistas){

  User::verifyLogin();

  $artistas = new Artistas();

  $artistas->get((int)$idartistas);

  $page = new PageAdmin();

  $page->setTpl("artistas-products", [
    'artistas'=>$artistas->getValues(),
    'productsRelated'=>$artistas->getProducts(),
    'productsNotRelated'=>$artistas->getProducts(false)
  ]);

});

$app->get("/admin/artistas/:artistas/products/:idproduct/add", function($idartistas, $idproduct){

  User::verifyLogin();

  $artistas = new Artistas();

  $artistas->get((int)$idartistas);

  $product = new Product();

  $product->get((int)$idproduct);

  $artistas->addProduct($product);

  header("Location: /admin/artistas/".$idartistas."/products");
  exit;

});

$app->get("/admin/artistas/:artistas/products/:idproduct/remove", function($idartistas, $idproduct){

  User::verifyLogin();

  $artistas = new Artistas();

  $artistas->get((int)$idartistas);

  $product = new Product();

  $product->get((int)$idproduct);

  $artistas->removeProduct($product);

  header("Location: /admin/artistas/".$idartistas."/products");
  exit;

});

?>