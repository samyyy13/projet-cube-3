<?php include "dbConfig.php";

  $msg = "";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST["name"];
      $password = md5($_POST["password"]);
    if ($name == '' || $password == '') {
          $msg = "You must enter all fields";
      } else {
          $sql = "SELECT * FROM members WHERE name = '$name' AND password = '$password'";
          $query = mysql_query($sql);

          if ($query === false) {
              echo "Could not successfully run query ($sql) from DB: " . mysql_error();
              exit;
          }

          if (mysql_num_rows($query) > 0) {
          
              header('Location: YOUR_LOCATION');
              exit;
          }

          $msg = "Username and password do not match";
      }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="site.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <div style="background: url(pageAccueil.jpg)" class="page-holder bg-cover">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CESI GAMING</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="#" style="text-align: right;">ACCEUIL</a>
              <a class="nav-link active" aria-current="page" href="#" style="text-align: right;">ESPORT</a>
              <a class="nav-link active" aria-current="page" href="#" style="text-align: right;">NEWS</a>
            </div>
          </div>
        </div>
      </nav> 
    </header>

    <body >
      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      -->
      <!--<div 
        class="d-grid gap-2 col-6 mx-auto"
        style="height: 50px;
               width: 150px;
               position: absolute;
               margin: -25px 0 0 -50px; 
               left: 44%;
               top: 50%;
               text-align: center;"
        >
          <button class="btn btn-primary" type="button" style ="text-align: center;">Connexion :</button>
          
      </div>
      <div
      class="d-grid gap-2 col-6 mx-auto"
      style="height: 50px;
           width: 500px;
           position: absolute;
           margin: -25px 0 0 -50px; 
           left: 35%;
           top: 60%;"    
      >
        <button class="btn btn-primary" type="button" style ="display: flex;">Identifiant :</button>
        <button class="btn btn-primary" type="button" style ="display: flex;">Mot de passe :</button>
      </div>
    </body>-->
    <body>

      <form name="frmregister"action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
        <table class="form" border:0px>
    
          <tr>
          <td></td>
            <td style="color:red;">
            <?php echo $msg; ?></td>
          </tr> 
          
          <tr>
            <th><label for="name"><strong>Name:</strong></label></th>
            <td><input class="inp-text" name="name" id="name" type="text" size="30" /></td>
          </tr>
          <tr>
            <th><label for="name"><strong>Password:</strong></label></th>
            <td><input class="inp-text" name="password" id="password" type="password" size="30" /></td>
          </tr>
          <tr>
          <td></td>
            <td class="submit-button-right">
            <input class="send_btn" type="submit" value="Submit" alt="Submit" title="Submit" />
            
            <input class="send_btn" type="reset" value="Reset" alt="Reset" title="Reset" /></td>
            
          </tr>
        </table>
      </form>
    
    <div style="line-height: 30px; margin-left: 307px;"><b>Name:</b> discussdesk <br/>  <b>Password:</b> discussdesk</div>
    
    </body>
  </div>

</html>
