<?php 
require_once('cliente.php');

?>

<input type="submit" value="NUEVO" />

<table border=5>
	<tr>
        <td>ID_CLIENTE</td>
		<td>NOMBRE</td>
		<td>APELLIDO</td>
		<td>RUT</td>
        <td></td>
		<td></td>
	</tr>

    <?php

$objCliente = new Cliente();

$Arraycliente = ($objCliente->leerTodos());

	foreach($Arraycliente as $item){
		?>
		<tr>
            <td><?php echo $item["id_cliente"]; ?></td>	
         	<td><?php echo $item["nombre"]; ?></td>
			<td><?php echo $item["apellido"]; ?></td>
			<td><?php echo $item["rut"]; ?></td>
          	<td><a href="#">eliminar</a></td>
			<td><a href="#">modificar</a></td>
		</tr>
	<?php
	}
	?>
</table>