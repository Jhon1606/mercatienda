<?php
require_once('../Modelo/productos.php');

if ($_POST) {
    try {
        $modeloProducto = new productos();

        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        // Formatear el precio
        $precio = $_POST['precio'];
        // Convertir el formato de precio de 10.200,25 a 10200.25
        $precio_formateado = str_replace('.', '', $precio); // Eliminar puntos
        $precio_formateado = str_replace(',', '.', $precio_formateado); // Cambiar coma a punto
        $cantidad = $_POST['cantidad'];
        $directorio = '../../General/img/';

        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $nombreArchivo = $_FILES['imagen']['name'];
            $archivoTmp = $_FILES['imagen']['tmp_name'];
            $rutaImagen = $directorio . basename($nombreArchivo);
            move_uploaded_file($archivoTmp, $rutaImagen);
            $rutaImagen = 'General/img/' . basename($nombreArchivo);
        }

        $modeloProducto->add($codigo, $nombre, $precio_formateado, $cantidad, $rutaImagen);
        $producto_id = $modeloProducto->getLastInsertedId();

        foreach ($categoria as $categoria_id) {
            $modeloProducto->addProductoCategoria($producto_id, $categoria_id);
        }
        header('Location: ../../index.php?mensaje=success');
        exit;
    } catch (Exception $e) {

        header('Location: ../../index.php?mensaje=error&accion=editar&detalle=' . urlencode($e->getMessage()));
        exit;
    }
} else {
    header('Location: ../../index.php');
}
