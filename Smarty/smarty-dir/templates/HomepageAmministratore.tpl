<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body style="">
  <div class="topnav">
    <a href="/myRecipes-Web" class="active">Home</a>

    <a href="/myRecipes-Web/Amministratore/GestisciCommenti">Monitoraggio</a>
    <a href="/myRecipes-Web/Amministratore/InserisciRicetta">Nuova ricetta</a>
    <a href="/myRecipes-Web/Amministratore/InserisciCibo">Nuovo ingrediente</a>
    <a href="#contact">Logout</a>

  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Ultimi commenti</h1>
        </div>
      </div>
      {section name=commenti loop=$com}
      <div class="row">
        <div class="col-md-12">

          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{$com[commenti]->getIdUtente()}</h5>
                <small class="text-muted">{$com[commenti]->getData()}</small>
              </div>
              <p class="mb-1">{$com[commenti]->getTesto()}</p> <small class="text-muted">{$com[commenti]->getIdRicetta()}</small>
            </a>
          </div>
        </div>
      </div>
      {/section}
      <div class="row">
        <div class="col-md-12"><a class="btn btn-primary mt-1" href="/myRecipes-Web/Amministratore/GestisciCommenti">Vedi altri</a></div>
      </div>
    </div>

  </div>
  <div class="py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card text-dark bg-primary mb-3" style="	height: 150px;">
            <div class="card-header" align="center"><i class="fa fa-eye fa-lg" aria-hidden="true"></i><strong><b> Visite settimanali </b></strong></div>
            <div class="card-body" style="	border-top-left-radius: 10px;	border-top-right-radius: 10px;	border-bottom-left-radius: 10px;	border-bottom-right-radius: 10px;">
              <h3 class="display-4 text-dark" align="center">5</h3>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-dark bg-secondary mb-3" style="	height: 150px;">
            <div class="card-header" align="center"><i class="fa fa-floppy-o" aria-hidden="true"></i><strong><b> Ricette salvate</b></strong></div>
            <div class="card-body">
              <h3 class="display-4 text-dark" align="center">5</h3>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-dark bg-info mb-3" style="	height: 150px;">
            <div class="card-header" align="center"><i class="fa fa-user fa-fw"></i><strong><b> Utenti Registrati</b> </strong></div>
            <div class="card-body">
              <h3 class="display-4 text-dark" align="center">5</h3>
            </div>
          </div>
        </div>
        <div class="col-md-3" style="">
          <div class="card text-dark bg-white mb-3" style="	height: 150px;">
            <div class="card-header" align="center"><i class="fa fa-book" aria-hidden="true"></i><strong><b> Ricette più visitate</b></strong></div>
            <div class="card-body">
              <h3 class="display-4 text-dark" align="center">5</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html>