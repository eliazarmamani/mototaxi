<?php
require_once '../Config/database.php';
require_once 'funciones.php';

$clienteController = new ClienteController();

if (isset($_GET['id'])) {
    $cliente = $clienteController->obtenerCliente($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $clienteController->actualizarCliente($_GET['id'], $_POST);
        header('Location: index.php');
        exit;
    } catch (Exception $e) {
        throw new Exception('Cliente no actualizado: ' . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <title>Editar Cliente</title>
</head>
<body>
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="index.php">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Cliente</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <h4 class="mb-0"><i class="bi bi-pencil"></i> Editar Cliente</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo htmlspecialchars($cliente->nombre); ?>" required>
                                <div class="invalid-feedback">Por favor ingrese el nombre del cliente</div>
                            </div>

                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" id="correo" name="correo" class="form-control" value="<?php echo htmlspecialchars($cliente->correo); ?>" required>
                                <div class="invalid-feedback">Por favor ingrese un correo electrónico válido</div>
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo htmlspecialchars($cliente->telefono); ?>" required>
                                <div class="invalid-feedback">Por favor ingrese un número de teléfono</div>
                            </div>

                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <textarea id="direccion" name="direccion" class="form-control" rows="3" required><?php echo htmlspecialchars($cliente->direccion); ?></textarea>
                                <div class="invalid-feedback">Por favor ingrese la dirección del cliente</div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success me-2">
                                    <i class="bi bi-check-circle"></i> Actualizar
                                </button>
                                <a href="index.php" class="btn btn-danger">
                                    <i class="bi bi-x-circle"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-5 text-center text-secondary">
            <p>&copy; 2024 Sistema de Gestión de Clientes</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>
