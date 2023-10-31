<?php 

//namespace framework\DB;
namespace application\DB;

use PDO;
use PDOException;

class Sql{

	const HOSTNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "db_cardapio";

	public static function getDatabase() {

		try{
			$connect = new PDO(
				"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
				Sql::USERNAME,
				Sql::PASSWORD);

			return $connect;

		}catch (PDOException $error) {
			//* Tratamento da exceção
			echo 'Erro ao conectar ao banco de dados: ' . $error->getMessage();
		}
	}
}
?>