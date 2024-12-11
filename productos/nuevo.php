<?php
require_once 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mototaxiController = new MototaxiController();
    try {
        $mototaxiController->crearMototaxi($_POST);
        header('Location: index.php');
        exit;
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Nuevo Mototaxi</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Registrar Nuevo Mototaxi</h2>
            </div>
            <div class="card-body">
                <form method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese la marca" required>
                        <div class="invalid-feedback">Por favor, ingrese la marca.</div>
                    </div>
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ingrese el modelo" required>
                        <div class="invalid-feedback">Por favor, ingrese el modelo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_moto" class="form-label">Tipo de Moto</label>
                        <select class="form-select" id="tipo_moto" name="tipo_moto" required>
                            <option value="" selected disabled>Seleccione el tipo</option>
                            <option value="Carga">Carga</option>
                            <option value="Pasajeros">Pasajeros</option>
                        </select>
                        <div class="invalid-feedback">Por favor, seleccione un tipo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="Ingrese el color" required>
                        <div class="invalid-feedback">Por favor, ingrese el color.</div>
                    </div>
                    <div class="mb-3">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" class="form-control" id="placa" name="placa" placeholder="Ingrese la placa" required>
                        <div class="invalid-feedback">Por favor, ingrese la placa.</div>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="disponible" name="disponible">
                        <label class="form-check-label" for="disponible">Disponible</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Activar validación de formularios de Bootstrap
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
