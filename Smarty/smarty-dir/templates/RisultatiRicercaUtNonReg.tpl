<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-light" style="">
  <nav class="navbar navbar-expand-md bg-primary navbar-primary ">
    <div class="container">
      <div class="row">
        <div class="col-md-10 bg-primary" style="">
            <a href="/myRecipes-Web">
          <img class="img-fluid d-block w-75" src="/myRecipes-Web/Smarty/smarty-dir/templates/img/logobiancopieno.png">
            </a>
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
        <a  href="/myRecipes-Web/Ricette/RicercaAvanzata" class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a>
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
    <div class="alert text-dark " align="center" >
      {$msg}
    </div>
      <div class="">
    {section name=ricetta loop=$risultati}
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row border mb-3" style="">
              <div class="col-md-6 col-lg-3 order-2 order-md-1 p-0" style="">
                <img class="img-fluid d-block" src="data:{$risultati[ricetta]->getImmagine()->getType()};base64,{$risultati[ricetta]->getImmagine()->getData()}" style="width: 270px;	height: 160px;">
              </div>
              <div class="d-flex flex-column justify-content-center col-md-8 offset-lg-1 align-items-start order-1 order-md-2 p-2 border-0" style="">
                <div class="row w-100">
                  <div class="col-md-12"><a class="btn pull-right ml-1 text-primary"><i class="fa fa-heart-o" aria-hidden="true"></i> {$risultati[ricetta]->getNsalvataggi()}</a>
                    </div>
                </div>
                <h6 class="text-dark">{$risultati[ricetta]->getCategoria()->getNome()}</h6>
                <h1 class="text-dark">{$risultati[ricetta]->getNome()}</h1>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12 my-0">
                        <a class="btn mr-1" >
                          {if $risultati[ricetta]->getDifficolta() eq 1}
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                          {elseif $risultati[ricetta]->getDifficolta() eq 2}
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                          {elseif $risultati[ricetta]->getDifficolta() eq 3}
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                          {elseif $risultati[ricetta]->getDifficolta() eq 4}
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                          {else}
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                            <i class="fa fa-circle-o text-primary" aria-hidden="true"></i>
                          {/if}
                          </a>
                        <a class="btn btn-sm text-primary">
                          <i class="fa fa-clock-o fa-lg text-primary" aria-hidden="true"></i> {$risultati[ricetta]->getTprep()}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    {/section}

  </div>

 
</body>

</html>