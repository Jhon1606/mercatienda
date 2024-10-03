<!-- Modal -->
<div class="modal fade" id="myModalEliminarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../Controlador/delete.php" method="POST">
                <input type="hidden" id="ideliminar" name="id">
                <div class="modal-body">
                    ¿Está seguro que desea eliminar la categoria?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancelar</button>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>