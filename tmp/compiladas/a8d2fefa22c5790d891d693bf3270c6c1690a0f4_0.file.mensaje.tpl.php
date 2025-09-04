<?php
/* Smarty version 4.5.5, created on 2025-02-20 11:59:41
  from 'C:\xampp\htdocs\dwes04\templates\mensaje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67b70b1dd8e2d2_42507046',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8d2fefa22c5790d891d693bf3270c6c1690a0f4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dwes04\\templates\\mensaje.tpl',
      1 => 1740048752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b70b1dd8e2d2_42507046 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <title>Mensajes y errores</title>
</head>
<body>
    <?php if ((isset($_smarty_tpl->tpl_vars['mensaje']->value))) {?>
        <h2><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</h2>
    <?php }?>
</body>
</html><?php }
}
