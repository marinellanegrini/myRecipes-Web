<?php
/* Smarty version 3.1.33, created on 2019-06-07 14:40:02
  from '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/RisultatiRicercaUtNonReg.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfa5b22aecc94_11894953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e98c1e6955584550fbe53d222fe1e7746a8faa6' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/RisultatiRicercaUtNonReg.tpl',
      1 => 1559911121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfa5b22aecc94_11894953 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-light" style="	box-shadow: 0px 0px 4px  black;">
  <nav class="navbar navbar-expand-md bg-primary navbar-primary ">
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
          <a href="/myRecipes-Web/Amministratore/Login">Login amministratore</a>
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
        <a class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a><a class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>
        <form class="form-inline"  method="post" action="/myRecipes-Web/Ricette/cercaDaNome">
          <div class="input-group">
            <input type="text" class="form-control mt-2 mb-1" id="inlineFormInputGroup" placeholder="Cerca">
            <div class="input-group-append"><button class="btn btn-primary mt-2 mb-1" type="button"><i class="fa fa-search"></i></button></div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <div class="pt-5 pb-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-left text-dark" style="">I risultati della ricerca sono</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="border-0" style="">
    <?php
$__section_ricetta_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['risultati']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_ricetta_0_total = $__section_ricetta_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_ricetta'] = new Smarty_Variable(array());
if ($__section_ricetta_0_total !== 0) {
for ($__section_ricetta_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] = 0; $__section_ricetta_0_iteration <= $__section_ricetta_0_total; $__section_ricetta_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']++){
?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row border mb-3" style="">
              <div class="col-md-6 col-lg-3 order-2 order-md-1 p-0" style="">
                <img class="img-fluid d-block" src="data:<?php echo $_smarty_tpl->tpl_vars['risultati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getImmagine()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['risultati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getImmagine()->getData();?>
"></div>
              <div class="d-flex flex-column justify-content-center col-md-8 offset-lg-1 align-items-start order-1 order-md-2 p-2 border-0" style="">
                <div class="row w-100">
                  <div class="col-md-12"><a class="btn pull-right ml-1 text-primary"><i class="fa fa-heart-o" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['risultati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getNsalvataggi();?>
</a>
                    </div>
                </div>
                <h6 class="text-dark"><?php echo $_smarty_tpl->tpl_vars['risultati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getCategoria()->getNome();?>
</h6>
                <h2 class="text-dark"><?php echo $_smarty_tpl->tpl_vars['risultati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getNome();?>
</h2>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12 my-0">
                        <a class="btn mr-1" >
                          <?php if ($_smarty_tpl->tpl_vars['risultati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getDifficolta() == 1) {?>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                          <?php } elseif ($_smarty_tpl->tpl_vars['risultati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getDifficolta() == 2) {?>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                          <?php } elseif ($_smarty_tpl->tpl_vars['risultati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getDifficolta() == 3) {?>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                          <?php } elseif ($_smarty_tpl->tpl_vars['risultati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getDifficolta() == 4) {?>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                          <?php } else { ?>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                          <?php }?>
                          </a>
                        <a class="btn btn-sm text-primary">
                          <i class="fa fa-clock-o fa-lg text-primary" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['risultati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getTprep();?>
</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    <?php
}
}
?>

  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mb-0 mt-2">© 2019 All rights reserved</p>
        </div>
      </div>
    </div>
  </div>
 
</body>

</html><?php }
}
