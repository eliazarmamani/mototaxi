<?php
require_once 'funciones.php';

$mototaxiController = new MototaxiController();
$mototaxis = $mototaxiController->listarMototaxis();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Mototaxis</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h1 class="h4 mb-0">Gestión de Mototaxis</h1>
                <a href="nuevo.php" class="btn btn-light btn-sm">+ Nuevo Mototaxi</a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Tipo</th>
                            <th>Color</th>
                            <th>Placa</th>
                            <th>Disponible</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mototaxis as $mototaxi): ?>
                            <tr>
                                <td><?php echo $mototaxi->marca; ?></td>
                                <td><?php echo $mototaxi->modelo; ?></td>
                                <td><?php echo $mototaxi->tipo_moto; ?></td>
                                <td><?php echo $mototaxi->color; ?></td>
                                <td><?php echo $mototaxi->placa; ?></td>
                                <td>
                                    <span class="badge bg-<?php echo $mototaxi->disponible ? 'success' : 'danger'; ?>">
                                        <?php echo $mototaxi->disponible ? 'Sí' : 'No'; ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="editar.php?id=<?php echo $mototaxi->_id; ?>" class="btn btn-warning btn-sm me-2">Editar</a>
                                    <a href="eliminar.php?id=<?php echo $mototaxi->_id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este mototaxi?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
