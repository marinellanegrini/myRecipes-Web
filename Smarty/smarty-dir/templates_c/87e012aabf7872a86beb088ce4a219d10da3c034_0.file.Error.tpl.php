<?php
/* Smarty version 3.1.33, created on 2019-06-06 22:03:01
  from '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/Error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf9717585e1a3_38579241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87e012aabf7872a86beb088ce4a219d10da3c034' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/Error.tpl',
      1 => 1559837803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf9717585e1a3_38579241 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <title>Error</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-light">
  <div class="py-5">
    <div class="container">
      <div class="row" style="">
        <div class="px-5 col-md-8 text-center mx-auto">
          <h3 class="text-primary display-1"> <b>ERRORE!</b></h3>
          <h3 class="text-primary display-5"><?php echo $_smarty_tpl->tpl_vars['messaggio']->value;?>
<br></h3>
          <h3 class="text-primary display-5">RIPROVARE PIU' TARDI<br></h3>
        </div>
      </div>
    </div>
  </div>

</body>

</html><?php }
}
