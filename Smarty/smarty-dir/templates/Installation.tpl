<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Installazione</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/myRecipes/Smarty/smarty-dir/templates/css/wireframe.css">
  <script language="JavaScript">
    function setcookie() {
      console.log("ciao");
      var d = new Date();
      d.setTime(d.getTime() + 3600);
      document.cookie = "javascript=true; expires="+d.toUTCString()+";";
    }
  </script>
</head>

<body style="">
<div class="alert">
  <p>{$errore}</p>
</div>
  <div class="py-5 text-center align-items-center d-flex" style="">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12 mx-auto">
          <h1 class="display-3 mb-4">Installazione</h1>
          <form action="/myRecipes/web/" align="left" method="post" enctype="multipart/form-data" class="ml-3 pt-3">
            <br>Nome del database: <input type="text" name="nomedb" class="ml-3 mt-2">
            <br> Nome utente: <input type="text" name="nomeutente" class="ml-3 mt-2">
            <br> Password: <input type="text" name="password" class="ml-3 mt-2">
            <br>
            <br>
            <button type="submit" style="" class="btn btn-primary btn-lg mr-2 mt-2" onclick="setcookie()"><b>Installa</b></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>