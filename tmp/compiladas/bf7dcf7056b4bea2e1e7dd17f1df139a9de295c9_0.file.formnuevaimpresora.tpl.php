<?php
/* Smarty version 4.5.5, created on 2025-02-20 11:59:34
  from 'C:\xampp\htdocs\dwes04\templates\formnuevaimpresora.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67b70b16846d75_91730024',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf7dcf7056b4bea2e1e7dd17f1df139a9de295c9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dwes04\\templates\\formnuevaimpresora.tpl',
      1 => 1740048961,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b70b16846d75_91730024 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <title>Ejemplo impresoras</title>
</head>
<body>
    <form action="?accion=newimp" method="post">
        Tipo: <input type="text" name="tipo" id="">
        Nombre: <input type="text" name="nombre" id="">
        <input type="submit" value="Crear">
    </form>
</body>
</html><?php }
}
