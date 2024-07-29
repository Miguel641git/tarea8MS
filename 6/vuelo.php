<?php

class Vuelo {

    private $conn;

    // Constructor que establece la conexión a la base de datos
    public function __construct()
    {
        require_once ('conexion.php'); // Archivo de conexión
        $this->conn = $conn;
    }
	
    // Crear nuevo registro
    public function crear($origen, $destino, $fecha, $plazas_disponibles, $precio) {
        $Script = "INSERT INTO vuelo (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)";
        $PreraraConsulta = $this->conn->prepare($Script);
        $PreraraConsulta->bind_param("sssss", $origen, $destino, $fecha, $plazas_disponibles, $precio);
        return $PreraraConsulta->execute();
    }

    // Leer todos los registros
    public function leerTodos() {
        $sql = "SELECT * FROM vuelo";
        $resultado = $this->conn->query($sql);

        if ($resultado->rowCount() > 0) {
            $vuelos = [];
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $vuelos[] = $fila;
            }
            return $vuelos; 
        } else {
            echo "No existen vuelos";
            return [];
        }
       }

    // Leer un registro por ID
    public function leerPorId($id) {
        $sql = "SELECT * FROM vuelo WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("i", $id);
        $PreparaConsulta->execute();
        return $PreparaConsulta->get_result()->fetch_assoc();
    }

    // Actualizar un registro
    public function actualizar($id, $origen, $destino, $fecha, $plazas_disponibles, $precio) {
        $sql = "UPDATE vuelo SET origen = ?, destino = ?, fecha = ?, plazas_disponibles = ?, precio = ? WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("sssssi", $origen, $destino, $fecha, $plazas_disponibles, $precio, $id);
        return $PreparaConsulta->execute();
    }

    // Eliminar un registro
    public function eliminar($id) {
        $sql = "DELETE FROM vuelo WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("i", $id);
        return $PreparaConsulta->execute();
    }
}
?>