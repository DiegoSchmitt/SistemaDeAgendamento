<?php
session_start();
require 'config.php';
require 'cadastro.php';
require 'login.php';
require 'classes/servicos.class.php';
require 'classes/reservas.class.php';
?>

<h1>Agendamento</h1>
<?php
$reservas = new Reservas($pdo);//cria um objeto e salva a conexão.
$servicos = new Servicos($pdo);

$lista = $reservas->getReservas();//armazena as reservas na vriável lista.

$cmaquina = isset($_POST['servicos1'])?$_POST['servicos1']:0;
$ctesoura = isset($_POST['servicos2'])?$_POST['servicos2']:0;
$cinfantil = isset($_POST['servicos3'])?$_POST['servicos3']:0;
$btradicional = isset($_POST['servicos4'])?$_POST['servicos4']:0;
$bdesenhado = isset($_POST['servicos5'])?$_POST['servicos5']:0;
$bmaquina = isset($_POST['servicos6'])?$_POST['servicos6']:0;
$hora = isset($_POST['hora'])?$_POST['hora']:"Prencha o campo hora!";
$data = isset($_POST['data'])?$_POST['data']:"Prencha o campo data!";
$tempo = $cmaquina + $ctesoura + $cinfantil + $btradicional + $bdesenhado + $bmaquina;
$horafinal= date('H:i:s', strtotime($hora.'+'. $tempo .'minutes')-0.1);
$nome = $_SESSION['nome'];



if($tempo > 0 ) {
	if(date('w', strtotime($data)) != '0'){
		if($hora < date('H:i', strtotime('8.30')) or ($hora > date('H:i', strtotime('12.00')) && $hora < date('H:i', strtotime('13.00'))) or $hora > date('H:i', strtotime('20.00'))){
			echo "Ops, horário de trabalho das 8:30 até 12:00 e 13:00 até 20:00, agende o serviço entre esses horários!";
		}
	elseif($reservas->verificarDisponibilidade($data, $hora, $horafinal)){
		$reservas->reservar($data, $hora, $horafinal, $nome);
		echo "Agendamento realizado!";
		require 'calendario.php';
		exit;	
		}else{
			echo "Ops, data e horário já reservados, veja abaixo os horários já reservados, selecione outro horário disponível!<br><br>";

			header("Location:agendados.php");

		}
	}else{
		echo "Não trabalhamos em domingo, selecione outra data!";
	}
}
else {
	echo "Selecione ao menos um serviço a ser realizado!";
}
echo "<br/><br/>";

$lista = $reservas->getReservas();//armazena as reservas na vriável lista.

$diadasemana = date('w');
switch ($diadasemana) {
	case '1':
		$diadasemana = 'Segunda';
	break;
	case '2':
		$diadasemana = 'Terça';
	break;
	case '3':
		$diadasemana = 'Quarta';
	break;
	case '4':
		$diadasemana = 'Quinta';
	break;
	case '5':
		$diadasemana = 'Sexta';
	break;
	case '6':
		$diadasemana = 'Sabado';
	break;
}

/*
foreach ($lista as $item) {
	$dataBD = date('d/m/Y', strtotime($item['data']));
	$horainicialBD = $item['hora_inicial'];
	$horafinalBD = $item['hora_final'];
	echo $item['nome'].' Dia '.$dataBD.' agendou horário entre '.$horainicialBD.' e '.$horafinalBD."  ".'<br/>';
}
*/
?>
<br/>
<a href="painelusuario.php">Voltar</a>
