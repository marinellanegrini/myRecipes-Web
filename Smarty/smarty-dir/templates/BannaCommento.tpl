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
    <a href="/myRecipes-Web">Home</a>
    <a href="#news" class="active">Monitoraggio</a>
    <a href="#contact">Nuova ricetta</a>
    <a href="#contact">Nuovo ingrediente</a>
    <a href="/myRecipes-Web/Amministratore/Logout">Logout</a>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Ultimi commenti</h1>
        </div>
      </div>
      <form action="/myRecipes/Amministratore/Banna" method="post">
        {section name=commenti loop=$com}
          <div class="row">
            <div class="col-md-12">
              <div class="list-group">
                <div class="form-check">
                  <input class="form-check-input" align="center" name="commenti[]" type="checkbox" value="{$com[commenti]->getId()}" id="defaultCheck1">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{$com[commenti]->getIdUtente()}</h5>
                    <small class="text-muted">{$com[commenti]->getData()}</small>
                  </div>
                  <p class="mb-1">{$com[commenti]->getTesto()}</p>
                  <small class="text-muted">{$com[commenti]->getIdRicetta()}</small>
                </a>
                </div>
              </div>
            </div>
          </div>
        {/section}



        <button type="submit" class="btn btn-primary btn-lg mt-2 ml-3" style=""><b>Banna</b></button>
      </form>
    </div>
  </div>
  
</body>

</html>