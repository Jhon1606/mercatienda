<!-- Modal -->
<div class="modal fade" id="myModalEditarCategoria" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="ideditar" name="id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nombre: </label>
                            <input class="form-control" type="text" name="nombre" id="nombre" required="">
                        </div>
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