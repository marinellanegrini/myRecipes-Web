<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body style="">
  <div class="topnav">
    <a href="/myRecipes/web">Home</a>
    <a class="active">Monitoraggio</a>
    <a href="/myRecipes/web/Amministratore/InserisciRicetta">Nuova ricetta</a>
    <a href="/myRecipes/web/Amministratore/InserisciCibo">Nuovo ingrediente</a>
    <a href="/myRecipes/web/Amministratore/Logout">Logout</a>
  </div>

  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Ultimi commenti</h1>
        </div>
      </div>



      <form action="/myRecipes/web/Amministratore/Banna" method="post">


        {section name=commento loop=$commenti}
          {if $commenti[commento].commento->isBannato() eq false}
            <div class="form-check form-check-group pt-3 ">
              <input id="checkbox10" type="checkbox" aria-labelledby="checkbox10-help" name="commenti[]" value="{$commenti[commento].commento->getId()}">

              <label for="checkbox10" class="pl-2">{$commenti[commento].utente}</label>
              <span class="text-muted pull-right">
                    <small class="text-muted">{$commenti[commento].commento->getData()}  {$commenti[commento].commento->getOra()}</small>
                  </span>
              <small id="checkbox10-help" class="form-text pl-4">{$commenti[commento].commento->getTesto()}</small>

              <small class="text-muted pl-4">{$commenti[commento].ricetta}</small>
            </div>
          {/if}

        {/section}



          <div class="row">
            <div class="col-md-12 pt-2">
              <button type="submit" class="btn btn-primary btn-lg mt-2 ml-3" style=""><b>Banna</b></button>
            </div>
          </div>



      </form>
    </div>
  </div>
  
</body>

</html>