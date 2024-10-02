<!-- Modal -->
<div class="modal fade" id="myModalProducto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
                <button type="button" onclick="CerrarModal('Usuario')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input class="form-control" type="text" name="nombre" required="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Codigo: </label>
                        <input class="form-control" type="number" name="codigo" required="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categorías : </label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Técnologia
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input class="form-control" type="number" name="precio" required="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad: </label>
                        <input class="form-control" type="number" name="cantidad" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('Usuario')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>