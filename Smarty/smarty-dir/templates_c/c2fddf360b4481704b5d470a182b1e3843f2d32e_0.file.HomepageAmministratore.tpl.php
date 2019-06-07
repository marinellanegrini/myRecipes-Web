<?php
/* Smarty version 3.1.33, created on 2019-06-07 10:17:27
  from '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/HomepageAmministratore.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfa1d97812103_47012390',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2fddf360b4481704b5d470a182b1e3843f2d32e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/HomepageAmministratore.tpl',
      1 => 1559894112,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfa1d97812103_47012390 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body style="">
  <div class="topnav">
    <a href="/myRecipes-Web" class="active">Home</a>
    <a href="#news">Monitoraggio</a>
    <a href="#contact">Nuova ricetta</a>
    <a href="#contact">Nuovo ingrediente</a>
    <a href="#contact">Logout</a>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Ultimi commenti</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group </h5> <small class="text-muted">3 days ago</small>
              </div>
              <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p> <small class="text-muted">Donec id elit non mi porta.</small>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12"><a class="btn btn-primary mt-1" href="#Monitoraggio">Vedi altri</a></div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card text-dark bg-primary mb-3" style="	height: 150px;">
            <div class="card-header" align="center"><i class="fa fa-eye fa-lg" aria-hidden="true"></i><strong><b> Visite settimanali </b></strong></div>
            <div class="card-body" style="	border-top-left-radius: 10px;	border-top-right-radius: 10px;	border-bottom-left-radius: 10px;	border-bottom-right-radius: 10px;">
              <h3 class="display-4 text-dark" align="center">5</h3>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-dark bg-secondary mb-3" style="	height: 150px;">
            <div class="card-header" align="center"><i class="fa fa-floppy-o" aria-hidden="true"></i><strong><b> Ricette salvate</b></strong></div>
            <div class="card-body">
              <h3 class="display-4 text-dark" align="center">5</h3>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-dark bg-info mb-3" style="	height: 150px;">
            <div class="card-header" align="center"><i class="fa fa-user fa-fw"></i><strong><b> Utenti Registrati</b> </strong></div>
            <div class="card-body">
              <h3 class="display-4 text-dark" align="center">5</h3>
            </div>
          </div>
        </div>
        <div class="col-md-3" style="">
          <div class="card text-dark bg-white mb-3" style="	height: 150px;">
            <div class="card-header" align="center"><i class="fa fa-book" aria-hidden="true"></i><strong><b> Ricette più visitate</b></strong></div>
            <div class="card-body">
              <h3 class="display-4 text-dark" align="center">5</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html><?php }
}
