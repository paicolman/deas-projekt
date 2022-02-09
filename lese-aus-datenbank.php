<!DOCTYPE html>

<html>
    <head>
      <title>Beispiel-Project für Dea</title>
      <style>
        td{border:1px solid black;}
      </style>
    </head>
    <body>
        <h1>Lesen wir die Sachen aus der Datenbank.</h1>
        <?php
        // Zuerst deklarieren wir ein paar Variablen mit der Name von Server, user, und Datenbank:
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
          echo "<p>Das sind jetzt alle Rezepte die in der Datenbank drin sind:</p>";
        }

        //Hier deifiniere ich der SQL Kommando:
        $sql = "SELECT * FROM rezepte";
        // Hier schicke ich es und speichere der Resultat in der Variable $result
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          //Nun zeigen wir hier eine Tabelle mit all den Daten:
          echo "
          <table>
          <tr><td>ID</td><td>NAME</td><td>ZUTATEN</td><td>ZUBEREITUNG</td>
          </tr>
          ";
          // Vervollständigen mit der Daten von jedem Rezept (loop)
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["zutaten"]."</td>";
            echo "<td>".$row["zubereitung"]."</td>";
            echo "</tr>";
          }
        } else {
          //Falls es leer wäre...
          echo "0 results";
        }
        //Noch der Table tag fertig machen.
        echo "</table>";

        ?>
        <p><a href="./index.html">Zurück zu der Hauptseite</a></p>
    </body>
</html>