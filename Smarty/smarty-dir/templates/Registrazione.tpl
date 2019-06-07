<!DOCTYPE html>
<html lang="IT">

<head>
  <meta charset="utf-8">
  <title>Registrazione</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body style="	background-image: url(/myRecipes-Web/Smarty/smarty-dir/templates/img/bacon-cheese-burger.jpg);	background-size: 120% 100%;	background-position: top left;">

  <div class="alert">

  </div>

  <div class="">
    <div class="container">
      <div class="row">

        <div class="mx-auto col-md-6 pt-3"><img class="img-fluid d-block w-25" src="/myRecipes-Web/Smarty/smarty-dir/templates/img/logobiancopieno.png"></div>

      </div>
    </div>
  </div>
  <div class="text-center" style="">
    <div class="container">
      <div class="row ml-auto mr-auto bg-light w-50" style="	box-shadow: 0px 0px 10px  black;">
        <div class="mx-auto col-10 col-lg-10" style="">
          <h1 class="my-3 mt-3 text-dark">Registrazione</h1>
          <form class="text-left mb-4">
            <div class="form-group"> <label for="form16" class="text-dark">Nome</label> 
              <input type="text" 
              class="form-control w-100 px-1" 
              name="form16" 
              pattern="([A-Za-z]{1,})" 
              oninvalid="setCustomValidity('Inserire solo lettere minuscole o maiuscole')"
              onchange="try{setCustomValidity('')}catch(e){}"> 
            </div>

            <div class="form-group"> <label for="form17" class="text-dark">Cognome</label> 
              <input type="text" 
              class="form-control w-100 px-1" 
              name="form17" 
              pattern="([A-Za-z]{1,})" 
              oninvalid="setCustomValidity('Inserire solo lettere minuscole o maiuscole')"
              onchange="try{setCustomValidity('')}catch(e){}" >
            </div>

            <div class="form-group"> <label for="form18" class="text-dark">Email</label> 
              <input type="email" 
              class="form-control px-1" 
              name="form18"  
              pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
              oninvalid="setCustomValidity('Il formato inserito è errato')"
              onchange="try{setCustomValidity('')}catch(e){}">
            </div>

            <div class="form-group"> <label for="form17" class="text-dark">Username</label> 
              <input type="text" class="form-control px-1" id="form17"> </div>
            <div class="form-row">
              <div class="form-group col-md-6 mb-2"> <label for="form19" class="text-dark">Password</label>
               <input type="password" 
               class="form-control px-1" 
               id="form19" 
               placeholder="••" 
               pattern=".{6,}" 
               oninvalid="setCustomValidity('Il formato inserito è errato')"
               onchange="try{setCustomValidity('')}catch(e){}">
            </div>

              <div class="form-group col-md-6"> <label for="form20" class="text-dark">Conferma password</label> <input type="password" class="form-control" id="form20" placeholder="••••" pattern=".{6,}" > </div>
            </div>
            <button type="submit" class="btn btn-primary mx-auto mt-3 btn-lg px-3">Registrati</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>