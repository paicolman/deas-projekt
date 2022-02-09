<!DOCTYPE html>
<html>
    <head>
        <title>Beispiel-Project für Dea</title>
    </head>
    <body>
        <h1>Rezept hinzufügen</h1>
        <p>Diese Page wird angezeigt, wenn ein Rezept hinzugefügt wurde, und informiert der User, ob es gut ging oder nicht...
        </p>

        <?php
          // Zuerst schreiben wir im Dokument einfach, was der User so alles geschrieben hat.
          echo "<p>Wir werden folgende Daten in die Datenbank schreiben:</p>";
          echo "<h3> Rezept name:".$_POST["name"]."</h3>";
          echo "<h3> Zutaten:".$_POST["zutaten"]."</h3>";
          echo "<h3> Zubereitung:".$_POST["zubereitung"]."</h3>";

          // Wieder unsere Vraiablen zum verbinden
          $servername = "localhost:3306";
          $username = "root";
          $password = "MyRootPwd";
          $dbname = "dea_database";

          // Versuchen wir uns zu verbinden:
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          // Sind wir verbunden?
          if (!$conn) {
            // Nein!
            die("<h2 style='color:red'>Irgendwas ist faul, konnte mich nicht mit der Datenbank verbinden</h2>" . mysqli_connect_error());
          } else{
            // Doch!
            echo "<h3 style='color:lightgreen'>Wir sind mit der Datenbank verbunden!</h3>";
          }

          // Wieder unser SQL Kommando, der ist etwas länger...
          $sql1 = "
            INSERT INTO rezepte(name, zutaten, zubereitung)
            VALUES('".$_POST["name"]."','".$_POST["zutaten"]."','".$_POST["zubereitung"]."');
          ";

          // Und hier führen wir das SQL Kommando (Query) aus. Jetzt sind die Daten in der Datenbank geschrieben!
          $result = mysqli_query($conn, $sql1);

        ?>
        <p><a href="./index.html">Zurück zu der Hauptseite</a></p>
        <p><a href="./lese-aus-datenbank.php">Rezepte auslesen</a></p>
    </body>
</html>