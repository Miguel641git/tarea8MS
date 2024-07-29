<?php 
require_once('reserva.php');

?>

<input type="submit" value="NUEVO" />

<table border=5>
	<tr>
        <td>ID_RESERVA</td>
		<td>ID_CLIENTE</td>
		<td>FECHA_RESERVA</td>
		<td>ID_VUELO</td>
		<td>ID_HOTEL</td>
        <td></td>
		<td></td>
	</tr>

    <?php

$objReserva = new Reserva();

$Arrayreserva = ($objReserva->leerTodos());

	foreach($Arrayreserva as $item){
		?>
		<tr>
            <td><?php echo $item["id_reserva"]; ?></td>
		    <td><?php echo $item["id_cliente"]; ?></td>	
         	<td><?php echo $item["fecha_reserva"]; ?></td>
			<td><?php echo $item["id_vuelo"]; ?></td>
			<td><?php echo $item["id_hotel"]; ?></td>
          	<td><a href="#">eliminar</a></td>
			<td><a href="#">modificar</a></td>
		</tr>
	<?php
	}
	?>
</table>