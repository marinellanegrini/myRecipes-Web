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
    <a href="/myRecipes/web/">Home</a>
    <a href="/myRecipes/web/Amministratore/GestisciCommenti">Monitoraggio</a>
    <a href="/myRecipes/web/Amministratore/InserisciRicetta">Nuova ricetta</a>
    <a class="active">Nuovo ingrediente</a>
    <a href="/myRecipes/web/Amministratore/Logout">Logout</a>
  </div>
  <div class="py-5 text-center align-items-center d-flex" style="">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12 mx-auto h-50">
          <h1 class="display-3 mb-4">Vuoi inserire un nuovo ingrediente?</h1>
          <form action="/myRecipes/web/Amministratore/Cibo" method="post"  enctype="multipart/form-data" align="left" class="ml-3 pt-3">
            <div class="container">
              <div class="row"> Nome nuovo ingrediente: <input type="text" name="nome" class="ml-3">
              </div>
              <br>
              <div class="row"> Unità di misura: <input type="text" name="um" class="ml-2">
              </div>
              <br>
              <div class="row"> Foto relativa all'ingrediente: <input type="file"  name="imgcibo" class=" ml-3">
              </div>
              <div class="row pull-right">
                <button type="submit" class="btn btn-primary btn-lg mr-2 mt-2" align="" style=""><b>Inserisci</b></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>