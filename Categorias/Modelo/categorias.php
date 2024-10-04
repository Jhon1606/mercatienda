<?php
require_once(__DIR__ . '/../../conexion.php');

class categorias extends conexion
{

    public function __construct()
    {
        $this->conexion = parent::__construct();
    }

    public function add($nombre)
    {
        $statement = $this->conexion->prepare("INSERT INTO categorias (nombre)
                                        VALUES(:nombre)");
        $statement->bindParam(':nombre', $nombre);
        if ($statement->execute()) {
            header('Location: ../Vista/index.php');
        } else {
            header('Location: ../Vista/index.php');
        }
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

    public function getCategoriasPage($limit, $offset)
    {
        $rows = null;
        $statement = $this->conexion->prepare("SELECT * FROM categorias LIMIT :limit OFFSET :offset");
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function getTotalCategorias()
    {
        $statement = $this->conexion->prepare(
            "SELECT COUNT(*) as total FROM categorias"
        );
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getById($id)
    {
        $rows = null;
        $statement = $this->conexion->prepare("SELECT * FROM categorias WHERE id=:id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function update($id, $nombre)
    {
        $statement = $this->conexion->prepare("UPDATE categorias SET  nombre=:nombre 
                                            WHERE id = :id");

        $statement->bindParam(':id', $id);
        $statement->bindParam(':nombre', $nombre);
        if ($statement->execute()) {
            header('Location: ../Vista/index.php');
        } else {
            header('Location: ../Vista/index.php');
        }
    }

    public function delete($id)
    {
        $statement = $this->conexion->prepare("DELETE FROM categorias WHERE id = :id");
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            header('Location: ../Vista/index.php');
        } else {
            header('Location: ../Vista/index.php');
        }
    }
}
