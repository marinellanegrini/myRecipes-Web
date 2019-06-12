<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <div class="py-5 text-center align-items-center d-flex" style="">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12 mx-auto">
          <h1 class="display-3 mb-4">Vuoi applicare dei filtri?</h1>
          <form action="/myRecipes/web/Amministratore/Commenti" align="left" method="post" class="ml-3 pt-3">
            Parola da ricercare nei commenti:
            <input type="text" name="parola" class="ml-3">
            <br>Numero commenti: <input type="text" name="last" class="ml-3 mt-2">
            <br>
            <button type="submit" class="btn btn-primary btn-lg mr-2 mt-2" style=""><b>Applica filtri</b></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html>