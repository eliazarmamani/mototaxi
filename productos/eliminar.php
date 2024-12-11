<?php
require_once 'funciones.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$mototaxiController = new MototaxiController();

try {
    $mototaxiController->eliminarMototaxi($_GET['id']);
    header('Location: index.php');
    exit;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    header('Location: index.php');
    exit;
}
?>
