<?php

  if ($_POST["id"]) {
    $id = $_POST["id"];

    $server = "localhost";
    $username = "root";
    $password = "******";
    $database = "Hotel";

    $conn = new mysqli($server, $username, $password, $database);

    if ($conn -> connect_errno) {
      echo "Errori di connessione " . $conn -> connect_error;
      return;
    }

    // Nota bene che in questo caso ci sono più righe con lo stesso pagante_id,
    // (un ospite può effettuare più pagamenti) quindi In questo modo le vado
    // comunque a cancellare tutte e non solo quella di mio interesse. (nella tabella paganti avrei aggiunto la colonna prenotazione_id)

    //SQL1 - cancello prima la foreign key e le dipendenze
    $sql1 = "
            DELETE FROM pagamenti
            WHERE pagante_id = $id
            ";

    $sql2 = "
            DELETE FROM paganti
            WHERE id = $id
            ";

    $conn -> query($sql1);
    $conn -> query($sql2);
    $conn -> close();

  }

  ?>
