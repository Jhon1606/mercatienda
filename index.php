<?php
require_once('Productos/Modelo/productos.php');

$modeloProducto = new productos;
$productos = $modeloProducto->getProductos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="noopener"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="General/js/javascript.js"></script>
</head>

<body>
    <div class="container">
        <div>
            <h1>Lista de productos</h1>
            <div class="col p-2">
                <a><button onclick="modalAgregar('Producto')" type="button" class="btn btn-info" title="Crear"><i class="bi bi-plus-lg"></i> Crear Producto</button></a>
                <a href="Categorias/Vista/index.php"><button type="button" class="btn btn-primary"><i class="bi bi-tags"></i> Categorias</button></a>
            </div>
        </div>
        <table class="table table-sm table-hover">
            <thead>
                <tr>
                    <th scope="col"> Código</th>
                    <th scope="col"> Nombre</th>
                    <th scope="col"> Categorías</th>
                    <th scope="col"> Precio</th>
                    <th scope="col"> Cantidad actual</th>
                    <th scope="col"> Imagen</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <?php
            if ($productos != null) {
                foreach ($productos as $producto) {
            ?>
                    <tbody>
                        <tr>
                            <td><?php echo $producto['codigo']; ?></td>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td><?php echo $producto['categorias']; ?></td>
                            <td><?php echo $producto['precio']; ?></td>
                            <td><?php echo $producto['cantidad']; ?></td>
                            <td><img src="<?php echo $producto['imagen'] ?>" alt="img" style='width: 150px; height: 120px;'></td>
                            <td>
                                <a href="javascript:void(0);" onclick="modalEditarProducto('<?php echo $producto['id']; ?>')"><button class="btn btn-success"><i class="bi bi-pencil-square"></i></button></a>
                                <a href="javascript:void(0);" onclick="modalEliminar('<?php echo $producto['id']; ?>')"><button class=" btn btn-danger"><i class="bi bi-trash3"></i></button></a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
            } else {
                ?>
        </table>
        <p>No hay productos</p>
    <?php
            }
    ?>

    <?php
    if ($productos != null) {
        foreach ($productos as $producto) {
            $cambios = $modeloProducto->getCambios($producto['id']);
            if (!empty($cambios)) {
                echo '<h5>Historial de cambios</h5>';
                echo '<ul>';
                foreach ($cambios as $cambio) {
                    echo '<li>' . $cambio['fecha_cambio'] . ' - ' . $cambio['campo_modificado'] . ': de ' . $cambio['valor_anterior'] . ' a ' . $cambio['valor_nuevo'] . '</li>';
                }
                echo '</ul>';
            }
        }
    }
    ?>

    </div>

    <!-- Paginador -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <?php require_once('Productos/Vista/add.php'); ?>
    <?php require_once('Productos/Vista/edit.php'); ?>
    <?php require_once('Productos/Vista/delete.php'); ?>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'success'): ?>
        <script>
            let mensaje = "El registro se realizó con éxito.";
            <?php if (isset($_GET['accion'])): ?>
                let accion = "<?php echo $_GET['accion']; ?>";
                if (accion === 'editar') {
                    mensaje = "¡Éxito! El producto fue editado con éxito.";
                } else if (accion === 'eliminar') {
                    mensaje = "¡Éxito! El producto fue eliminado con éxito.";
                }
            <?php endif; ?>
            Swal.fire({
                title: '¡Éxito!',
                text: mensaje,
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                setTimeout(() => {
                    window.history.replaceState({}, document.title, window.location.pathname);
                }, 500);
            });
        </script>
    <?php endif; ?>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'error'): ?>
        <script>
            let detalle = "<?php echo isset($_GET['detalle']) ? $_GET['detalle'] : 'Ocurrió un error.'; ?>";
            Swal.fire({
                title: '¡Error!',
                text: detalle,
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                setTimeout(() => {
                    window.history.replaceState({}, document.title, window.location.pathname);
                }, 500);
            });
        </script>
    <?php endif; ?>
</body>

</html>