<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <title>Modifica Profilo</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes-Web/Smarty/smarty-dir/templates/css/wireframe.css">
</head>

<body class="bg-light" style="	background-image: linear-gradient(to bottom, rgba(196, 60, 0), rgba(255, 158, 64));	background-position: top left;	background-size: 100%;">
  <div class="py-2" style="">
    <div class="container">
      <div class="row mt-3">
        <div class="mx-auto col-md-10"><img class="img-fluid d-block w-25" src="/myRecipes-Web/Smarty/smarty-dir/templates/img/logobiancopieno.png"></div>
      </div>
      <div class="row">
        <div class="mx-auto col-10 bg-white bg-light p-3 col-md-10">
          <div class="p-4 col-md-10 mx-auto">
            <h3 class="text-dark display-4"><b>Modifica profilo</b></h3>
            <form id="c_form-h" class="">
              <div class="form-group row"> 
                <label for="inputmailh" class="col-2 col-form-label text-dark" style="">E-mail</label>
                <div class="col-10 col-md-9" style="">
                  <input type="email" 
                  class="form-control ml-2" 
                  id="inputmailh" 
                  placeholder="mail@example.com"
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                  oninvalid="setCustomValidity('Il formato inserito è errato')"
                  onchange="try{setCustomValidity('')}catch(e){}"> 
                </div> 
              </div>
            
              <div class="form-group row"> 
                <label for="inputpasswordh" class="col-2 col-form-label text-dark" style="">Password</label>
                <div class="col-10 col-md-9" style="">
                  <input type="password" 
                  class="form-control ml-2" 
                  id="inputpasswordh" 
                  placeholder="Password"
                  pattern=".{6,}" 
                  oninvalid="setCustomValidity('Il formato inserito è errato')"
                  onchange="try{setCustomValidity('')}catch(e){}"></div>
              </div>
              <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label text-dark" style="">Nome</label>
                <div class="col-10 col-md-9" style="">
                  <input type="text" 
                  class="form-control ml-2" 
                  id="inputpasswordh" 
                  placeholder="Nome"
                  pattern="([A-Za-z]{1,})" 
                  oninvalid="setCustomValidity('Inserire solo lettere minuscole o maiuscole')"
                  onchange="try{setCustomValidity('')}catch(e){}"> </div>
              </div>
              <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label text-dark" style="">Cognome</label>
                <div class="col-10 col-md-9" style="">
                  <input type="text" 
                  class="form-control ml-2" 
                  id="inputpasswordh" 
                  placeholder="Cognome"
                  pattern="([A-Za-z]{1,})" 
                  oninvalid="setCustomValidity('Inserire solo lettere minuscole o maiuscole')"
                  onchange="try{setCustomValidity('')}catch(e){}"> </div>
              </div>

              <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label text-dark" style="">Username</label>
                <div class="col-10 col-md-9" style="">
                  <input type="password" class="form-control ml-2" id="inputpasswordh" placeholder="Username"> </div>
              </div>

              <button type="submit" class="btn btn-primary mt-2">Modifica</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>