<?php
/* Smarty version 3.1.33, created on 2019-06-07 14:15:28
  from '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/Ricerca per IngredientiUtNonReg.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfa556091da38_62338370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7399dc28e489b497c8cddfee492115b3ff288488' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/Ricerca per IngredientiUtNonReg.tpl',
      1 => 1559909724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfa556091da38_62338370 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-light" style="	background-image: linear-gradient(to bottom, rgba(196, 60, 0), rgba(255, 158, 64));	background-position: top left;	background-size: 100%;">
  <nav class="navbar navbar-expand-md navbar-primary bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-10 bg-primary" style="">
          <img class="img-fluid d-block w-75" src="/myRecipes-Web/Smarty/smarty-dir/templates/img/logobiancopieno.png">
        </div>
      </div>
      <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10" style="">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="topnav1 pull-right">
          <a href="/myRecipes-Web">Home</a>
          <a href="/myRecipes-Web/Utente/Login">Login</a>
          <a href="/myRecipes-Web/Amministratore/Login">Login Amministratore</a>
          <a href="/myRecipes-Web/Utente/Registrazione">Registrazione</a>
        </div>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-md navbar-dark border-info bg-secondary p-0" style="">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar12">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar12">
        <a href="/myRecipes-Web/Ricette/RicercaAvanzata"  class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a>
        <a class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>
        <form class="form-inline"  method="post" action="/myRecipes-Web/Ricette/cercaDaNome">
          <div class="input-group">
            <input type="text" class="form-control ml-1 mt-2 mb-1" id="inlineFormInputGroup" placeholder="Cerca">
            <div class="input-group-append my-0 mb-0"><button class="btn btn-primary pb-0 mt-2 mb-1" type="button"><i class="fa fa-search pb-1"></i></button></div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="bg-white col-12 py-4 pl-4 col-md-12 my-0 mx-0 mt-1">
          <h3 class="display-4 text-dark pl-3" align=""><b>Ricerca per ingredienti </b><i class="fa fa-cutlery"></i></h3>
          <form action="#">
            <div class="form-check text-dark ml-5">
              <div class="container">
                <?php
$__section_cibo_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['cibi']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_cibo_0_total = $__section_cibo_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_cibo'] = new Smarty_Variable(array());
if ($__section_cibo_0_total !== 0) {
for ($__section_cibo_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_cibo']->value['index'] = 0; $__section_cibo_0_iteration <= $__section_cibo_0_total; $__section_cibo_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_cibo']->value['index']++){
?>

                <div class="row">
                  <div class="mt-2" style="">
                    <input class="form-check-input" type="checkbox" name="cibi[]" value="<?php echo $_smarty_tpl->tpl_vars['cibi']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_cibo']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cibo']->value['index'] : null)]->getId();?>
" id="defaultCheck1">
                    <img class="img-fluid d-block" src="data:<?php echo $_smarty_tpl->tpl_vars['cibi']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_cibo']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cibo']->value['index'] : null)]->getImmagine()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['cibi']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_cibo']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cibo']->value['index'] : null)]->getImmagine()->getData();?>
" style="	width: 70px;	height: 50px;"></div>
                  <div class="col-md-4 mt-2" style=""><?php echo $_smarty_tpl->tpl_vars['cibi']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_cibo']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cibo']->value['index'] : null)]->getNome();?>
 </div>
                </div>
                <?php
}
}
?>

                <div class="row pull-right">
                  <button type="submit" class="btn btn-primary btn-lg mb-3 mt-2 mr-5 " style=""><b>Cerca</b></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html><?php }
}
