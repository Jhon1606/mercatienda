<?php
require_once("../../Productos/Modelo/productos.php");

$id = $_POST["id"];
$arreglo = array();

$modeloProducto = new productos();
$informacionProducto = $modeloProducto->getById($id);
$infoProductoCategoria = $modeloProducto->getProductoCategorias($id);

if ($informacionProducto != null) {

    foreach ($informacionProducto as $infoProducto) {

        $arreglo[] = array(
            "id" => $infoProducto["id"],
            "codigo" => $infoProducto["codigo"],
            "nombre" => $infoProducto["nombre"],
            "precio" => $infoProducto["precio"],
            "cantidad" => $infoProducto["cantidad"],
            "imagen" => $infoProducto["imagen"],
            "categorias" => $infoProductoCategoria,
        );
    }
}

echo json_encode($arreglo);
