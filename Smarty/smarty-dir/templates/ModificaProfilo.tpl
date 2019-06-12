<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-light" style="	background-image: linear-gradient(to bottom, rgba(196, 60, 0), rgba(255, 158, 64));	background-position: top left;	background-size: 100%;	background-repeat: repeat;">

<div class="alert">
  <p>{$errore}</p>
</div>

<div class="">
  <div class="container">
    <div class="row">

      <div class="mx-auto col-md-6 pt-2"><img class="img-fluid d-block w-25" src="/myRecipes/Smarty/smarty-dir/templates/img/logobiancopieno.png"></div>

    </div>
  </div>
</div>


<div class="py-0" style="" >
  <div class="container">
    <div class="row">
      <div class="mx-auto col-md-12 col-10 bg-white p-5 bg-light" style="">
        <div class="mx-auto col-lg-12 col-10">
          <h1 class="text-dark" align="center">Modifica Profilo</h1>
          <form class="text-left" method="post" enctype="multipart/form-data" action="/myRecipes/web/Utente/ModificaProfilo">
            <div class="form-group"> <label for="form16" class="text-dark">Username</label> <input type="text" name="username" value="{$utente->getUsername()}" class="form-control" id="form16" placeholder=""> </div>
            <div class="form-group"> <label for="form16" class="text-dark">Nome</label> <input type="text" name="nome" value="{$utente->getNome()}" class="form-control" id="form16" placeholder=""> </div>
            <div class="form-group"> <label for="form16" class="text-dark">Cognome</label> <input type="text" name="cognome" value="{$utente->getCognome()}" class="form-control" id="form16" placeholder=""> </div>
            <div class="form-group"> <label for="form18" class="text-dark">Email</label> <input type="email" name="mail" value="{$utente->getEmail()}" class="form-control" id="form18" placeholder=""> </div>
            <div class="form-row">
              <div class="form-group col-md-6"> <label for="form19" class="text-dark">Password</label> <input type="password" name="password" value="{$utente->getPassword()}" class="form-control" id="form19" placeholder="••••"> </div>
              <div class="form-group col-md-6"> <label for="form20" class="text-dark">Confirm Password</label> <input type="password" name="confpass" value="{$utente->getPassword()}" class="form-control" id="form20" placeholder="••••"> </div>
            </div>
            <br>
            <div class="row"><label class="text-dark">Inserire foto profilo:  </label><input class="text-dark" type="file" name="immagine" class=" ml-3"></div>

            <button type="submit" class="btn btn-primary mt-4">Modifica</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" style=""></script>
</body>

</html>