<?php
require_once 'funciones.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$mototaxiController = new MototaxiController();
$mototaxi = $mototaxiController->obtenerMototaxi($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $mototaxiController->actualizarMototaxi($_GET['id'], $_POST);
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
    <title>Editar Mototaxi</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                <h2 class="mb-0">Editar Mototaxi</h2>
            </div>
            <div class="card-body">
                <form method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" value="<?php echo htmlspecialchars($mototaxi->marca); ?>" required>
                        <div class="invalid-feedback">Por favor, ingrese la marca.</div>
                    </div>
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo htmlspecialchars($mototaxi->modelo); ?>" required>
                        <div class="invalid-feedback">Por favor, ingrese el modelo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_moto" class="form-label">Tipo de Moto</label>
                        <select class="form-select" id="tipo_moto" name="tipo_moto" required>
                            <option value="" disabled>Seleccione el tipo</option>
                            <option value="Carga" <?php echo $mototaxi->tipo_moto == 'Carga' ? 'selected' : ''; ?>>Carga</option>
                            <option value="Pasajeros" <?php echo $mototaxi->tipo_moto == 'Pasajeros' ? 'selected' : ''; ?>>Pasajeros</option>
                        </select>
                        <div class="invalid-feedback">Por favor, seleccione un tipo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color" value="<?php echo htmlspecialchars($mototaxi->color); ?>" required>
                        <div class="invalid-feedback">Por favor, ingrese el color.</div>
                    </div>
                    <div class="mb-3">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" class="form-control" id="placa" name="placa" value="<?php echo htmlspecialchars($mototaxi->placa); ?>" required>
                        <div class="invalid-feedback">Por favor, ingrese la placa.</div>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="disponible" name="disponible" <?php echo $mototaxi->disponible ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="disponible">Disponible</label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
