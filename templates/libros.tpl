<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de libros</title>
</head>
<body>
    <h1>Listado de Libros</h1>

    <form action="index.php" method="post">
        <h2>Selecciona un orden:</h2>
        <SELECT name="orden">
            <option value="actualizacion">Fecha de Actualización</option>
            <option value="creacion">Fecha de Creación</option>
        </SELECT>
        <br><br>
        <input type="submit" value="Enviar!">
    </form><br>

    <table border=1>
        <thead>
            <tr>
            <th>ID</th>
            <th>isbn</th>
            <th>titulo</th>
            <th>autor</th>
            <th>anio_publicacion</th>
            <th>paginas</th>
            <th>ejemplares_disponibles</th>
            <th>fecha_creacion</th>
            <th>fecha_actualizacion</th>
            <th>Eliminar un libro</th>
            </tr>
        </thead>
        <tbody>
            {foreach $libros as $libro}
            <tr>
            <td>{$libro->getId()}</td>
            <td>{$libro->getIsbn()}</td>
            <td>{$libro->getTitulo()}</td>
            <td>{$libro->getAutor()}</td>
            <td>{$libro->GetAnioPublicacion()}</td>
            <td>{$libro->getPaginas()}</td>
            <td>{$libro->getEjemplaresDisponibles()}</td>
            <td>{$libro->getFechaCreacion()}</td>
            <td>{$libro->getFechaActualizacion()}</td>
            <td> 
                <form action="index.php?accion=borrar_libro_MMM" method="post">
                    <input type="hidden" name="id" value="{$libro->getId()}"><br>
                    <input type="submit" value="Eliminar">
                </form>
            </td>
            </tr>
            {/foreach}
        </tbody>
    </table><br>
    {if isset($mensaje)}
        <p>{$mensaje}</p>
    {/if}
    {if isset($errores)}
        {foreach $errores as $error}
            <p>{$error}</p>
        {/foreach}
    {/if}
    <a href="index.php?accion=nuevo_libro_form_MMM">Añade un nuevo libro</a>
</body>
</html>