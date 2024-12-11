<?php
    require_once '../config/database.php';
    require_once 'funciones.php';

    $clienteController = new ClienteController();
    $clientes = $clienteController->listarClientes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <title>Clientes</title>
</head>
<body>
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>

        <div class="row align-items-center mb-4">
            <div class="col">
                <h1 class="text-primary"><i class="bi bi-people"></i> Gestión de Clientes</h1>
            </div>
            <div class="col text-end">
                <a href="nuevo.php" class="btn btn-success">
                    <i class="bi bi-person-plus-fill"></i> Nuevo Cliente
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cliente->_id); ?></td>
                        <td><?php echo htmlspecialchars($cliente->nombre); ?></td>
                        <td><?php echo htmlspecialchars($cliente->correo); ?></td>
                        <td><?php echo htmlspecialchars($cliente->telefono); ?></td>
                        <td><?php echo htmlspecialchars($cliente->direccion); ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $cliente->_id; ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <a href="funciones.php?action=eliminar&id=<?php echo $cliente->_id; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('¿Está seguro de eliminar este cliente?')">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <footer class="mt-5 text-center text-secondary">
            <p>&copy; 2024 Sistema de Gestión de Clientes</p>
        </footer>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>