<?php 
require_once('hotel.php');

?>

<input type="submit" value="NUEVO" />

<table border=5>
	<tr>
		<td>ID_HOTEL</td>
		<td>NOMBRE</td>
		<td>UBICACION</td>
		<td>HABITACIONES_DISPONIBLES</td>
        <td>TARIFA_NOCHE</td>
        <td></td>
		<td></td>
	</tr>

    <?php

$objHotel = new Hotel();

$Arrayhotel = ($objHotel->leerTodos());

	foreach($Arrayhotel as $item){
		?>
		<tr>
			<td><?php echo $item["id_hotel"]; ?></td>
			<td><?php echo $item["nombre"]; ?></td>
			<td><?php echo $item["ubicacion"]; ?></td>
			<td><?php echo $item["habitaciones_disponibles"]; ?></td>
            <td><?php echo $item["tarifa_noche"]; ?></td>
          	<td><a href="#">eliminar</a></td>
			<td><a href="#">modificar</a></td>
		</tr>
	<?php
	}
	?>
</table>