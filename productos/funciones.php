<?php
require_once '../config/database.php';

class MototaxiController {
    private $db;
    private $collection;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getDatabase();
        $this->collection = $this->db->mototaxis;
    }

    // Listar todos los mototaxis
    public function listarMototaxis() {
        try {
            return $this->collection->find([], ['sort' => ['tipo_moto' => 1, 'marca' => 1]]);
        } catch (Exception $e) {
            throw new Exception("Error al listar los mototaxis: " . $e->getMessage());
        }
    }

    // Obtener un mototaxi por ID
    public function obtenerMototaxi($id) {
        try {
            return $this->collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
        } catch (Exception $e) {
            throw new Exception("Error al obtener el mototaxi: " . $e->getMessage());
        }
    }

    // Crear un nuevo mototaxi
    public function crearMototaxi($datos) {
        try {
            $resultado = $this->collection->insertOne([
                'marca' => trim($datos['marca']),
                'modelo' => trim($datos['modelo']),
                'tipo_moto' => trim($datos['tipo_moto']),
                'color' => trim($datos['color']),
                'placa' => trim($datos['placa']),
                'disponible' => isset($datos['disponible']),
                'fecha_creacion' => new MongoDB\BSON\UTCDateTime(),
                'fecha_actualizacion' => new MongoDB\BSON\UTCDateTime()
            ]);
            return $resultado->getInsertedId();
        } catch (Exception $e) {
            throw new Exception("Error al crear el mototaxi: " . $e->getMessage());
        }
    }

    // Actualizar un mototaxi
    public function actualizarMototaxi($id, $datos) {
        try {
            $resultado = $this->collection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($id)],
                ['$set' => [
                    'marca' => trim($datos['marca']),
                    'modelo' => trim($datos['modelo']),
                    'tipo_moto' => trim($datos['tipo_moto']),
                    'color' => trim($datos['color']),
                    'placa' => trim($datos['placa']),
                    'disponible' => isset($datos['disponible']),
                    'fecha_actualizacion' => new MongoDB\BSON\UTCDateTime()
                ]]
            );
            if ($resultado->getModifiedCount() === 0 && $resultado->getMatchedCount() === 0) {
                throw new Exception("No se encontró el mototaxi a actualizar");
            }
            return true;
        } catch (Exception $e) {
            throw new Exception("Error al actualizar el mototaxi: " . $e->getMessage());
        }
    }

    // Eliminar un mototaxi por ID
    public function eliminarMototaxi($id) {
        try {
            $mototaxi = $this->obtenerMototaxi($id);
            if (!$mototaxi) {
                throw new Exception("Mototaxi no encontrado");
            }
            $resultado = $this->collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            if ($resultado->getDeletedCount() === 0) {
                throw new Exception("No se pudo eliminar el mototaxi");
            }
            return true;
        } catch (Exception $e) {
            throw new Exception("Error al eliminar el mototaxi: " . $e->getMessage());
        }
    }
}
?>
