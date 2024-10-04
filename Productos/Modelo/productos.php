<?php
require_once(__DIR__ . '/../../conexion.php');

class productos extends conexion
{

    public function __construct()
    {
        $this->conexion = parent::__construct();
    }

    public function add($codigo, $nombre, $precio, $cantidad, $imagen)
    {
        $statement = $this->conexion->prepare("INSERT INTO productos (codigo,nombre,precio,cantidad,imagen)
                                        VALUES(:codigo, :nombre, :precio, :cantidad, :imagen)");
        $statement->bindParam(':codigo', $codigo);
        $statement->bindParam(':nombre', $nombre);
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
        $statement = $this->conexion->prepare(
            "SELECT p.*, GROUP_CONCAT(c.nombre SEPARATOR ', ') AS categorias 
         FROM productos p 
         LEFT JOIN producto_categoria pc ON p.id = pc.producto_id
         LEFT JOIN categorias c ON pc.categoria_id = c.id
         GROUP BY p.id"
        );
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
            $rows[] = $result['categoria_id'];
        }
        return $rows;
    }

    public function update($id, $codigo, $nombre, $precio, $cantidad, $imagen)
    {
        // Obtener los valores actuales del producto antes de la actualización
        $producto_actual = $this->getById($id)[0]; // Asumiendo que getById devuelve un array
        $statement = $this->conexion->prepare("UPDATE productos SET codigo=:codigo, nombre=:nombre,
                                            precio=:precio, cantidad=:cantidad, imagen=:imagen 
                                            WHERE id = :id");

        $statement->bindParam(':id', $id);
        $statement->bindParam(':codigo', $codigo);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':precio', $precio);
        $statement->bindParam(':cantidad', $cantidad);
        $statement->bindParam(':imagen', $imagen);

        if ($statement->execute()) {
            // Registrar cambios en cantidad y precio si han cambiado
            if ($producto_actual['precio'] != $precio) {
                $this->registrarCambio($id, 'precio', $producto_actual['precio'], $precio);
            }
            if ($producto_actual['cantidad'] != $cantidad) {
                $this->registrarCambio($id, 'cantidad', $producto_actual['cantidad'], $cantidad);
            }
            header('Location: ../../index.php');
        } else {
            header('Location: ../../index.php');
        }
    }

    public function registrarCambio($producto_id, $campo, $valor_anterior, $valor_nuevo)
    {
        $statement = $this->conexion->prepare(
            "INSERT INTO log_cambios (producto_id, campo_modificado, valor_anterior, valor_nuevo)
        VALUES (:producto_id, :campo_modificado, :valor_anterior, :valor_nuevo)"
        );
        $statement->bindParam(':producto_id', $producto_id);
        $statement->bindParam(':campo_modificado', $campo);
        $statement->bindParam(':valor_anterior', $valor_anterior);
        $statement->bindParam(':valor_nuevo', $valor_nuevo);
        $statement->execute();
    }

    public function getCambios($producto_id)
    {
        $statement = $this->conexion->prepare("SELECT * FROM log_cambios WHERE producto_id = :producto_id ORDER BY fecha_cambio DESC");
        $statement->bindParam(':producto_id', $producto_id);
        $statement->execute();
        return $statement->fetchAll();
    }

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
