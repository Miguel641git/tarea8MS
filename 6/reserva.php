<?php

class Reserva {

    private $conn;

    // Constructor que establece la conexión a la base de datos
    public function __construct()
    {
        require_once ('conexion.php'); // Archivo de conexión
        $this->conn = $conn;
    }
    
    // Crear nuevo registro
    public function crear($id_cliente, $fecha_reserva, $id_vuelo, $id_hotel) {
        $Script = "INSERT INTO reserva (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?)";
        $PreraraConsulta = $this->conn->prepare($Script);
        $PreraraConsulta->bind_param("ssss", $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel);
        return $PreraraConsulta->execute();
    }

    // Leer todos los registros
    public function leerTodos() {
        $sql = "SELECT * FROM reserva";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Leer un registro por ID
    public function leerPorId($id) {
        $sql = "SELECT * FROM reserva WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("i", $id);
        $PreparaConsulta->execute();
        return $PreparaConsulta->get_result()->fetch_assoc();
    }

    // Actualizar un registro
    public function actualizar($id, $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel) {
        $sql = "UPDATE reserva SET id_cliente = ?, fecha_reserva = ?, id_vuelo = ?, id_hotel = ? WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("ssssi", $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel, $id);
        return $PreparaConsulta->execute();
    }

    // Eliminar un registro
    public function eliminar($id) {
        $sql = "DELETE FROM reserva WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("i", $id);
        return $PreparaConsulta->execute();
    }
}
?>