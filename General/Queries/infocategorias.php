<?php
require_once("../../Categorias/Modelo/categorias.php");

$id = $_POST["id"];
$arreglo = array();

$modeloCategoria = new categorias();
$informacionCategoria = $modeloCategoria->getById($id);

if ($informacionCategoria != null) {

    foreach ($informacionCategoria as $infoCategoria) {

        $arreglo[] = array(
            "id" => $infoCategoria["id"],
            "nombre" => $infoCategoria["nombre"],
        );
    }
}

echo json_encode($arreglo);
