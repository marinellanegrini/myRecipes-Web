<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-secondary" >
  <nav class="navbar navbar-expand-md navbar-primary bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-10 bg-primary" style="">
          <a href="/myRecipes/web">
          <img class="img-fluid d-block w-75" src="/myRecipes/Smarty/smarty-dir/templates/img/logobiancopieno.png">
          </a>
        </div>
      </div>
      <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10" style="">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="topnav1 pull-right">
          <a href="/myRecipes/web">Home</a>
          <a href="/myRecipes/web/Utente/Login">Login</a>
          <a href="/myRecipes/web/Amministratore/Login">Login Amministratore</a>
          <a href="/myRecipes/web/Utente/Registrazione">Registrazione</a>
        </div>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-md navbar-dark border-info bg-secondary p-0" style="">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar12">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar12">
        <a href="/myRecipes/web/Ricette/RicercaAvanzata"  class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a>
        <a class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>
        <form class="form-inline"  method="post" action="/myRecipes/web/Ricette/cercaDaNome">
          <div class="input-group">
            <input type="text" class="form-control ml-1 mt-2 mb-1" id="inlineFormInputGroup" placeholder="Cerca" name="nomericetta">
            <div class="input-group-append"><button type="submit" class="btn btn-primary mr-2 mb-1 mt-2"><i class="fa fa-search"></i></button></div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <div class="py-1">
    <div class="container" style="box-shadow: 0px 0px 4px  black;">
      <div class="row">
        <div class="bg-white col-12 py-5 pl-4 col-md-12  mx-0 ">
          <h3 class="display-4 text-dark pl-3" align=""><b>Ricerca per ingredienti </b><i class="fa fa-cutlery"></i></h3>
          <form method="post" action="/myRecipes/web/Ricette/cercaPerIngredienti">
            <div class="form-check text-dark ml-5">
              <div class="container">
                {section name=cibo loop=$cibi}

                <div class="row">
                  <div class="mt-2" style="">
                    <input class="form-check-input" type="checkbox" name="cibi[]" value="{$cibi[cibo]->getId()}" id="defaultCheck1">
                    <img class="img-fluid d-block" src="data:{$cibi[cibo]->getImmagine()->getType()};base64,{$cibi[cibo]->getImmagine()->getData()}" style="	width: 70px;	height: 50px;"></div>
                  <div class="col-md-4 mt-2" style="">{$cibi[cibo]->getNome()} </div>
                </div>
                {/section}

                <div class="row pull-right">
                  <button type="submit" class="btn btn-primary btn-lg mt-3 mr-5 " style=""><b>Cerca</b></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>