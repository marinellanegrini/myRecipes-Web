<!DOCTYPE html>
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
        <div class="col-md-10" style=""><img class="img-fluid d-block w-75" src="/myRecipes-Web/Smarty/smarty-dir/templates/img/logobiancopieno.png"></div>
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
              <a href="#" class="nav-link active text-white">Preferiti <i class="fa fa-heart-o fa-fw " aria-hidden="true"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-white" href="#" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">Account <i class="fa fa-user-o fa-fw" aria-hidden="true"></i></a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Modifica account</a>
                <a class="dropdown-item" href="#"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> Impostazioni</a>
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
        <a class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a><a class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>
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
          <div id="carousel1" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner">
              <div class="carousel-item active"> </div>
              <div class="carousel-item"> <img class="d-block w-100" src="https://static.pingendo.com/cover-bubble-light.svg"> </div>
              <div class="carousel-item"> <img class="d-block w-100" src="https://static.pingendo.com/cover-bubble-dark.svg"> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mt-3"><img class="img-fluid d-block rounded-circle w-75" src="../../../my Recipes templates/foto usate/blank-profile-picture-973460_960_720.png"></div>
        <div class="col-md-6 py-5 pl-5">
          <h1 class="text-dark">UserName</h1>
          <h2 class="text-dark">E-mail</h2>
          <h2 class="text-dark">Nome</h2>
          <h2 class="pb-4 text-dark">Cognome</h2><a class="btn btn-primary" href="#" style="">Modifica Profilo</a>
        </div>
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
            <li class="media py-2">
              <a href="#" class="pull-left">
                <img src="https://bootdey.com/img/Content/user_3.jpg" alt="" class="img-fluid d-block rounded-circle w-75">
              </a>
              <div class="media-body px-2 text-dark">
                <span class="text-muted pull-right">
                  <small class="text-muted" style="">data</small>
                  <br>
                  <small class="text-muted" style="">ora</small>
                </span><span class="text-muted pull-right"></span><span class="text-muted pull-right">
                </span>
                <p>Testo commento 1</p>
              </div><i class="fa fa-fw fa-trash text-dark fa-lg my-2" style=""></i>
            </li>
            <li class="media py-2">
              <a href="#" class="pull-left">
                <img src="https://bootdey.com/img/Content/user_3.jpg" alt="" class="img-fluid d-block rounded-circle w-75">
              </a>
              <div class="media-body px-2 text-dark">
                <span class="text-muted pull-right">
                  <small class="text-muted">data</small>
                  <br>
                  <small class="text-muted">ora</small>
                </span><span class="text-muted pull-right">
                </span>
                <p>Testo commento 2</p>
              </div><i class="fa fa-fw fa-trash text-dark fa-lg my-2" style=""></i>
            </li>
            <li class="media py-2">
              <a href="#" class="pull-left">
                <img src="https://bootdey.com/img/Content/user_3.jpg" alt="" class="img-fluid d-block rounded-circle w-75">
              </a>
              <div class="media-body px-2">
                <span class="text-muted pull-right">
                  <small class="text-muted">data</small>
                  <br>
                  <small class="text-muted">ora</small>
                </span>
                <p class="text-dark">Testo commento 3</p>
              </div> <i class="fa fa-fw fa-trash text-dark fa-lg my-2" style=""></i>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 20px;right:20px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:220px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;<img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16"></pingendo>
</body>

</html>