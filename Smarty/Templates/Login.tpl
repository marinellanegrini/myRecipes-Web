<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" style="">
  <link rel="stylesheet" href="css/wireframe.css">
</head>

<body style="	background-image: url(../img/carbonara.jpg);	background-position: top left;	background-size: cover;">
  <div class="text-center" style="">
    <div class="container">
      <div class="row mt-4">
        <div class="mx-auto offset-md-2 col-md-6" style=""><img class="img-fluid d-block w-50" src="../img/logobiancopieno.png "></div>
      </div>
      <div class="row" style="">
        <div class="bg-white mx-auto p-0 px-5 pt-4 pb-3 col-md-6 border-dark" style="	box-shadow: 0px 0px 10px  black;">
          <h1 class="mb-4 text-dark">Log in</h1>
          <form>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Enter email" id="form9" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="setCustomValidity('Il formato inserito è errato')" onchange="try{setCustomValidity('')}catch(e){}">
            </div>
            <div class="form-group mb-3">
              <input type="password" class="form-control" placeholder="Password" id="form10" pattern=".{6,}" oninvalid="setCustomValidity('Il formato inserito è errato')" onchange="try{setCustomValidity('')}catch(e){}">
              <small class="form-text text-muted text-right">
                <a href="#"> Recupera password</a>
              </small>
              <small class="text-muted form-text mt-2 text-left"><a href="#">Non sei ancora registrato? Clicca qui!</a></small></div><a href="#"> <button type="submit" class="btn btn-primary btn-lg">Accedi</button>
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html>