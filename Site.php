<?php


use \Hcode\Page;
use \Hcode\Model\product;
use \Hcode\Model\Category;
use \Hcode\Model\Artistas;

$app->get('/', function() {
    
	$products = Product::listAll();

	$page = new Page();

	$page->setTpl("index", [
		'products'=>Product::checklist($products)
		]);
	

});

$app->get('/acervo', function() {
    
	$products = Product::listAll();

	$page = new Page();

	$page->setTpl("acervo", [
		'products'=>Product::checklist($products)
		]);
	
});

$app->get('/products/acervo', function() {
    
	$products = Product::listAll();

	$page = new Page();

	$page->setTpl("acervo", [
		'products'=>Product::checklist($products)
		]);
	

});

$app->get("/categories/:idcategory", function($idcategory){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$category = new Category();

	$category->get((int)$idcategory);

	$pagination = $category->getProductsPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/categories/'.$category->getidcategory().'?page='.$i,
			'page'=>$i
		]);
	}

	$page = new Page();

	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'products'=>$pagination["data"],
		'pages'=>$pages
	]);

});

$app->get("/acervo/:desurl", function($desurl){

	$product = new Product();

	$product->getFromURL($desurl);

	$page = new Page();

	$page->setTpl("product-detail", [
		'product'=>$product->getValues()
		
	]);

});

$app->get("/artistas/:desurl", function($desurl){

	$artistas = new Artistas();

	$artistas->getFromURL($desurl);

	$page = new Page();

	$page->setTpl("artistas-detail", [
		'artistas'=>$artistas->getValues()
		
	]);

});

$app->get('/artistas', function() {
    
	$artistas = Artistas::listAll();

	$page = new Page();

	$page->setTpl("artistas", [
		'artistas'=>Artistas::checklist($artistas)
		]);
	

});


?>