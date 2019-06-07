<!DOCTYPE html>
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
        <div class="topnav1 pull-right">
          <a href="/myRecipes-Web">Home</a>
          <a href="/myRecipes-Web/Utente/Login">Login</a>
          <a href="/myRecipes-Web/Amministratore/Login">Login Amministratore</a>
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
        <a href="#" class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a><a class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>
        <form class="form-inline"  method="post" action="/myRecipes-Web/Ricette/cercaDaNome">
          <div class="input-group">
            <input type="text" class="form-control ml-1 mt-2 mb-1" id="inlineFormInputGroup" placeholder="Cerca">
            <div class="input-group-append my-0 mb-0"><button class="btn btn-primary pb-0 mt-2 mb-1" type="button"><i class="fa fa-search pb-1"></i></button></div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="bg-white col-12 py-4 pl-4 col-md-12 my-0 mx-0 mt-1">
          <h3 class="display-4 text-dark pl-3" align=""><b>Ricerca per ingredienti </b><i class="fa fa-cutlery"></i></h3>
          <form action="#">
            <div class="form-check text-dark ml-5">
              <div class="container">
                {section name=cibo loop=$cibi}

                <div class="row">
                  <div class="mt-2" style="">
                    <input class="form-check-input" type="checkbox" name="cibi[]" value="{$cibi[cibo]->getId()}" id="defaultCheck1">
                    <img class="img-fluid d-block" src="data:,{$cibi[cibo]->getImmagine()->getType()},;base64,{$cibi[cibo]->getImmagine()->getData()}" style="	width: 70px;	height: 50px;"></div>
                  <div class="col-md-4 mt-2" style="">{$cibi[cibo]->getNome()} </div>
                </div>
                {/section}
                <div class="row pull-right">
                  <button type="submit" class="btn btn-primary btn-lg mb-3 mt-2 mr-5 " style=""><b>Cerca</b></button>
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