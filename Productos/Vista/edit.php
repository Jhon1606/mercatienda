<!-- Modal -->
<div class="modal fade" id="myModalEditarProducto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/mercatienda/Productos/Controlador/edit.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="ideditar" name="id">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Codigo: </label>
                                <input class="form-control" type="number" name="codigo" id="codigo" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">Nombre: </label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required="">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Precio: </label>
                                <input class="form-control" type="text" name="precio" id="precio">
                                <div class="text-danger error-message" id="error-codigo"></div>
                            </div>
                            <div class="col">
                                <label class="form-label">Cantidad: </label>
                                <input class="form-control" type="number" name="cantidad" id="cantidad">
                                <div class="text-danger error-message" id="error-cantidad"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categorías : </label>
                        <?php
                        require_once('../mercatienda/Categorias/Modelo/categorias.php');
                        $modeloCategorias = new categorias;
                        $categorias = $modeloCategorias->getCategorias();
                        ?>
                        <?php if (!empty($categorias)): ?>
                            <?php foreach ($categorias as $categoria): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="categoria[]" id="cat-<?php echo $categoria['id']; ?>" value="<?php echo $categoria['id']; ?>">
                                    <label class="form-check-label" for="cat-<?php echo $categoria['id']; ?>">
                                        <?php echo $categoria['nombre']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No hay categorias disponibles.</p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagen Actual:</label>
                        <input type="hidden" id="imagenActualInput" name="imagenActualInput">
                        <img id="imagenActual" src="" alt="Imagen del Producto" style="width: 150; height: 120px;" class="img-fluid mb-3"> <br>
                        <label class="form-label">Imagen: </label>
                        <input class="form-control" type="file" name="imagen" id="imagen">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>