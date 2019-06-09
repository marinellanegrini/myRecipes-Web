<?php
/* Smarty version 3.1.33, created on 2019-06-09 19:17:46
  from '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/ListaRicetteUtNonReg.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfd3f3adbe351_57398652',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a861db3a7913d9cb3b63a38490a33bc1eebba65' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/myRecipes-Web/Smarty/smarty-dir/templates/ListaRicetteUtNonReg.tpl',
      1 => 1560100666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfd3f3adbe351_57398652 (Smarty_Internal_Template $_smarty_tpl) {
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
          <a href="/myRecipes-Web">
          <img class="img-fluid d-block w-75" src="/myRecipes-Web/Smarty/smarty-dir/templates/img/logobiancopieno.png">
          </a>
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

        <a href="/myRecipes-Web/Ricette/RicercaAvanzata" class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a>
        <a href="/myRecipes-Web/Ricette/RicercaPerIngredienti" class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>

        <form class="form-inline" method="post" action="/myRecipes-Web/Ricette/cercaDaNome">
          <div class="input-group">
            <input type="text" class="form-control mt-2 mb-1" id="inlineFormInputGroup" placeholder="Cerca" name="nomericetta">
            <div class="input-group-append"><button type="submit" class="btn btn-primary mr-2 mb-1 mt-2"><i class="fa fa-search"></i></button></div>
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


        <?php
$__section_ricetta_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['ricette']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_ricetta_0_total = $__section_ricetta_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_ricetta'] = new Smarty_Variable(array());
if ($__section_ricetta_0_total !== 0) {
for ($__section_ricetta_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] = 0; $__section_ricetta_0_iteration <= $__section_ricetta_0_total; $__section_ricetta_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']++){
?>

          <div class="col-md-4 p-3 border">
            <img src="data:<?php echo $_smarty_tpl->tpl_vars['ricette']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getImmagine()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['ricette']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getImmagine()->getData();?>
" class="d-block img-fluid w-100">
            <div class="card box-shadow">
              <div class="card-body bg-light text-dark">
                <div class="col-md-15">
                  <a href="/myRecipes-Web/Ricette/Ricetta/<?php echo $_smarty_tpl->tpl_vars['ricette']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getId();?>
">
                    <h1 class="card-title text-dark"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getNome();?>
</h1>
                  </a>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" disabled class="btn btn-sm btn-outline-secondary text-primary"><i class="fa fa-fw fa-heart text-primary"></i><?php echo $_smarty_tpl->tpl_vars['ricette']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getNsalvataggi();?>
</button>
                  </div>
                  <div class="btn-group">
                    <button type="button" disabled class="btn btn-sm btn-outline-secondary text-primary"><i class="fa fa-clock-o text-primary"></i><?php echo $_smarty_tpl->tpl_vars['ricette']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ricetta']->value['index'] : null)]->getTprep();?>
</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php
}
}
?>

        <!--
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

        -->
      </div>
    </div>
  </div>
  
</body>

</html><?php }
}
