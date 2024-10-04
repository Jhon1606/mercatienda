<?php
require_once('../Modelo/categorias.php');
// Obtener la página actual
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Definir el límite y calcular el offset
$limit = 5;
$offset = ($page - 1) * $limit;

$modeloCategoria = new categorias;
$categorias = $modeloCategoria->getCategorias();
$categoriasPage = $modeloCategoria->getCategoriasPage($limit, $offset);

// Obtener el número total de productos para paginación
$totalCategorias = $modeloCategoria->getTotalCategorias();
$totalPaginas = ceil($totalCategorias / $limit);
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
    <script src="../../General/js/javascript.js"></script>
</head>

<body>
    <div class="container">
        <div>
            <h1>Lista de categorias</h1>
            <div class="col p-2">
                <a><button onclick="modalAgregar('Categoria')" type="button" class="btn btn-info" title="Crear"><i class="bi bi-plus-lg"></i> Crear Categoria</button></a>
                <a href="../../index.php"><button type="button" class="btn btn-primary"><i class="bi bi-box-seam"></i> Productos</button></a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"> Id</th>
                    <th scope="col"> Nombre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($categoriasPage != null) {
                    foreach ($categoriasPage as $categoria) {
                ?>
                        <tr>
                            <td><?php echo $categoria['id']; ?></td>
                            <td><?php echo $categoria['nombre']; ?></td>
                            <td class="text-end">
                                <a href="javascript:void(0);" onclick="modalEditarCategoria('<?php echo $categoria['id'] ?>')"><button class="btn btn-success"><i class="bi bi-pencil-square"></i></button></a>
                                <a href="javascript:void(0);" onclick="modalEliminarCategoria('<?php echo $categoria['id'] ?>')"><button class=" btn btn-danger"><i class="bi bi-trash3"></i></button></a>
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
    </div>

    <!-- Paginador -->
    <nav>
        <ul class="pagination">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>">Anterior</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPaginas): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">Siguiente</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <?php
    require_once('add.php');
    require_once('edit.php');
    require_once('delete.php');
    ?>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'success'): ?>
        <script>
            let mensaje = "El registro se realizó con éxito.";
            <?php if (isset($_GET['accion'])): ?>
                let accion = "<?php echo $_GET['accion']; ?>";
                if (accion === 'editar') {
                    mensaje = "¡Éxito! La categoría se actualizó con éxito.";
                } else if (accion === 'eliminar') {
                    mensaje = "¡Éxito! La categoría fue eliminado con éxito.";
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