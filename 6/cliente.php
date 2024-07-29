<?php
	
class Cliente {

    private $conn;

    // Constructor que establece la conexión a la base de datos
    public function __construct()
    {
        require_once ('conexion.php'); // Archivo de conexión
        $this->conn = $conn;
    }

    // Crear nuevo registro
    public function crear($nombre, $apellido, $rut) {
        $Script = "INSERT INTO cliente (nombre, apellido, rut) VALUES (?, ?, ?)";
        $PreraraConsulta = $this->conn->prepare($Script);
        $PreraraConsulta->bind_param("sss", $nombre, $apellido, $rut);
        return $PreraraConsulta->execute();
    }

    // Leer todos los registros
    public function leerTodos() {
        $sql = "SELECT * FROM cliente";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Leer un registro por ID
    public function leerPorId($id) {
        $sql = "SELECT * FROM cliente WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("i", $id);
        $PreparaConsulta->execute();
        return $PreparaConsulta->get_result()->fetch_assoc();
    }

    // Actualizar un registro
    public function actualizar($id, $nombre, $apellido, $rut) {
        $sql = "UPDATE cliente SET nombre = ?, apellido = ?, rut = ? WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("sssi", $nombre, $apellido, $rut, $id);
        return $PreparaConsulta->execute();
    }

    // Eliminar un registro
    public function eliminar($id) {
        $sql = "DELETE FROM cliente WHERE id = ?";
        $PreparaConsulta = $this->conn->prepare($sql);
        $PreparaConsulta->bind_param("i", $id);
        return $PreparaConsulta->execute();
    }
}
?>