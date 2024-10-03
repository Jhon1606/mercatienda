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

// function modalEditarEmpleado(id){
//     $.ajax({
//         url: "/PruebaTecnica/General/Queries/infoempleado.php",
//         type: "POST",
//         dataType: "JSON",
//         data: {id: id}
//     })
//     .done(function(info){
//         var id = info[0].id;
//         var nombre = info[0].nombre;
//         var email = info[0].email;
//         var sexo = info[0].sexo;
//         var area_id = info[0].area_id;
//         var boletin = info[0].boletin;
//         var descripcion = info[0].descripcion;
//         var roles = info[0].roles;

//         $("#ideditar").val(id);
//         $("#nombre").val(nombre);
//         $("#email").val(email);
//         $("#sexo").val(sexo);
//         $("#area_id").val(area_id);
//         if (boletin === 1) {
//             $("#boletin").prop("checked", true);
//         } else {
//             $("#boletin").prop("checked", false);
//         }
//         if (sexo === "F") {
//             $("#femenino").prop("checked", true);
//         } else if (sexo === "M") {
//             $("#masculino").prop("checked", true);
//         }
//         $("#descripcion").val(descripcion);
//          // Limpiar los checkboxes de roles
//         $('input[name="rol[]"]').prop('checked', false);

//         // Marcar los checkboxes de roles según los roles del empleado
//         if (roles && roles.length > 0) {
//             roles.forEach(function(rolId) {
//                 $('#rol-' + rolId).prop('checked', true);
//             });
//         }
//         $('#myModalEditarEmpleado').modal('show');
//     });
// }

function modalEliminar(pagina, id){
    $("#ideliminar").val(id);
    $('#myModalEliminar' + pagina).modal('show');
}

