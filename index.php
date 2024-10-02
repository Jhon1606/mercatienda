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
            <tbody>
                <tr>
                    <td>0245887</td>
                    <td>Televisor LG</td>
                    <td>Tecnologia, Televisores</td>
                    <td>102.000</td>
                    <td>54</td>
                    <td>Img</td>
                    <td>
                        <a href="javascript:void(0);"><button class="btn btn-success"><i class="bi bi-pencil-square"></i></button></a>
                        <a href="javascript:void(0);"><button class="btn btn-danger"><i class="bi bi-trash3"></i></button></a>
                    </td>
                </tr>
            </tbody>
        </table>
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
</body>

</html>