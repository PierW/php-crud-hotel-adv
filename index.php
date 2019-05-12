<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Database</title>
    <!-- Importo Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Importo Handlebars -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.2/handlebars.min.js" charset="utf-8"></script>
    <!-- Importo Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Importo Miei -->
    <script src="script.js" charset="utf-8"></script>
    <link rel="stylesheet" href="style.css">
    <!-- Template -->
    <script id="list-pending" type="text/x-handlebars-template">
      <div class="box" data-id="{{ id }}">
        <div>
          <i class="fas fa-info-circle"></i>
          <i class="fas fa-edit"></i>
          <i class="fas fa-trash-alt"></i>
        </div>
        <hr>
        <h1>NAME: {{ name }}</h1>
        <hr>
        <h1 class="lastname">LASTNAME: {{ lastname }}</h1>
        <hr>
        <h4 class="address"></h4>
      </div>
    </script>
  </head>
  <body>
    <div class="container">
      <h1>PAGANTI</h1>
      <div class="list"></div>
    </div>
  </body>
</html>
