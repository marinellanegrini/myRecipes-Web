<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-secondary">
  <nav class="navbar navbar-expand-md navbar-primary bg-primary">
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
        <a class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-filter"></i>Filtri</a>
        <a href="/myRecipes-Web/Ricette/RicercaPerIngredienti"  class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>
        <form class="form-inline"  method="post" action="/myRecipes-Web/Ricette/cercaDaNome">
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
        <div class="bg-white col-12 py-3 pt-5 col-md-12 pb-3 mx-0 ">
        <h3 class="text-dark display-4 pl-5">Ricerca per filtri  <i class="fa fa-filter"></i></h3>
        <form method="post" action="/myRecipes-Web/Ricette/cercaAvanzata">
          <div class="row">
            <div class="col-md-12">
              <div class="row" style="">
                <div class="py-0 text-dark col-md-12">
                  <h5 class="text-dark mt-3 col-md-8 pl-4" style="">DIFFICOLTÁ </h5>
                </div>
              </div>
            </div>
          </div>
          <div class="row mx-auto px-4" style="">
            <div class="py-3 px-0 mx-auto">
              <div class="form-check form-check-inline ">
                <input name="diff" type="radio" id="diff1" value="1" class="form-check-input">
                <label for="#" class="form-check-label">
                  <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="diff" type="radio" id="diff2" value="2" class="form-check-input">
                <label for="#" class="form-check-label">
                  <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="diff" type="radio" id="diff3" value="3" class="form-check-input">
                <label for="#" class="form-check-label">
                  <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="diff" type="radio" id="diff4" value="4" class="form-check-input">
                <label for="#" class="form-check-label">
                  <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
                  <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="diff" type="radio" id="diff5" value="5" class="form-check-input">
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
                <h5 class="text-dark px-10 pl-3" style="" contenteditable="true">TEMPO DI PREPARAZIONE </h5>
              </div>
            </div>
          </div>
          <div class="row px-3">
            <div class="py-3 px-3 mx-auto">
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep1" value="10" class="form-check-input">
                <label for="tprep1" class="form-check-label">10'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input type="radio" id="tprep2" value="20" class="form-check-input" name="tprep">
                <label for="tprep2" class="form-check-label">20'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep3" value="30" class="form-check-input">
                <label for="tprep3" class="form-check-label">30'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep4" value="40" class="form-check-input">
                <label for="tprep4" class="form-check-label">40'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep5" value="50" class="form-check-input">
                <label for="tprep5" class="form-check-label">50'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep6" value="60" class="form-check-input">
                <label for="tprep6" class="form-check-label">60'</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="tprep" type="radio" id="tprep7" value="61" class="form-check-input">
                <label for="tprep7" class="form-check-label">60'+</label>
              </div>
            </div>
          </div>
          <div class="col-md-12" style="">
            <div class="row" style="">
              <div class="text-dark col-md-8">
                <h5 class="text-dark px-10 pl-3" style="">CATEGORIA </h5>
              </div>
            </div>
          </div>
          <div class="row px-3">
            <div class="py-3 px-3 mx-auto">
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat1" value="3" class="form-check-input">
                <label for="cat1" class="form-check-label">ANTIPASTI</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat2" value="1" class="form-check-input">
                <label for="cat2" class="form-check-label">PRIMI</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat3" value="2" class="form-check-input">
                <label for="cat3" class="form-check-label">SECONDI</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat4" value="4" class="form-check-input">
                <label for="cat4" class="form-check-label">CONTORNI</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat5" value="5" class="form-check-input">
                <label for="cat5" class="form-check-label">DOLCI</label>
              </div>
              <div class="form-check form-check-inline text-dark">
                <input name="cat" type="radio" id="cat6" value="6" class="form-check-input">
                <label for="cat6" class="form-check-label">PIATTI UNICI</label>
              </div>
              <div class="row pull-right">
                <button type="submit" class="btn btn-primary btn-lg mt-5 mr-5 " style=""><b>Cerca</b></button>
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