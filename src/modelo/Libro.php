<?php

namespace Dwes04\modelo;

/**
 * <p>Clase que representa un libro.</p>
 * <p>
 * Los objetos de esta clase contienen atributos que permiten almacenar la información
 * necesaria de un libro para añadir a la base de datos:</p>
 * <ul>
 * <li>ID único del libro.</li>
 * <li>Código ISBN del libro (En total, 13 dígitos).</li>
 * <li>Título del libro.</li>
 * <li>Autor del libro.</li>
 * <li>Año de publicación del libro.</li>
 * <li>Número total de páginas del libro.</li>
 * <li>Número total de ejemplares disponibles del libro.</li>
 * <li>Fecha de creación del libro.</li>
 * <li>Fecha de actualización del libro.</li>
 * </ul>
 * <p>Se trata de una clase que contiene información sobre un libro y que implementa
 * la interfaz IGuardableMM mediante la cual se puede crear, seleccionar o eliminar un libro.
 * </p>
 * 
 *
 * @author María Morillo Maqueda
 * @version 1.0
 */
class Libro implements IGuardableMMM {
    // DECLARACIÓN DE VARIABLES
    private ?int $id = null;
    private ?string $isbn = null; // Valor predeterminado
    private ?string $titulo = null;
    private ?string $autor = null;
    private ?int $anio_publicacion = null;
    private ?int $paginas = null;
    private ?int $ejemplares_disponibles = null;
    private ?string $fecha_creacion = null;
    private ?string $fecha_actualizacion = null;

     //-----------------------------
    //MÉTODOS DE CONSULTA (GETTERS)
    //-----------------------------
    /**
     * Devuelve el ID del libro. Se trata de un id que lo identifica unívocamente.
     * 
     * @return id del libro.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Devuelve el código ISBN del libro.
     * 
     * @return isbn del libro.
     */
    public function getIsbn() {
        return $this->isbn;
    }

    /**
     * Devuelve el título del libro.
     * 
     * @return titulo del libro.
     */
    public function GetTitulo() {
        return $this->titulo;
    }

    /**
     * Devuelve el autor del libro.
     * 
     * @return autor del libro.
     */
    public function GetAutor() {
        return $this->autor;
    }

    /**
     * Devuelve el año de publicación del libro.
     * 
     * @return anio_publicacion del libro.
     */
    public function GetAnioPublicacion() {
        return $this->anio_publicacion;
    }

    /**
     * Devuelve el número de páginas del libro.
     * 
     * @return paginas del libro.
     */
    public function getPaginas() {
        return $this->paginas;
    }

    /**
     * Devuelve el número de ejemplares disponibles del libro.
     * 
     * @return ejemplares_disponibles del libro.
     */
    public function getEjemplaresDisponibles() {
        return $this->ejemplares_disponibles;
    }

    /**
     * Devuelve la fecha de creación del libro.
     * 
     * @return fecha_creacion del libro.
     */
    public function getFechaCreacion() {
        return $this->fecha_creacion;
    }

    /**
     * Devuelve la fecha de actualización del libro.
     * 
     * @return fecha_actualizacion del libro.
     */
    public function getFechaActualizacion() {
        return $this->fecha_actualizacion;
    }

    //MÉTODOS DE MODIFICACIÓN (SETTERS)
    //---------------------------------
    /** 
     * En este caso, no se realizan modificaciones.
     * Si el ISBN es de tipo número, se asignará a la variable.
     * 
     * @param isbn ISBN del libro.
     */
    public function setIsbn(int $isbn) {
        if (is_numeric($isbn)) {
            $this->isbn = $isbn;
        }
    }

    /** 
     * En este caso, no se realizan modificaciones.
     * Si el título es de tipo cadena de texto, se asignará a la variable.
     * 
     * @param titulo Título del libro.
     */
    public function setTitulo(string $titulo) {
        if (is_string($titulo)) {
            $this->titulo = $titulo;
        }
    }

    /** 
     * En este caso, no se realizan modificaciones.
     * Si el autor es de tipo cadena de texto, se asignará a la variable.
     * 
     * @param autor Autor del libro.
     */
    public function setAutor(string $autor) {
        if (is_string($autor)) {
            $this->autor = $autor;
        }
    }

    /** 
     * En este caso, no se realizan modificaciones.
     * Si el año de publicación es de tipo número, se asignará a la variable.
     * 
     * @param anio_publicacion Año de publicación del libro.
     */
    public function setAnioPublicacion(int $anio_publicacion) {
        if (is_numeric($anio_publicacion)) {
            $this->anio_publicacion = $anio_publicacion;
        }
    }

    /** 
     * En este caso, no se realizan modificaciones.
     * Si el número de páginas es de tipo número, se asignará a la variable.
     * 
     * @param paginas Páginas del libro.
     */
    public function setPaginas(int $paginas) {
        if (is_numeric($paginas)) {
            $this->paginas = $paginas;
        }
    }

    /** 
     * En este caso, no se realizan modificaciones.
     * Si el número de ejemplares disponibles es de tipo número, se asignará a la variable.
     * 
     * @param ejemplares_disponibles Ejemplares disponibles del libro.
     */
    public function setEjemplaresDisponibles(int $ejemplares_disponibles) {
        if (is_numeric($ejemplares_disponibles)) {
            $this->ejemplares_disponibles = $ejemplares_disponibles;
        }
    }

    //-------------------------------------
    //MÉTODO GUARDAR
    //-------------------------------------
    /**
     * Crea un objeto de tipo Libro.
     * @param c Una instancia de la clase PDO.
     * @return registrosInsertados que corresponde a 1 libro.
     * @return int -2 fallo en la conexión PDO.
     * @return false en caso de que no se pueda guardar el libro.
     */
    public function guardar(\PDO $c): int|bool {

        if (is_null($this -> id)) {
            $SQL = "INSERT INTO libros (isbn, titulo, autor, anio_publicacion, paginas, ejemplares_disponibles) VALUES (:isbn, :titulo, :autor, :anio_publicacion, :paginas, :ejemplares_disponibles)";
            try {
                $stmt = $c->prepare($SQL);
                $stmt->bindValue(':isbn', $this -> isbn);
                $stmt->bindValue(':titulo', $this -> titulo);
                $stmt->bindValue(':autor', $this -> autor);
                $stmt->bindValue(':anio_publicacion', $this -> anio_publicacion, \PDO::PARAM_INT);
                $stmt->bindValue(':paginas', $this -> paginas, \PDO::PARAM_INT);
                $stmt->bindValue(':ejemplares_disponibles', $this -> ejemplares_disponibles, \PDO::PARAM_INT);
        
                // EJECUCIÓN DE LA CONSULTA
                if ($stmt->execute()) {
                    $registrosInsertados = $stmt->rowCount();
                    if ($registrosInsertados > 0) {
                        $this->id = $c->lastInsertId();

                        $SQL2 = "SELECT fecha_creacion, fecha_actualizacion FROM libros WHERE id = :id";
                        $stmt2 = $c -> prepare($SQL2);
                        $stmt2->bindValue(':id', $this->id, \PDO::PARAM_INT);
                        
                        if ($stmt2->execute()) {
                            $fechas = $stmt2->fetch(\PDO::FETCH_ASSOC);
                            $this->fecha_creacion = $fechas['fecha_creacion'];
                            $this->fecha_actualizacion = $fechas['fecha_actualizacion'];
                        }

                        return $registrosInsertados;
                    }
                }
            } catch (\PDOException $ex) {
                return -2;
            }
        }
        return false;
    }

    //-------------------------------------
    //MÉTODO RESCATAR
    //-------------------------------------
    /**
     * Selecciona un objeto de la clase Libro y lo devuelve.
     * @param c Una instancia de la clase PDO.
     * @param id ID del objeto Libro seleccionado.
     * @return Libro seleccionado.
     * @return int -2 fallo en la conexión PDO.
     * @return false en caso de que no se pueda seleccionar el libro.
     */
    public static function rescatar(\PDO $c, int $id): Libro|int|false {
        $SQL = "SELECT * FROM libros WHERE id = :id";
        try {
            $stmt = $c->prepare($SQL); // PDOStatement
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($datos) {
                $libro = new Libro(); // Es preferible crear un nuevo objeto a machacar uno ya existente
                $libro->id = $datos['id'];
                $libro->isbn = $datos['isbn'];
                $libro->titulo = $datos['titulo'];
                $libro->autor = $datos['autor'];
                $libro->anio_publicacion = (int) $datos['anio_publicacion'];
                $libro->paginas = (int) $datos['paginas'];
                $libro->ejemplares_disponibles = (int) $datos['ejemplares_disponibles'];
                $libro->fecha_creacion = $datos['fecha_creacion'];
                $libro->fecha_actualizacion = $datos['fecha_actualizacion'];

                return $libro;
            }
        } catch (\PDOException $ex) {
            return -2;
        }
        return false;
    }

    //-------------------------------------
    //MÉTODO BORRAR
    //-------------------------------------
    /**
     * Elimina un objeto de tipo Libro.
     * @param c una instancia de la clase PDO.
     * @param id ID del objeto Libro eliminado.
     * @return registrosEliminados que corresponde a 1 libro eliminado.
     * @return int -2 fallo en la conexión PDO.
     * @return false en caso de que no se pueda eliminar el libro.
     */
    public static function borrar(\PDO $c, int $id): int|false {

        $SQL = "DELETE FROM libros WHERE id = :id";
        try {
            $stmt = $c->prepare($SQL); // PDOStatement
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);

            // EJECUCIÓN DE LA CONSULTA
            if ($stmt->execute()) {
                $registrosEliminados = $stmt->rowCount(); 
                if ($registrosEliminados === 1) return $registrosEliminados; 
            }
        } catch (\PDOException $ex) {
            return -2;
        }
        return false;
    }
}