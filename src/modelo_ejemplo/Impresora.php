<?php

namespace Dwes04\modelo_ejemplo;

use \PDOException;

class Impresora {
    const TIPOS = ['inyeccion', 'laser', '3D'];
    private ?int $id = null;
    private ?string $tipo;
    private ?string $nombre;

    public function setNombre(string $nombre) {
        $this -> nombre = $nombre;
    }

    public function setTipo(string $tipo) {
        if (in_array($tipo, Impresora::TIPOS))
        $this -> tipo = $tipo;
    }

    public function getId(): int {
        return $this -> id;
    }

    public function getNombre(): string {
        return $this -> nombre;
    }

    public function getTipo(): string {
        return $this -> tipo;
    }

    public function guardar(\PDO $pdo): int|bool { //Dos metodos en 1 al hacer if (is null($this -> id)) - else.

        if (is_null($this -> id)) {
            $SQL = 'INSERT INTO impresoras (tipo, nombre) VALUES (:tipo, :nombre)';
            try {
                $stmt = $pdo -> prepare($SQL);
                $stmt->bindValue(':tipo', $this -> tipo);
                $stmt->bindValue(':nombre', $this -> nombre);
                $stmt->execute();

                if ($stmt -> rowCount() > 0) {
                    $this -> id = $pdo->lastInsertId();
                    return true;
                }
            } catch (\PDOException $ex) {
                return -2;
            }
        } else {
            // Si no es nulo, se puede actualizar
            $SQL = 'UPDATE impresoras SET nombre = :nombre, tipo = :tipo WHERE id = :id';
            try {
                $stmt = $pdo -> prepare($SQL);
                $stmt->bindValue(':tipo', $this -> tipo);
                $stmt->bindValue(':nombre', $this -> nombre);
                $stmt->bindValue(':id', $this -> id);
                $stmt->execute();

                if ($stmt -> rowCount() > 0) {
                    return true;
                }
            } catch (\PDOException $ex) {
                return -2;
            }
        }
        return false;
    }

    public static function rescatar(\PDO $pdo, int $id): Impresora|int|false {
        $SQL = "SELECT * FROM impresoras WHERE id = :id";
        try {
            $stmt = $pdo->prepare($SQL); // PDOStatement
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($datos) {
                $imp = new Impresora(); // Es preferible crear un nuevo objeto a machacar uno ya existente
                $imp->id = $datos['id'];
                $imp->tipo = $datos['tipo'];
                $imp->nombre = $datos['nombre'];

                return $imp;
            }
        } catch (\PDOException $ex) {
            return -2;
        }
        return false;
    }

    public static function borrar(\PDO $c, int $id): bool|int {

        $SQL = "DELETE FROM impresoras WHERE id = :id";
        try {
            $stmt = $c->prepare($SQL); // PDOStatement
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) return true; 
        } catch (\PDOException $ex) {
            return -2;
        }
        return false;
    }
}