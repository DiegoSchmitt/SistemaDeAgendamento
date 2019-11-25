<h3>Já existe um agendamento nesse horário. Use a ferramenta abaixo para filtrar os horários disponíveis.</h3>

<form method="GET">
Ano:
<select name="ano">
		<option><?php echo date('y'); ?></option>
		<option><?php echo date('y')+1; ?></option>
</select>
Mês:
<select name="mes">
		<option><?php echo date('m'); ?></option>
		<option><?php echo date('m')+1; ?></option>
</select>
Dia:
<select name="dia">
		<?php 
		for($q=1; $q<=31; $q++):?>
		<option><?php echo $q; ?></option>
		<?php endfor; ?>
</select>
Hora:
<select name="hora">
	<option>8:00</option>
	<option>9:00</option>
	<option>10:00</option>
	<option>11:00</option>
	<option>13:00</option>
	<option>14:00</option>
	<option>15:00</option>
	<option>16:00</option>
	<option>17:00</option>
	<option>18:00</option>
	<option>19:00</option>
</select>
	<input type="submit" value="Mostrar">
</form>
<?php
if(empty($_GET['ano'])){
	exit;
}

	$data = $_GET['ano'].'-'.$_GET['mes'].'-'.$_GET['dia'];
	$dia = $_GET['dia'];
	$hora = $_GET['hora'];

	echo "$data <br>";
	echo "$dia <br>";
	echo "$hora <br>";

