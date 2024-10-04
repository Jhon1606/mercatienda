// $(document).ready(function() {
//     $('#empleadoForm').on('submit', function(e) {
//         e.preventDefault(); 

//         $('.error-message').text("");

//         let isValid = true;

//         const nombre = $('#nombre').val().trim();
//         if (nombre === "") {
//             isValid = false;
//             $('#error-nombre').text("El nombre no puede estar vacío, por favor ingrese un nombre.");
//         }

//         const correo = $('#correo').val().trim();
//         const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
//         if (correo === "" || !emailRegex.test(correo)) {
//             isValid = false;
//             $('#error-correo').text("Ingrese un correo electrónico válido.");
//         }

//         const sexo = $('input[name="sexo"]:checked').val();
//         if (!sexo) {
//             isValid = false;
//             $('#error-sexo').text("Seleccione un sexo.");
//         }

//         const area_id = $('select[name="area_id"]').val();
//         if (!area_id) {
//             isValid = false;
//             $('#error-area').text("Seleccione un área.");
//         }

//         const descripcion = $('#descripcion').val().trim();
//         if (descripcion === "") {
//             isValid = false;
//             $('#error-descripcion').text("La descripción no puede estar vacía, por favor ingrese una descripción.");
//         }

//         const roles = $('input[name="rol[]"]:checked');
//         if (roles.length === 0) {
//             isValid = false;
//             $('#error-roles').text("Seleccione al menos un rol.");
//         }
        
//         if (isValid) {
//             this.submit(); 
//         }
//     });
// });

function modalAgregar(pagina){
    $('#myModal' + pagina).modal('show');
}

function modalEditarCategoria(id){
    $.ajax({
        url: "/mercatienda/General/Queries/infocategorias.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){
        var id = info[0].id;
        var nombre = info[0].nombre;

        $("#ideditar").val(id);
        $("#nombre").val(nombre);
        $('#myModalEditarCategoria').modal('show');
    });
}

function modalEditarProducto(id){
    $.ajax({
        url: "/mercatienda/General/Queries/infoproducto.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){
        var id = info[0].id;
        var codigo = info[0].codigo;
        var nombre = info[0].nombre;
        var precio = info[0].precio;
        var cantidad = info[0].cantidad;
        var imagen = info[0].imagen;
        var categorias = info[0].categorias;

        $("#ideditar").val(id);
        $("#codigo").val(codigo);
        $("#nombre").val(nombre);
        $("#precio").val(precio);
        $("#cantidad").val(cantidad);
        $("#imagenActual").attr("src", imagen);
        // Limpiar los checkboxes de roles
        $('input[name="categoria[]"]').prop('checked', false);

        
        if (categorias && categorias.length > 0) {
            categorias.forEach(function(categoriaId) {
                $('#cat-' + categoriaId).prop('checked', true);
            });
        }
        $('#myModalEditarProducto').modal('show');
    });
}

function modalEliminar(id){
    $("#ideliminar").val(id);
    $('#myModalEliminar').modal('show');
}

