<?php
class Reservas {

	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}
	public function getReservas(){//retorna os agendamentos do banco de dados
		$array = array();

		$sql = "SELECT * FROM reservas";
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;		
	}
	public function verificarDisponibilidade($data, $hora, $horafinal){
		$sql = "SELECT * FROM reservas WHERE data = :data AND (NOT(hora_inicial > :hora_final or hora_final < :hora_inicial))";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":data", $data);
		$sql->bindValue(":hora_inicial", $hora);
		$sql->bindValue(":hora_final", $horafinal);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return false;
		}else{
			return true;
		}
	}

	public function reservar($data, $hora, $horafinal, $nome){
		$sql = "INSERT INTO reservas(data, hora_inicial, hora_final, nome) VALUES ( :data, :hora, :horafinal, :nome)";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":data", $data);
		$sql->bindValue(":hora", $hora);
		$sql->bindValue(":horafinal", $horafinal);
		$sql->bindValue(":nome", $nome);

		$sql->execute();

	}
}
?>