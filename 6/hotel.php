<?php

class Hotel {

    private $conn;

    // Constructor que establece la conexión a la base de datos
    public function __construct()
    {
        require_once ('conexion.php'); // Archivo de conexión
        $this->conn = $conn;
    }
    
    // Crear nuevo registro
    public function crear($nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche) {
        $Script = "INSERT INTO hotel (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)";
        $PreraraConsulta = $this->conn->prepare($Script);
        $PreraraConsulta->bind_param("ssss", $nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche);
        return $PreraraConsulta->execute();
    }

    // Leer todos los registros
    public function leerTodos() {
        $sql = "SELECT * FROM hotel";
        $resultado = $this->conn->query($sql);

        if ($resultado->rowCount() > 0) {
            $hotel = [];
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $hotel[] = $fila;
            }
            return $hotel; 
        } else {
            echo "No existen hoteles";
            return [];
        }
       }


    // Leer un registro por ID
    public function leerPorId($id) {
        $sql = "SELECT * FROM hotel WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("i", $id);
        $PreparaConsulta->execute();
        return $PreparaConsulta->get_result()->fetch_assoc();
    }

    // Actualizar un registro
    public function actualizar($id, $nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche) {
        $sql = "UPDATE hotel SET nombre = ?, ubicacion = ?, habitaciones_disponibles = ?, tarifa_noche = ? WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("ssssi", $nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche, $id);
        return $PreparaConsulta->execute();
    }

    // Eliminar un registro
    public function eliminar($id) {
        $sql = "DELETE FROM hotel WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("i", $id);
        return $PreparaConsulta->execute();
    }
}
?>