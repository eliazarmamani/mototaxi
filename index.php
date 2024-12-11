<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión - Mototaxis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-2 bg-light sidebar py-4">
                <div class="text-center mb-4">
                    <h4>Mototaxis</h4>
                    <p>Sistema de Gestión</p>
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="index.php">
                        <i class="bi bi-speedometer2"></i> 
                        Dashboard
                    </a>
                    <a class="nav-link" href="clientes/index.php">
                        <i class="bi bi-people"></i> 
                        Pasajeros
                    </a>
                    <a class="nav-link" href="productos/index.php">
                        <i class="bi bi-bicycle"></i> 
                        Mototaxis
                    </a>
                    <a class="nav-link" href="pedidos/index.php">
                        <i class="bi bi-clipboard-check"></i> 
                        Solicitudes
                    </a>
                </nav>
            </div>

            <!-- Contenido Principal -->
            <div class="col content">
                <div class="header">
                    <h1>Dashboard</h1>
                    <p class="text-muted">Bienvenido al sistema de gestión de Mototaxis. Selecciona una opción del menú para comenzar.</p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-people"></i> Pasajeros</h5>
                                <p class="card-text text-muted">Gestiona información de los pasajeros registrados.</p>
                                <a href="clientes/index.php" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-bicycle"></i> Mototaxis</h5>
                                <p class="card-text text-muted">Administra las unidades disponibles y sus conductores.</p>
                                <a href="productos/index.php" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-clipboard-check"></i> Solicitudes</h5>
                                <p class="card-text text-muted">Revisa y gestiona las solicitudes de viajes.</p>
                                <a href="pedidos/index.php" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
