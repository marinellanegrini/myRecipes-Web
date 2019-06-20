<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <title>{$ricetta->getNome()}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-light" style="">
  <nav class="navbar navbar-expand-md navbar-primary bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-10 bg-primary" style="">
          <a href="/myRecipes/web">
          <img class="img-fluid d-block w-75" src="/myRecipes/Smarty/smarty-dir/templates/img/logobiancopieno.png">
          </a>
        </div>
      </div>
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10" style="">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="topnav1 pull-right">
          <a href="/myRecipes/web">Home</a>
          <a href="/myRecipes/web/Utente/Login">Login</a>
          <a href="/myRecipes/web/Amministratore/Login">Login amministratore</a>
          <a href="/myRecipes/web/Utente/Registrazione">Registrazione</a>
          <a href="/myRecipes/utility/MeetTheThemeUtNonReg.html">Chi siamo</a>
        </div>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-md navbar-dark border-info bg-secondary p-0" style="">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar12">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar12">
        <a href="/myRecipes/web/Ricette/RicercaAvanzata" class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a>
        <a href="/myRecipes/web/Ricette/RicercaPerIngredienti"  class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>
        <form class="form-inline"  method="post" action="/myRecipes/web/Ricette/cercaDaNome">
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
          <h1 class="display-4 text-dark"><strong><b>{$ricetta->getNome()}</b></strong><a class="btn btn-outline-light" href="/myRecipes/web/Ricette/AggiungiaiPreferiti/{$ricetta->getId()}"><i class="fa fa-fw fa-heart text-primary my-2 fa-heart-o fa-4x pull-right" style=""></i></a></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-7"><img class="img-fluid d-block w-100 h-100" src="data:{$ricetta->getImmagine()->getType()};base64,{$ricetta->getImmagine()->getData()}" style="width: 600px;	height: 400px;"></div>
        <div class="col-md-5">
          <div class="p-4 col-lg-12 text-dark" style="">
            <ul class="">
              <li><i class="fa fa-fire" aria-hidden="true"></i> Difficoltà:
                {if $ricetta->getDifficolta() eq 1}
                  <label class="form-check-label">
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle-o text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle-o text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle-o text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle-o text-dark" aria-hidden="true"></i>
                  </label>
                {elseif $ricetta->getDifficolta() eq 2}
                  <label class="form-check-label">
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle-o text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle-o text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle-o text-dark" aria-hidden="true"></i>
                  </label>
                {elseif $ricetta->getDifficolta() eq 3}
                  <label class="form-check-label">
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle-o text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle-o text-dark" aria-hidden="true"></i>
                  </label>
                {elseif $ricetta->getDifficolta() eq 4}
                  <label class="form-check-label">
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle-o text-dark" aria-hidden="true"></i>
                  </label>
                {else}
                  <label class="form-check-label">
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                    <i class="fa fa-circle text-dark" aria-hidden="true"></i>
                  </label>
                {/if}
              </li>
              <li><i class="fa fa-clock-o" aria-hidden="true"></i> Preparazione: {$ricetta->getTprep()}</li>
              <li><i class="fa fa-cutlery" aria-hidden="true"></i> Numero dosi: {$ricetta->getNdosi()}</li>
              <li><i class="fa fa-list-ol" aria-hidden="true"></i> Categoria: {$ricetta->getCategoria()->getNome()}</li>
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

            <div style="width:100%; height:140px; overflow-y: auto;">

          <p class="text-dark">{$ricetta->getProcedimento()}</p>
            </div>

            </div>
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
          {$gallery=$ricetta->getImgpreparazione()}
          {section name=foto loop=$gallery}
          <div class="col-lg-4 p-3 col-md-2">
            <img class="img-fluid d-block" src="data:{$gallery[foto]->getType()};base64,{$gallery[foto]->getData()}" style="width: 300px;	height: 200px;">
          </div>
          {/section}
        </div>
      </div>
    </div>
  </div>
  <div class="pt-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-dark">
          <h3 class="text-dark">Commenti:</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-body text-dark">
            <br>
            <ul class="media-list">
              <div align="center">
                {$errore}
              </div>

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
          <h3 class="py-2 text-dark">Inserisci commento:</h3>
          <form method="post" action="/myRecipes/web/Ricette/Commento/{$ricetta->getId()}">
            <div class="form-group"> <textarea class="form-control" id="form30" rows="3" placeholder="Scrivi qui.. "></textarea> </div> <button type="submit" class="btn btn-primary my-2">Invia</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>