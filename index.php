<?php 
	class MySQL {
		private $connection;

		public static function getConnection($host, $user, $password, $dbname, $port)
		{
			return  new mysqli($host, $user, $password, $dbname, $port);;
		}

	}

	class Coluna {
		public function __construct($connection)
		{
			$this->connection = $connection;
		}

		public function filtrar($value)
		{
			$result = $this->connection->query("call pesquisar('$value')");
			while ($row = $result->fetch_assoc()) {
				var_dump($row);
			}
		}
	}

	$conn = MySQL::getConnection('127.0.0.1', 'root', '', 'T1', 3306);
	$coluna = new Coluna($conn);
	$coluna->filtrar('consulta');

	var_dump($conn->close());
