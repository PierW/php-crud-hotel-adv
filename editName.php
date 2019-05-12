<?php

  if ($_POST["id"] && $_POST["newname"] && $_POST["newlastname"]) {

    $id = $_POST["id"];
    $newname = $_POST["newname"];
    $newlastname = $_POST["newlastname"];

    $server = "localhost";
    $username = "root";
    $password = "******";
    $database = "Hotel";

    $conn = new mysqli($server, $username, $password, $database);

    if ($conn -> connect_errno) {
      echo "Errori di connessione " . $conn -> connect_error;
      return;
    }

    $sql = "
            UPDATE paganti
            SET name = '$newname', lastname = '$newlastname'
            WHERE id = $id
            ";

    // var_dump($sql); die();
    $conn -> query($sql);
    $conn -> close();

  }

   ?>
