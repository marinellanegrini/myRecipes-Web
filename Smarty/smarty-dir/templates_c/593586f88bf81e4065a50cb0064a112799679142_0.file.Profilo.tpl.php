<?php
/* Smarty version 3.1.33, created on 2019-06-08 18:05:05
  from '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/Profilo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfbdcb14ed407_94378226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '593586f88bf81e4065a50cb0064a112799679142' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/Profilo.tpl',
      1 => 1560009450,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfbdcb14ed407_94378226 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <title>Profilo</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-light" style="">

  <nav class="navbar navbar-expand-md bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-10" style="">
          <a href="/myRecipes-Web">
          <img class="img-fluid d-block w-75" src="/myRecipes-Web/Smarty/smarty-dir/templates/img/logobiancopieno.png">
          </a>
        </div>
      </div>



    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10" style="">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="col-md-12">
        <ul class="nav pull-right" style="">
          <li class="nav-item">
            <a href="/myRecipes-Web" class="nav-link active text-white">Home</a>
          </li>
          <li class="nav-item">
            <a href="/myRecipes-Web/Ricette/Preferiti" class="nav-link active text-white">Preferiti <i class="fa fa-heart-o fa-fw " aria-hidden="true"></i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link text-white" href="#" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">Account <i class="fa fa-user-o fa-fw" aria-hidden="true"></i></a>
            <div class="dropdown-menu">

              <a class="dropdown-item" href="#"><i class="fa fa-user-o fa-fw" aria-hidden="true"></i> Profilo </a>
              <a class="dropdown-item" href="#"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Modifica account</a>
              <a class="dropdown-item" href="/myRecipes-Web/Utente/Logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

            </div>
          </li>
        </ul>
      </div>
    </div>

  </div>
</nav>
<nav class="navbar navbar-expand-md navbar-dark border-info bg-secondary p-0" style="">
  <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar12">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar12">
      <a href="/myRecipes-Web/Ricette/RicercaAvanzata" class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a>
      <a href="/myRecipes-Web/Ricette/RicercaPerIngredienti"  class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>
      <form class="form-inline"  method="post" action="/myRecipes-Web/Ricette/cercaDaNome">
        <div class="input-group">
          <input type="text" class="form-control mt-2 mb-1" id="inlineFormInputGroup" placeholder="Cerca" name="nomericetta">
          <div class="input-group-append"><button type="submit" class="btn btn-primary mr-2 mb-1 mt-2"><i class="fa fa-search"></i></button></div>
        </div>
      </form>
    </div>
  </div>
</nav>
<div class="pt-4">
  <div class="container">
    <div class="row">
      <div class=" mx-auto col-lg-12 col-10">
        <h3 class="text-dark display-4"><strong><b>Profilo </b></strong></h3>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
      <div class="col-md-6 mt-3"><img class="accountutente" src="data:<?php echo $_smarty_tpl->tpl_vars['utente']->value->getImmagine()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['utente']->value->getImmagine()->getData();?>

"></div>
      <div class="col-md-6 py-5 pl-5">
        <h1 class="text-dark"><b>Username: </b><?php echo $_smarty_tpl->tpl_vars['utente']->value->getUsername();?>
</h1>
        <h2 class="text-dark"><b>Email: </b><?php echo $_smarty_tpl->tpl_vars['utente']->value->getEmail();?>
</h2>
        <h2 class="text-dark"><b>Nome: </b><?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
</h2>
        <h2 class="pb-4 text-dark"><b>Cognome: </b><?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
</h2><a class="btn btn-primary" href="#" style="">Modifica Profilo</a>
      </div>
    </div>
</div>
<div class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-dark">I tuoi commenti:</h3>
      </div>
    </div>
  </div>
</div>
<div class="py-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="media-list">

          <?php $_smarty_tpl->_assignInScope('commenti', $_smarty_tpl->tpl_vars['utente']->value->getCommenti());?>

          <?php
$__section_commento_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['commenti']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_commento_0_total = $__section_commento_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_commento'] = new Smarty_Variable(array());
if ($__section_commento_0_total !== 0) {
for ($__section_commento_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index'] = 0; $__section_commento_0_iteration <= $__section_commento_0_total; $__section_commento_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index']++){
?>

          <li class="media py-2">
            <a href="#" class="pull-left" >
              <img class="cerchio" src="data:<?php echo $_smarty_tpl->tpl_vars['utente']->value->getImmagine()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['utente']->value->getImmagine()->getData();?>
">
            </a>
            <div class="media-body px-2 text-dark">
                <span class="text-muted pull-right">
                  <small class="text-muted" style=""><?php echo $_smarty_tpl->tpl_vars['commenti']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index'] : null)]->getData();?>
</small>
                  <br>
                  <small class="text-muted" style=""><?php echo $_smarty_tpl->tpl_vars['commenti']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index'] : null)]->getOra();?>
</small>
                </span><span class="text-muted pull-right"></span><span class="text-muted pull-right">
                </span>
              <p><?php echo $_smarty_tpl->tpl_vars['commenti']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index'] : null)]->getTesto();?>
</p>
            </div><a class="btn btn-outline-light" href="#"><i class="fa fa-fw fa-trash text-dark fa-lg my-2" style=""></i></a>
          </li>

          <?php
}
}
?>

        </ul>
      </div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" crossorigin="anonymous" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" style=""><?php echo '</script'; ?>
>

</body>

</html><?php }
}
