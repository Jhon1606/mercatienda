<?php
require_once('../Modelo/productos.php');

if ($_POST) {
    try {
        $modeloProducto = new productos();

        $id = $_POST['id'];
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $categoria = $_POST['categoria'];
        $directorio = '../../General/img/';

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $nombreArchivo = $_FILES['imagen']['name'];
            $archivoTmp = $_FILES['imagen']['tmp_name'];
            $rutaImagen = $directorio . basename($nombreArchivo);
            move_uploaded_file($archivoTmp, $rutaImagen);
            $rutaImagen = 'General/img/' . basename($nombreArchivo);
        }

        $modeloProducto->update($id, $codigo, $nombre, $precio, $cantidad, $rutaImagen);
        $modeloProducto->deleteProductoCategoria($id);
        foreach ($categoria as $categoria_id) {
            $modeloProducto->addProductoCategoria($id, $categoria_id);
        }


        header('Location: ../../index.php?mensaje=success&accion=editar');
        exit;
    } catch (Exception $e) {

        header('Location: ../../index.php?mensaje=error&accion=editar&detalle=' . urlencode($e->getMessage()));
        exit;
    }
} else {
    header('Location: ../../index.php');
    exit;
}
