<?php
/* Smarty version 3.1.33, created on 2019-06-07 14:12:56
  from '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/ListaRicetteUtNonReg.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfa54c832abf4_41695969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a861db3a7913d9cb3b63a38490a33bc1eebba65' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/ListaRicetteUtNonReg.tpl',
      1 => 1559899783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfa54c832abf4_41695969 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <title>Lista Ricette</title>
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-light" style="">
  <!-- Navbar -->
  <!-- Cover -->
  <nav class="navbar navbar-expand-md navbar-primary bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-10 bg-primary" style="">
          <img class="img-fluid d-block w-75" src="/myRecipes-Web/Smarty/smarty-dir/templates/img/logobiancopieno.png">
        </div>
      </div>
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10" style="">
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

        <a href="/myRecipes-Web/Ricette/RicercaAvanzata"class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a>
        <a href="/myRecipes-Web/Ricette/RicercaPerIngredienti" class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>

        <form class="form-inline" method="post" action="/myRecipes-Web/Ricette/cercaDaNome">
          <div class="input-group">
            <input type="text" class="form-control mt-2 mb-1" id="inlineFormInputGroup" placeholder="Cerca">
            <div class="input-group-append"><button class="btn btn-primary mt-2 mb-1" type="button"><i class="fa fa-search"></i></button></div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <!-- Intro -->
  <!-- Gallery -->
  <div class="border-primary py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="">
          <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"> </li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"> </li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"> </li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active"> <img class="d-block w-100 img-fluid mx-auto" src="/myRecipes-Web/Smarty/smarty-dir/templates/img/carbonara.jpg">
                <div class="carousel-caption">
                  <p>Primi piatti</p>
                  <h1>Carbonara</h1>
                </div>
              </div>
              <div class="carousel-item "> <img class="d-block img-fluid w-100" src="https://static.pingendo.com/cover-bubble-dark.svg">
                <div class="carousel-caption">
                  <h5 class="m-0">Carousel</h5>
                  <p>with indicators</p>
                </div>
              </div>
              <div class="carousel-item"> <img class="d-block img-fluid w-100" src="https://static.pingendo.com/cover-bubble-light.svg">
                <div class="carousel-caption">
                  <h5 class="m-0">Carousel</h5>
                  <p>with indicators</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4 p-3 border">
          <img src="foto usate/Finti-Piatti-tipici-italiani.png" class="d-block img-fluid w-100">
          <div class="card box-shadow">
            <div class="card-body bg-light text-dark">
              <p class="card-text">Carbonara</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-comments"></i>Comments</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-heart"></i>Love</button>
                </div> <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-3 border">
          <img src="foto usate/Finti-Piatti-tipici-italiani.png" class="d-block img-fluid w-100">
          <div class="card box-shadow">
            <div class="card-body bg-light">
              <p class="card-text text-dark">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-comments"></i>Comments</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-heart"></i>Love</button>
                </div> <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-3 border">
          <img src="foto usate/Finti-Piatti-tipici-italiani.png" class="d-block img-fluid w-100">
          <div class="card box-shadow">
            <div class="card-body bg-light">
              <p class="card-text text-dark">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-comments"></i>Comments</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-heart"></i>Love</button>
                </div> <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-3 border">
          <img src="foto usate/Finti-Piatti-tipici-italiani.png" class="d-block img-fluid w-100">
          <div class="card box-shadow">
            <div class="card-body bg-light">
              <p class="card-text bg-light text-dark">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-comments"></i>Comments</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-heart"></i>Love</button>
                </div> <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-3 border">
          <img src="foto usate/Finti-Piatti-tipici-italiani.png" class="d-block img-fluid w-100">
          <div class="card box-shadow">
            <div class="card-body bg-light">
              <p class="card-text bg-light text-dark">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-comments"></i>Comments</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-heart"></i>Love</button>
                </div> <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-3 border">
          <img src="foto usate/Finti-Piatti-tipici-italiani.png" class="d-block img-fluid w-100">
          <div class="card box-shadow">
            <div class="card-body bg-light">
              <p class="card-text bg-light text-dark">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-comments"></i>Comments</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-heart"></i>Love</button>
                </div> <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-3 border">
          <img src="foto usate/Finti-Piatti-tipici-italiani.png" class="d-block img-fluid w-100">
          <div class="card box-shadow">
            <div class="card-body bg-light text-dark">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-comments"></i>Comments</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-heart"></i>Love</button>
                </div> <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-3 border">
          <img src="foto usate/Finti-Piatti-tipici-italiani.png" class="d-block img-fluid w-100">
          <div class="card box-shadow">
            <div class="card-body bg-light text-dark">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-comments"></i>Comments</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-heart"></i>Love</button>
                </div> <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-3 border">
          <img src="foto usate/Finti-Piatti-tipici-italiani.png" class="d-block img-fluid w-100">
          <div class="card box-shadow">
            <div class="card-body bg-light text-dark">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-comments"></i>Comments</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-fw fa-heart"></i>Love</button>
                </div> <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html><?php }
}
