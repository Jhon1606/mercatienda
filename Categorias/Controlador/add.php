<?php
require_once('../Modelo/categorias.php');

if ($_POST) {
    try {
        $modeloCategoria = new categorias();
        $nombre = $_POST['nombre'];

        $modeloCategoria->add($nombre);
        header('Location: ../Vista/index.php?mensaje=success');
        exit;
    } catch (Exception $e) {

        header('Location: ../Vista/index.php?mensaje=error&accion=editar&detalle=' . urlencode($e->getMessage()));
        exit;
    }
} else {
    header('Location: ../Vista/index.php');
    exit;
}
