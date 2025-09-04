<?php

namespace Dwes04\modelo_ejemplo;

use Dwes04\modelo_ejemplo\Impresora;

class Impresoras {
    public static function obtenerImpresoras(\PDO $pdo): array|int { // Cuando se trata del espacio de nombre global y no de nigun subespacio se coloca la barra \ .
        try {
            $query = "SELECT * FROM impresoras";
            $r = $pdo -> query($query);
            $impresoras = [];
            
            foreach ($r as $fila) {
                $impresoras[] = Impresora::rescatar($pdo, $fila['id']);
            }
            return $impresoras;
        } catch (\PDOException $ex) {
            return -1;
        }
    }
}