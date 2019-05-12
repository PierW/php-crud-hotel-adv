<?php

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
          SELECT id, name, lastname
          FROM paganti
          ORDER BY name ASC
          ";

  $result = $conn -> query($sql);
  // var_dump($result); die();

  if ($result -> num_rows > 0) {

    $res = [];

    while ($row = $result -> fetch_assoc()) {
      $res[] = $row;
    }
  } else {
    echo "0 risultati";
  }

  // var_dump($res); die();
  echo json_encode($res);
  $conn -> close();

 ?>
