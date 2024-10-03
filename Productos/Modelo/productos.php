<?php
require_once(__DIR__ . '/../../conexion.php');

class productos extends conexion
{

    public function __construct()
    {
        $this->conexion = parent::__construct();
    }

    public function add($codigo, $nombre, $categoria_id, $precio, $cantidad, $imagen)
    {
        $statement = $this->conexion->prepare("INSERT INTO productos (codigo,nombre,categoria_id,precio,cantidad,imagen)
                                        VALUES(:codigo, :nombre, :categoria_id, :precio, :cantidad, :imagen)");
        $statement->bindParam(':codigo', $codigo);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':categoria_id', $categoria_id);
        $statement->bindParam(':precio', $precio);
        $statement->bindParam(':cantidad', $cantidad);
        $statement->bindParam(':imagen', $imagen);
        if ($statement->execute()) {
            header('Location: ../../index.php');
        } else {
            header('Location: ../../index.php');
        }
    }

    public function getLastInsertedId()
    {
        return $this->conexion->lastInsertId();
    }


    public function addProductoCategoria($producto_id, $categoria_id,)
    {
        $statement = $this->conexion->prepare("INSERT INTO producto_categoria (producto_id, categoria_id)
                                        VALUES(:producto_id,:categoria_id)");
        $statement->bindParam(':producto_id', $producto_id);
        $statement->bindParam(':categoria_id', $categoria_id);
        if ($statement->execute()) {
            header('Location: ../../index.php');
        } else {
            header('Location: ../../index.php');
        }
    }

    public function getProductos()
    {
        $rows = null;
        $statement = $this->conexion->prepare("SELECT * FROM productos");
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function getCategorias()
    {
        $rows = null;
        $statement = $this->conexion->prepare("SELECT * FROM categorias");
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }


    public function getById($id)
    {
        $rows = null;
        $statement = $this->conexion->prepare("SELECT * FROM productos WHERE id=:id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function getProductoCategorias($id)
    {
        $rows = null;
        $statement = $this->conexion->prepare("SELECT * FROM producto_categoria WHERE producto_id=:id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result['rol_id'];
        }
        return $rows;
    }

    public function update($id, $codigo, $nombre, $categoria, $precio, $cantidad, $imagen)
    {
        $statement = $this->conexion->prepare("UPDATE productos SET  codigo=:codigo, nombre=:nombre, categoria=:categoria, 
                                            precio=:precio, cantidad=:cantidad, imagen=:imagen, 
                                            WHERE id = :id");

        $statement->bindParam(':id', $id);
        $statement->bindParam(':codigo', $codigo);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':categoria', $categoria);
        $statement->bindParam(':precio', $precio);
        $statement->bindParam(':cantidad', $cantidad);
        $statement->bindParam(':imagen', $imagen);

        if ($statement->execute()) {
            header('Location: ../../index.php');
        } else {
            header('Location: ../../index.php');
        }
    }

    // public function updateEmpleadoRol($empleado_id, $rol_id)
    // {
    //     $statement = $this->conexion->prepare("UPDATE empleado_rol SET rol_id=:rol_id WHERE empleado_id = :empleado_id");

    //     $statement->bindParam(':empleado_id', $empleado_id);
    //     $statement->bindParam(':rol_id', $rol_id);
    //     $statement->execute();
    // }

    public function delete($id)
    {
        $statement = $this->conexion->prepare("DELETE FROM productos WHERE id = :id");
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            header('Location: ../../index.php');
        } else {
            header('Location: ../../index.php');
        }
    }

    public function deleteProductoCategoria($id)
    {
        $statement = $this->conexion->prepare("DELETE FROM producto_categoria WHERE producto_id = :id");
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            header('Location: ../../index.php');
        } else {
            header('Location: ../../index.php');
        }
    }
}
