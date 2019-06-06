<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/wireframe.css">
  <script language="JavaScript"> function myFunction() {
        $("#nuovingredienti").append('<br/><div class="row"><div class="ml-5"><select><option value="uova">Uova</option></select></div><div class="ml-3"> Quantità: <input type="number" name="#" value="" style="width: 50px;"></div></div>');
    }
</script>
  <script language="JavaScript"> function nuovefoto() {
        $("#nuoveimmagini").append('<br/><input type="file" name="gallery[]" class="ml-5 py-2">');
    }
</script>
</head>

<body style="">
  <div class="topnav">
    <a href="#home">Home</a>
    <a href="#news">Monitoraggio</a>
    <a href="#contact" class="active">Nuova ricetta</a>
    <a href="#contact">Nuovo ingrediente</a>
    <a href="#contact">Logout</a>
  </div>
  <form action="/action_page.php" align="left" enctype="multipart/form-data" class="ml-3 pt-3" style=""> Nome ricetta:<br>
    <input type="text" name="#" value="" class="my-1 ml-5"><br>
    <br>Descrizione ricetta:<br>
    <textarea cols="100" rows="5" class="ml-5 my-1"></textarea>
    <br>Numero dosi:<br>
    <input type="number" name="#" value="" class="ml-5 mt-1 "><br>
    <br>Difficoltà: <br>
    <div class="py-2 ml-5 mt-1">
      <div class="form-check form-check-inline ">
        <input name="diff" type="radio" id="diff1" value="#" class="form-check-input">
        <label for="#" class="form-check-label">
          <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
      </div>
      <div class="form-check form-check-inline text-dark">
        <input name="diff" type="radio" id="diff2" value="#" class="form-check-input">
        <label for="#" class="form-check-label">
          <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
      </div>
      <div class="form-check form-check-inline text-dark">
        <input name="diff" type="radio" id="diff3" value="#" class="form-check-input">
        <label for="#" class="form-check-label">
          <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
      </div>
      <div class="form-check form-check-inline text-dark">
        <input name="diff" type="radio" id="diff4" value="#" class="form-check-input">
        <label for="#" class="form-check-label">
          <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle-o text-primary fa-lg" aria-hidden="true"></i></label>
      </div>
      <div class="form-check form-check-inline text-dark">
        <input name="diff" type="radio" id="diff5" value="#" class="form-check-input">
        <label for="#" class="form-check-label">
          <i class="fa fa-circle text-primary pl-1 fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i>
          <i class="fa fa-circle text-primary fa-lg" aria-hidden="true"></i></label>
      </div>
    </div> Categoria: <br>
    <div class="ml-5 py-2">
      <div class="form-check form-check-inline text-white">
        <input name="cat" type="radio" id="cat1" value="#" class="form-check-input">
        <label for="cat1" class="form-check-label">ANTIPASTI</label>
      </div>
      <div class="form-check form-check-inline text-white">
        <input name="cat" type="radio" id="cat2" value="#" class="form-check-input">
        <label for="cat2" class="form-check-label">PRIMI</label>
      </div>
      <div class="form-check form-check-inline text-white">
        <input name="cat" type="radio" id="cat3" value="#" class="form-check-input">
        <label for="cat3" class="form-check-label">SECONDI</label>
      </div>
      <div class="form-check form-check-inline text-white">
        <input name="cat" type="radio" id="cat4" value="#" class="form-check-input">
        <label for="cat4" class="form-check-label">CONTORNI</label>
      </div>
      <div class="form-check form-check-inline text-white">
        <input name="cat" type="radio" id="cat5" value="#" class="form-check-input">
        <label for="cat5" class="form-check-label">DOLCI</label>
      </div>
      <div class="form-check form-check-inline text-white">
        <input name="cat" type="radio" id="cat6" value="#" class="form-check-input">
        <label for="cat6" class="form-check-label">PIATTI UNICI </label>
      </div>
    </div> Tempo di preparazione <br>
    <div class="ml-5 py-2">
      <div class="form-check form-check-inline text-white">
        <input name="tprep" type="radio" id="tprep1" value="#" class="form-check-input">
        <label for="tprep1" class="form-check-label">10'</label>
      </div>
      <div class="form-check form-check-inline text-white">
        <input type="radio" id="tprep2" value="#" class="form-check-input" name="tprep">
        <label for="tprep2" class="form-check-label">20'</label>
      </div>
      <div class="form-check form-check-inline text-white">
        <input name="tprep" type="radio" id="tprep3" value="#" class="form-check-input">
        <label for="tprep3" class="form-check-label">30'</label>
      </div>
      <div class="form-check form-check-inline text-white">
        <input name="tprep" type="radio" id="tprep4" value="#" class="form-check-input">
        <label for="tprep4" class="form-check-label">40'</label>
      </div>
      <div class="form-check form-check-inline text-white">
        <input name="tprep" type="radio" id="tprep5" value="#" class="form-check-input">
        <label for="tprep5" class="form-check-label">50'</label>
      </div>
      <div class="form-check form-check-inline text-white">
        <input name="tprep" type="radio" id="tprep6" value="#" class="form-check-input">
        <label for="tprep6" class="form-check-label">60'</label>
      </div>
      <div class="form-check form-check-inline text-white">
        <input name="tprep" type="radio" id="tprep7" value="#" class="form-check-input">
        <label for="tprep7" class="form-check-label">60'+</label>
      </div>
    </div> Ingredienti:<br>
    <div class="container pull-left col-md-12 py-1 mt-1">
      <div class="row">
        <div class="ml-5">
          <select>
            <option value="uova">Uova</option>
          </select>
        </div>
        <div class="ml-3"> Quantità: <input type="number" name="#" value="" style="width: 50px;">
          <button class="btn bg-primary ml-5" type="button" onclick="myFunction()" style="	border-top-left-radius: 30px;	border-bottom-left-radius: 30px;	border-top-right-radius: 30px;	border-bottom-right-radius: 30px;">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <i class="fa fa-plus text-white" aria-hidden="true"></i>
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div id="nuovingredienti" style="" class="my-1"></div>
        </div>
      </div>
    </div> Inserisci foto principale:<br><br>
    <input type="file" id="files"  name="immprincipale" class="ml-5 py-2" style="">
    <label for="files">Click me to upload image</label>
    <br>
    <br>Inserisci le foto del procedimento: <br><br>
    <input type="file" name="gallery[]" class="ml-5">
    <button class="btn bg-primary" type="button" onclick="nuovefoto()" style="	border-top-left-radius: 30px;	border-bottom-left-radius: 30px;	border-top-right-radius: 30px;	border-bottom-right-radius: 30px;">
      <i class="fa fa-plus text-white" aria-hidden="true"></i>
    </button>
    <div class="row">
      <div class="col-md-12">
        <div id="nuoveimmagini" style="" class=""></div>
      </div>
    </div>
    <br>
    <div class="row pull-right ">
    <button type="submit" class="btn btn-primary btn-lg mb-3 mt-2 mr-5" style=""><b>Inserisci ricetta</b></button>
  </div>
  </form>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  
</body>

</html>