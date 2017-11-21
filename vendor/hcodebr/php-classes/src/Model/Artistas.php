<?php 

namespace Hcode\Model;

use \Hcode\Model;
use \Hcode\DB\Sql;
use \Hcode\Mailer;

class Artistas extends Model {


	public static function listAll()
	{
		$sql = new sql();

		return $sql->select("SELECT * FROM tb_artistas ORDER BY name_artistas");

	}
	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Artistas();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}

	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_artistas_save(:idartistas, :name_artistas, :adesurl, :biografia)", array(

			":idartistas"=>$this->getidartistas(),
			":name_artistas"=>$this->getname_artistas(),
			":adesurl"=>$this->getadesurl(),
			":biografia"=>$this->getbiografia()
			
			));
		
		$this->setData($results[0]);

		Artistas::updateFile();

	}

	public function get($idartistas)
	{
		$sql = new Sql();

		$results =  $sql->select("SELECT * FROM tb_artistas WHERE idartistas = :idartistas",[ 
			':idartistas'=>$idartistas
			]);

		$this->setData($results[0]);

	}

	public function delete()
	{
		$sql = new Sql();

		$sql->query("DELETE  FROM tb_artistas WHERE idartistas = :idartistas", [ 
			':idartistas'=>$this->getidartistas()
			]);
	
	Artistas::updateFile();

	}

	public static function updateFile()
	{

		$artistas = Artistas::listAll();

		$html = [];

		foreach ($artistas as $row) {
			array_push($html, '<li><a href="/artistas/'.$row['idartistas'].'">'.$row['name_artistas'].'</a></li>');
		}

		file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "artistas-menu.html", implode('', $html));

	}


	public function getProducts($related = true)
	{

		$sql = new Sql();

		if ($related === true) {

			return $sql->select("
				SELECT * from tb_products P INNER JOIN tb_artistas A on P.idartistas = A.idartistas 
                    
                    WHERE idproduct IN (
					SELECT P.idproduct
					FROM tb_products P
					
                    INNER JOIN tb_artistasproducts b ON P.idproduct = b.idproduct
                    WHERE b.idartistas = :idartistas
				);
				
			", [
				':idartistas'=>$this->getidartistas()
			]);

		} else {

			return $sql->select("
				SELECT P.*, name_artistas from tb_products P INNER JOIN tb_artistas A on P.idartistas = A.idartistas 
                    
                    WHERE P.idproduct NOT IN (
					SELECT P.idproduct
					FROM tb_products P
					
                    INNER JOIN tb_artistasproducts b ON P.idproduct = b.idproduct
                    WHERE b.idartistas = :idartistas
				);
			", [
				':idartistas'=>$this->getidartistas()
			]);

		}

	}

	public function addProduct(Product $product)
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_artistasproducts (idartistas, idproduct) VALUES(:idartistas, :idproduct)", [
			':idartistas'=>$this->getidartistas(),
			':idproduct'=>$product->getidproduct()
		]);

	}

	public function removeProduct(Product $product)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_artistasproducts WHERE idartistas = :idartistas AND idproduct = :idproduct", [
			':idartistas'=>$this->getidartistas(),
			':idproduct'=>$product->getidproduct()
		]);

	}


/*
	public function getProductsPage($page = 1, $itemsPerPage = 8)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products a
			INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
			INNER JOIN tb_categories c ON c.idartistas = b.idcategory
			WHERE c.idcategory = :idcategory
			LIMIT $start, $itemsPerPage;
		", [
			':idcategory'=>$this->getidcategory()
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>Product::checkList($results),
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}


*/


public function checkPhoto()
	{

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"artistas" . DIRECTORY_SEPARATOR . 
			$this->getidartistas() . ".jpg"
			)) {

			$url = "/res/site/img/artistas/" . $this->getidartistas() . ".jpg";

		} else {

			$url = "/res/site/img/product.jpg";

		}

		return $this->setdesphoto($url);

	}

	public function getValues()
	{

		$this->checkPhoto();

		$values = parent::getValues();

		return $values;

	}

	public function setPhoto($file)
{ 
 if(empty( $file['name'])){
 $this->checkPhoto();
 }else{
 $extension = explode('.', $file['name']);
 $extension = end($extension);
 switch ($extension) {
 case "jpg":
 case "jpeg":
 case "JPG":
 case "JPEG":
 $image = imagecreatefromjpeg($file["tmp_name"]);
 break;
 case "gif":
 $image = imagecreatefromgif($file["tmp_name"]);
 break;
 case "png":
 case "PNG":
 $image = imagecreatefrompng($file["tmp_name"]);
 break;
 }
 $dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
 "res" . DIRECTORY_SEPARATOR . 
 "site" . DIRECTORY_SEPARATOR . 
 "img" . DIRECTORY_SEPARATOR . 
 "artistas" . DIRECTORY_SEPARATOR . 
 $this->getidartistas() . ".jpg";
 imagejpeg($image, $dist);
 imagedestroy($image);
 $this->checkPhoto();
 }
}

public function getFromURL($desurl)
	{

		$sql = new Sql();

		$rows = $sql->select("SELECT *  FROM tb_artistas WHERE desurl = :desurl LIMIT 1 ", [
			':desurl'=>$desurl
		]);

		$this->setData($rows[0]);

	}





}
?>