<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <title>Dettaglio Ricetta</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-light" style="">
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
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-4 text-dark"><strong><b>{$ricetta->getNome()}</b></strong><a class="btn btn-outline-light" href="/myRecipes-Web/Ricette/AggiungiaiPreferiti/{$ricetta->getId()}"><i class="fa fa-fw fa-heart text-dark my-2 fa-heart-o fa-4x pull-right" style=""></i></a></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-8"><img class="img-fluid d-block w-100 h-100" src="data:{$ricetta->getImmagine()->getType()};base64,{$ricetta->getImmagine()->getData()}" style=""></div>
        <div class="col-md-4">
          <div class="p-4 col-lg-12 text-dark" style="">
            <ul class="">
              <li>Difficoltà: {$ricetta->getDifficolta()}</li>
              <li>Tempo di preparazione: {$ricetta->getTprep()}</li>
              <li>Numero dosi: {$ricetta->getNdosi()}</li>
              <li>Categoria: {$ricetta->getCategoria()->getNome()}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="p-4 col-lg-12 text-dark">
          <h4 class="mb-3 text-dark"><strong><b>Ingredienti</b></strong></h4>
          <ul class="">
            {$ingredienti=$ricetta->getIngredienti()}
            {section name=ingrediente loop=$ingredienti}
              <li class="my-1">{$ingredienti[ingrediente]->getQta()} {$ingredienti[ingrediente]->getCibo()->getUm()} {$ingredienti[ingrediente]->getCibo()->getNome()} </li>
            {/section}
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="p-md-4 col-lg-12">
          <h4 class="mb-3 text-dark"><b>Preparazione</b></h4>
          <div class="carousel slide" data-ride="carousel">
            <div class="carousel-inner bg-light" role="listbox">
              <div class="carousel-item p-5">
                <div class="blockquote text-muted mb-0 px-">
                  <p class="mb-0">#2 Blockquoute - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  <div class="blockquote-footer">Someone famous in My memories</div>
                </div>
              </div>
              <div class="carousel-item p-5">
                <div class="blockquote text-muted mb-0 px-">
                  <p class="mb-0">#3 Blockquoute - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  <div class="blockquote-footer">Someone famous in My memories</div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
          </div>
          <p class="text-dark">{$ricetta->getProcedimento()}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="text-center mx-auto col-md-8">
          <h1 class="mb-3 text-dark">Galleria immagini</h1>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 p-3 col-md-2"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-3.svg"> </div>
          <div class="col-lg-4 p-3 col-md-2"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-3.svg"> </div>
          <div class="col-lg-4 p-3 col-md-2"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-3.svg"></div>
        </div>
        <div class="row">
          <div class="col-lg-4 p-3 col-md-2"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-3.svg"> </div>
          <div class="col-lg-4 p-3 col-md-2"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-3.svg"> </div>
          <div class="col-lg-4 p-3 col-md-2"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-3.svg"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-dark">
          <h3 class="text-dark">Comments:</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-body text-dark">
            <br>
            <ul class="media-list">


              {section name=commento loop=$commenti}
              <li class="media py-2">
                <a href=class="pull-left">
                  <img src="data:{$commenti[commento].img->getType()};base64,{$commenti[commento].img->getData()}" alt="" class="cerchio">
                </a>
                <div class="media-body px-2">
                  <span class="text-muted pull-right">
                    <small class="text-muted">{$commenti[commento].commento->getData()} <br> {$commenti[commento].commento->getOra()}</small>
                  </span>
                  <strong class="text-secondary">{$commenti[commento].utente}</strong>
                  <p> {$commenti[commento].commento->getTesto()}  </p>
                </div>
              </li>
              {/section}

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="py-2 text-dark">Insert comment:</h3>
          <form method="post" action="/myRecipes-Web/Ricette/Commento/{$ricetta->getId()}">
            <div class="form-group"> <textarea class="form-control" id="form30" rows="3" placeholder="Your message"></textarea> </div> <button type="submit" class="btn btn-primary my-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>