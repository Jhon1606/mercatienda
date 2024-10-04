$(document).ready(function() {
    $('#productoForm').on('submit', function(e) { 
        e.preventDefault(); 

        $('.error-message').text(""); // Limpiar mensajes de error

        let isValid = true;

        // Validación del campo Código
        const codigo = $('input[name="codigo"]').val().trim();
        if (codigo === "") {
            isValid = false;
            $('#error-codigo').text("El código no puede estar vacío, por favor ingrese un código.");
        }

        // Validación del campo Nombre
        const nombre = $('input[name="nombre"]').val().trim();
        if (nombre === "") {
            isValid = false;
            $('#error-nombre').text("El nombre no puede estar vacío, por favor ingrese un nombre.");
        }

        // Validación del campo Precio
        const precio = $('input[name="precio"]').val().trim();
        const precioRegex = /^\d{1,3}(?:\.\d{3})*(?:,\d{2})?$/; // Permitir formato como 10.200,25
        const precioNumeric = parseFloat(precio.replace('.', '').replace(',', '.')); // Convertir a formato numérico

        if (precio === "" || !precioRegex.test(precio) || precioNumeric < 0) {
            isValid = false;
            $('#error-precio').text("El precio debe ser un número positivo con hasta 2 decimales en formato (10.200,25).");
        }

        // Validación del campo Cantidad
        const cantidad = $('input[name="cantidad"]').val().trim();
        if (cantidad < 0 || !Number.isInteger(parseFloat(cantidad))) {
            isValid = false;
            $('#error-cantidad').text("La cantidad debe ser un número entero mayor o igual a cero.");
        }

        // Validación de Categorías
        const categorias = $('input[name="categoria[]"]:checked');
        if (categorias.length === 0) {
            isValid = false;
            $('#error-categorias').text("Debe seleccionar al menos una categoría.");
        }

        // Validación del campo Imagen
        const imagen = $('input[name="imagen"]')[0].files[0];
        if (!imagen) {
            isValid = false;
            $('#error-imagen').text("Debe seleccionar una imagen.");
        } else {
            const validExtensions = ['image/jpeg', 'image/png', 'image/gif'];
            if (!validExtensions.includes(imagen.type)) {
                isValid = false;
                $('#error-imagen').text("El archivo debe ser una imagen (JPG, PNG o GIF).");
            }
        }

        // Si es válido, enviar el formulario
        if (isValid) {
            this.submit(); 
        }
    });
});


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

function modalHistorial(id) {
    $.ajax({
        url: '/mercatienda/General/Queries/infohistorial.php', // El archivo que procesará la solicitud
        type: 'POST',
        data: { id: id },
        success: function(response) {
            $('#historialContent').html(response); // Cargar el contenido en el modal
            $('#myModalHistorial').modal('show');  // Mostrar el modal
        },
        error: function() {
            Swal.fire({
                title: 'Error',
                text: 'No se pudo cargar el historial de cambios.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });
}

function modalEliminar(id){
    $("#ideliminar").val(id);
    $('#myModalEliminar').modal('show');
}

