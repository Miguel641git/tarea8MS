<?php 
require_once('vuelo.php');

?>

<input type="submit" value="NUEVO" />

<table border=5>
	<tr>
		<td>ID VUELO</td>
		<td>ORIGEN</td>
		<td>DESTINO</td>
		<td>FECHA</td>
        <td>PLAZAS DISPONIBLES</td>
        <td>PRECIO</td>
		<td></td>
		<td></td>
	</tr>

    <?php

$objVuelo = new Vuelo();

$Arrayvuelo = ($objVuelo->leerTodos());

	foreach($Arrayvuelo as $item){
		?>
        
		<tr>
			<td><?php echo $item["id_vuelo"]; ?></td>
			<td><?php echo $item["origen"]; ?></td>
			<td><?php echo $item["destino"]; ?></td>
			<td><?php echo $item["fecha"]; ?></td>
            <td><?php echo $item["plazas_disponibles"]; ?></td>
            <td><?php echo $item["precio"]; ?></td>
			<td><a href="#">eliminar</a></td>
			<td><a href="#">modificar</a></td>
		</tr>
	<?php
	}
	?>
</table>