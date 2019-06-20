<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <title>myRecipes</title>
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-light" style="">
  <!-- Navbar -->
  <!-- Cover -->
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
        <div class="col-md-12">
          <ul class="nav pull-right" style="">

            <li class="nav-item">
              <a href="/myRecipes/web" class="nav-link active text-white">Home<i class="fa fa-home fa-fw fa-lg " aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">

              <a class="nav-link active text-white" href="/myRecipes/utility/MeetTheThemeUtReg.html">Chi siamo <i class="fa fa-creative-commons" aria-hidden="true"></i></a>

            </li>
            <li class="nav-item">

              <a class="nav-link active text-white" href="/myRecipes/web/Ricette/Preferiti">Preferiti <i class="fa fa-heart-o fa-fw " aria-hidden="true"></i></a>

            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link text-white" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">Profilo <i class="fa fa-user-o fa-fw" aria-hidden="true">
                </i>
              </a>
              <div class="dropdown-menu">

                <a class="dropdown-item" href="/myRecipes/web/Utente/Profilo"><i class="fa fa-user-o fa-fw" aria-hidden="true"></i>Profilo</a>
                <a class="dropdown-item" href="/myRecipes/web/Utente/ModificaProfilo"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Modifica profilo</a>

                <a class="dropdown-item" href="/myRecipes/web/Utente/Logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

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
        <a href="/myRecipes/web/Ricette/RicercaAvanzata" class="btn btn-default navbar-btn text-white">
          <i class="fa fa-fw fa-filter"></i>Filtri</a>
        <a href="/myRecipes/web/Ricette/RicercaPerIngredienti" class="btn btn-default navbar-btn text-white"><i class="fa fa-fw fa-cutlery"></i>Ingredienti</a>
        <form class="form-inline"  method="post" action="/myRecipes/web/Ricette/cercaDaNome">
          <div class="input-group">
            <input type="text" class="form-control mt-2 mb-1" id="inlineFormInputGroup" placeholder="Cerca" name="nomericetta" >
            <div class="input-group-append"><button type="submit" class="btn btn-primary mr-2 mb-1 mt-2"><i class="fa fa-search"></i></button></div>
          </div>
        </form>
      </div>
    </div>
  </nav>

  <div class="border-primary py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="">
          <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-2" data-slide-to="1"></li>
              <li data-target="#carousel-example-2" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <a href="/myRecipes/web/Ricette/Ricetta/4">
                  <div class="view">
                    <img class="d-block w-100" src='/myRecipes/Smarty/smarty-dir/templates/img/carbonara.jpg' alt="First slide" >
                    <div class="mask rgba-black-light"></div>
                  </div>
                  <div class="carousel-caption">
                    <h5 class="h5-responsive">Primi piatti</h5>
                    <h1>Carbonara</h1>
                  </div>
                </a>

              </div>

              {section name=princ loop=$princimm}

                <div class="carousel-item">
                  <!--Mask color-->
                  <a href="/myRecipes/web/Ricette/Ricetta/{$princimm[princ]->getId()}">
                    <div class="view">
                      <img class="d-block w-100" src="data:{$princimm[princ]->getImmagine()->getType()};base64,{$princimm[princ]->getImmagine()->getData()}"
                           alt="Second slide" >
                      <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption">
                      <h5 class="h5-responsive">{$princimm[princ]->getCategoria()->getNome()}</h5>
                      <h1>{$princimm[princ]->getNome()}</h1>
                    </div>
                  </a>
                </div>
              {/section}
            </div>
            <!--/.Slides-->
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
          </div>
          <!--/.Carousel Wrapper-->
        </div>
      </div>
    </div>
  </div>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row">

        {section name=ricetta loop=$ricette}

          <div class="col-md-4 p-3 border">
            <img src="data:{$ricette[ricetta]->getImmagine()->getType()};base64,{$ricette[ricetta]->getImmagine()->getData()}" class="d-block img-fluid w-100" style="width: 300px;	height: 200px;">
            <div class="card box-shadow">
              <div class="card-body bg-light text-dark">
                <div class="col-md-15">
                  <a href="/myRecipes/web/Ricette/Ricetta/{$ricette[ricetta]->getId()}">
                    <h1 class="card-title text-dark">{$ricette[ricetta]->getNome()}</h1>
                  </a>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" disabled class="btn btn-sm btn-outline-secondary text-primary"><i class="fa fa-fw fa-heart text-primary"></i> {$ricette[ricetta]->getNsalvataggi()}</button>
                  </div>
                  <div class="btn-group">
                    <button type="button" disabled class="btn btn-sm btn-outline-secondary text-primary"><i class="fa fa-clock-o text-primary"></i> {$ricette[ricetta]->getTprep()}</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        {/section}

      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" crossorigin="anonymous" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" style=""></script>

</body>

</html>