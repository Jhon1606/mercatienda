<?php
require_once('../Modelo/categorias.php');

if ($_POST) {
    try {
        $modeloCategoria = new categorias();

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];

        $modeloCategoria->update($id, $nombre, $correo, $sexo, $area_id, $boletin, $descripcion);
        header('Location: ../Vista/index.php?mensaje=success&accion=editar');
        exit;
    } catch (Exception $e) {

        header('Location: ../Vista/index.php?mensaje=error&accion=editar&detalle=' . urlencode($e->getMessage()));
        exit;
    }
} else {
    header('Location: ../Vista/index.php');
    exit;
}
