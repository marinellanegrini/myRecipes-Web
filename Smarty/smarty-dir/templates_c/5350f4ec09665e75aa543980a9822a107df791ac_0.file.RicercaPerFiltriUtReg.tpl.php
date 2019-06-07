<?php
/* Smarty version 3.1.33, created on 2019-06-07 15:37:10
  from '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/RicercaPerFiltriUtReg.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfa6886b1dba4_87108455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5350f4ec09665e75aa543980a9822a107df791ac' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/RicercaPerFiltriUtReg.tpl',
      1 => 1559914579,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfa6886b1dba4_87108455 (Smarty_Internal_Template $_smarty_tpl) {
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
        <div class="col-md-12">
          <ul class="nav pull-right" style="">
            <li class="nav-item">
              <a href="/myRecipes-Web" class="nav-link active text-white">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-white" href="#">Preferiti <i class="fa fa-heart-o fa-fw " aria-hidden="true"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-white" href="#" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">Account <i class="fa fa-user-o fa-fw" aria-hidden="true"></i></a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Modifica account</a>
                
                <a class="dropdown-item" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
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
        <a href="/" class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a><a class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>
        <form class="form-inline"  method="post" action="/myRecipes-Web/Ricette/cercaDaNome">
          <div class="input-group">
            <input type="text" class="form-control ml-1 mt-2 mb-1" id="inlineFormInputGroup" placeholder="Cerca">
            <div class="input-group-append"><button type="submit" class="btn btn-primary mr-2 mb-1 mt-2"><i class="fa fa-search"></i></button></div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="bg-white col-12 py-4 pl-4 col-md-12 my-0 mx-0 mt-1" style="">
        <h3 class="text-dark display-4 pl-3">Ricerca per filtri  <i class="fa fa-filter"></i></h3>
        <form method="post" action="/myRecipes-Web/Ricette/cercaAvanzata">
          <div class="row">
            <div class="col-md-12">
              <div class="row" style="">
                <div class="py-0 text-dark col-md-12">
                  <h5 class="text-dark mt-3 col-md-8" style="">DIFFICOLTÁ </h5>
                </div>
              </div>
            </div>
          </div>
          <div class="row mx-auto px-4" style="">
            <div class="py-3 px-0 mx-auto">
              <div class="form-check form-check-inline ">
                <input name="diff" type="radio" id="diff1" value="#" class="form-check-input">
                <label for="#" class="form-check-label">
                  <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="diff" type="radio" id="diff2" value="#" class="form-check-input">
                <label for="#" class="form-check-label">
                  <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="diff" type="radio" id="diff3" value="#" class="form-check-input">
                <label for="#" class="form-check-label">
                  <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="diff" type="radio" id="diff4" value="#" class="form-check-input">
                <label for="#" class="form-check-label">
                  <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="diff" type="radio" id="diff5" value="#" class="form-check-input">
                <label for="#" class="form-check-label">
                  <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i></label>
              </div>
            </div>
          </div>
          <div class="col-md-12" style="">
            <div class="row" style="">
              <div class="py-0 text-dark col-md-8">
                <h5 class="text-dark px-10" style="" contenteditable="true">TEMPO DI PREPARAZIONE </h5>
              </div>
            </div>
          </div>
          <div class="row px-3">
            <div class="py-3 px-3 mx-auto">
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep1" value="#" class="form-check-input">
                <label for="tprep1" class="form-check-label">10'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input type="radio" id="tprep2" value="#" class="form-check-input" name="tprep">
                <label for="tprep2" class="form-check-label">20'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep3" value="#" class="form-check-input">
                <label for="tprep3" class="form-check-label">30'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep4" value="#" class="form-check-input">
                <label for="tprep4" class="form-check-label">40'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep5" value="#" class="form-check-input">
                <label for="tprep5" class="form-check-label">50'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep6" value="#" class="form-check-input">
                <label for="tprep6" class="form-check-label">60'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep7" value="#" class="form-check-input">
                <label for="tprep7" class="form-check-label">60'+</label>
              </div>
            </div>
          </div>
          <div class="col-md-12" style="">
            <div class="row" style="">
              <div class="text-dark col-md-8">
                <h5 class="text-dark px-10" style="">CATEGORIA </h5>
              </div>
            </div>
          </div>
          <div class="row px-3">
            <div class="py-3 px-3 mx-auto">
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat1" value="#" class="form-check-input">
                <label for="cat1" class="form-check-label">ANTIPASTI</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat2" value="#" class="form-check-input">
                <label for="cat2" class="form-check-label">PRIMI</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat3" value="#" class="form-check-input">
                <label for="cat3" class="form-check-label">SECONDI</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat4" value="#" class="form-check-input">
                <label for="cat4" class="form-check-label">CONTORNI</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat5" value="#" class="form-check-input">
                <label for="cat5" class="form-check-label">DOLCI</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat6" value="#" class="form-check-input">
                <label for="cat6" class="form-check-label">PIATTI UNICI</label>
              </div>
              <button type="submit" class="btn btn-primary btn-lg mr-2 mt-2" style=" position: absolute; right: 0;"><b>Inizia ricerca</b></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html><?php }
}
