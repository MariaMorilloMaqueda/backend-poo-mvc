<?php
/* Smarty version 4.5.5, created on 2025-02-19 18:15:01
  from 'C:\xampp\htdocs\dwes04\templates\eliminarLibro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67b61fa57d0bf6_97878055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1af44d5586c06c41409c59a04b94d641b1ac3b28' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dwes04\\templates\\eliminarLibro.tpl',
      1 => 1739988898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b61fa57d0bf6_97878055 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar un libro</title>
</head>
<body>
    <h1>Elimina un libro</h1>
    <form action="index.php?accion=borrar_libro_MMM" method="post">
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><br>
            <label for=""> ¿Desea eliminar el libro seleccionado?
                <input type="checkbox" name="confirmacion" value="">Confirmación
            </label>
            <input type="submit" value="Eliminar">
    </form>
</body>
</html><?php }
}
