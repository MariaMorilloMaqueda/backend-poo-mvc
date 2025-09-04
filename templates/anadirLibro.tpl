<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isertar un libro</title>
</head>
<body>
    <h1>Añade un libro</h1>
    {if isset($errores) && $errores}
        <ul>
            {foreach $errores as $error}
                <li>{$error}</li>
            {/foreach}
        </ul>
    {/if}

    <form action="index.php?accion=nuevo_libro_form_MMM" method="post">
        <label>ISBN: <input type="text" name="isbn"></label><br>
        <label>Título: <input type="text" name="titulo"></label><br>
        <label>Autor: <input type="text" name="autor"></label><br>
        <label>Año de publicación: <input type="number" name="anio_publicacion"></label><br>
        <label>Páginas: <input type="number" name="paginas"></label><br>
        <label>Ejemplares disponibles: <input type="number" name="ejemplares_disponibles"></label><br>
        <input type="submit" value="Añadir!">
    </form>
    {if isset($mensaje)}
        <p>{$mensaje}</p>
    {/if}
</body>
</html>