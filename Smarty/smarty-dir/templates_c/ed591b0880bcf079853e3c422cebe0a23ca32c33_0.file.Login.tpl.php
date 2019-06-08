<?php
/* Smarty version 3.1.33, created on 2019-06-07 17:07:28
  from '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/Login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfa7db0128377_00743335',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed591b0880bcf079853e3c422cebe0a23ca32c33' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/Login.tpl',
      1 => 1559899709,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfa7db0128377_00743335 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" style="">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body style="	background-image: url(/myRecipes-Web/Smarty/smarty-dir/templates/img/carbonara.jpg);	background-position: top left;	background-size: cover;">

<div class="alert">
  <p><?php echo $_smarty_tpl->tpl_vars['errore']->value;?>
</p>
</div>

  <div class="text-center" style="">
    <div class="container">
      <div class="row mt-4">
        <div class="mx-auto offset-md-2 col-md-6" style=""><img class="img-fluid d-block w-50" src="/myRecipes-Web/Smarty/smarty-dir/templates/img/logobiancopieno.png"></div>
      </div>
      <div class="row" style="">
        <div class="bg-white mx-auto p-0 px-5 pt-4 pb-3 col-md-6 border-dark" style="	box-shadow: 0px 0px 10px  black;">
          <h1 class="mb-4 text-dark">Log in</h1>
          <form method="post" <?php if ($_smarty_tpl->tpl_vars['ruolo']->value == "utente") {?>
            action="/myRecipes-Web/Utente/Login"
                  <?php } else { ?> action="/myRecipes-Web/Amministratore/Login"
                  <?php }?>>
            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Username" id="form9">
            </div>
            <div class="form-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password" id="form10">
              <small class="form-text text-muted text-right">
                <a href="#"> Recupera password</a>
              </small>
              <?php if ($_smarty_tpl->tpl_vars['ruolo']->value == "utente") {?>
                <small class="text-muted form-text mt-2 text-left">
                  <a href="/myRecipes-Web/Utente/Registrazione">Non sei ancora registrato? Clicca qui!</a>
                </small>
              <?php }?>
            </div>
             <div> <button type="submit" class="btn btn-primary btn-lg">Accedi</button>
             </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html><?php }
}
