<?php
	require 'pages/header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Barbearia</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
</head>
<body>
	<div class="container">
		 <h5>Bem vindo, <?php echo $_SESSION['nome']; ?></h5>
		<form method="POST" action="agendamento.php">
			Quais serviços deseja:<br/>
			<input type="checkbox" name="servicos1" id="cmaquina" value="15"/>Corte com máquina - tempo 15:00<br/>
			<input type="checkbox" name="servicos2" id="ctesoura" value="30"/>Corte com tesoura - tempo 30:00<br/>
			<input type="checkbox" name="servicos3" id="cinfantil" value="30"/>Corte infantil - tempo 30:00<br/>
			<input type="checkbox" name="servicos4" id="btradicional" value="30"/>Barbear Tradicional - tempo 30:00<br/>
			<input type="checkbox" name="servicos5" id="bdesenhado" value="45"/>Barbear Desenhado - tempo 45:00<br/>
			<input type="checkbox" name="servicos6" id="bmaquina" value="15"/>Barbear com máquina - tempo 15:00
			<br/><br/>
			Escolha a data:
			<input type="date" name="data"/>

			Escolha o horário:
			<input type="time" name="hora"/><br/><br/>

			<input type="submit" value="Agendar">
		</form>
	</div>
</body>
</html>
<?php
require "calendario.php";
?>





















