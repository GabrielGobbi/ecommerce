<?php  /*

namespace Hcode\Model;

use \Hcode\Model;
use \Hcode\DB\Sql;
use \Hcode\Mailer;

class Product extends Model {


	public static function listAll()
	{
		$sql = new sql();

		return $sql->select("SELECT * FROM tb_products ORDER BY desproduct");
SELECT * from tb_products P INNER JOIN tb_artistas A on P.idartistas = A.idartistas*/


namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Mailer;

class Product extends Model {

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * from tb_products ORDER BY artista");



	}

	

	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Product();
			$p->setData($row);
			$row = $p->getValues();


		}

		return $list;

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_products_save(:idproduct, :desproduct, :comprado, :mercado, :situacao, :tamanho, :observacao, :desurl, :artista, :tecnica)", array(
			
			":idproduct"=>$this->getidproduct(),
			":desproduct"=>$this->getdesproduct(),
			":comprado"=>$this->getcomprado(),
			":mercado"=>$this->getmercado(),
			":situacao"=>$this->getsituacao(),
			":tamanho"=>$this->gettamanho(),
			":observacao"=>$this->getobservacao(),
			":desurl"=>$this->getdesurl(),
			":artista"=>$this->getartista(),
			":tecnica"=>$this->gettecnica()
			
		));

		$this->setData($results[0]);

	}

	public function get($idproduct)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products  WHERE idproduct = :idproduct", [
			':idproduct'=>$idproduct
		]);

		$this->setData($results[0]);

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_products WHERE idproduct = :idproduct", [
			':idproduct'=>$this->getidproduct()
		]);

	}

	public function checkPhoto()
	{

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"products" . DIRECTORY_SEPARATOR . 
			$this->getidproduct() . ".jpg"
			)) {

			$url = "/res/site/img/products/" . $this->getidproduct() . ".jpg";

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
 "products" . DIRECTORY_SEPARATOR . 
 $this->getidproduct() . ".jpg";
 imagejpeg($image, $dist);
 imagedestroy($image);
 $this->checkPhoto();
 }
}

	public function getFromURL($desurl)
	{

		$sql = new Sql();

		$rows = $sql->select("SELECT *from tb_products  where desurl = :desurl  LIMIT 1", [
			':desurl'=>$desurl
		]);

		$this->setData($rows[0]);

	}

	public function getCategories()
	{

		$sql = new Sql();

		return $sql->select("
			SELECT * FROM tb_categories a INNER JOIN tb_productscategories b ON a.idcategory = b.idcategory WHERE b.idproduct = :idproduct
		", [

			':idproduct'=>$this->getidproduct()
		]);

	}
	public static function getPage($page = 1, $itemsPerPage = 5)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products 
			ORDER BY desproduct
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 5)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products
			WHERE artista LIKE :search 
			ORDER BY artista
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

}
?>