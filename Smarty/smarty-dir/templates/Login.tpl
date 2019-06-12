<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" style="">
  <link rel="stylesheet" href="/myRecipes/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body style="	background-image: url(/myRecipes/Smarty/smarty-dir/templates/img/carbonara.jpg);	background-position: top left;	background-size: cover;">

<div class="alert">
  <p>{$errore}</p>
</div>

  <div class="text-center" style="">
    <div class="container">
      <div class="row mt-4">
        <div class="mx-auto offset-md-2 col-md-6" style=""><img class="img-fluid d-block w-50" src="/myRecipes/Smarty/smarty-dir/templates/img/logobiancopieno.png"></div>
      </div>
      <div class="row" style="">
        <div class="bg-white mx-auto p-0 px-5 pt-4 pb-3 col-md-6 border-dark" style="	box-shadow: 0px 0px 10px  black;">
          <h1 class="mb-4 text-dark">Log in</h1>
          <form method="post" {if $ruolo eq "utente"}
            action="/myRecipes/web/Utente/Login"
                  {else} action="/myRecipes/web/Amministratore/Login"
                  {/if}>
            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Username" id="form9">
            </div>
            <div class="form-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password" id="form10">
              <small class="form-text text-muted text-right">
                <a href="#"> Recupera password</a>
              </small>
              {if $ruolo eq "utente"}
                <small class="text-muted form-text mt-2 text-left">
                  <a href="/myRecipes/web/Utente/Registrazione">Non sei ancora registrato? Clicca qui!</a>
                </small>
              {/if}
            </div>
             <div> <button type="submit" class="btn btn-primary btn-lg">Accedi</button>
             </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html>