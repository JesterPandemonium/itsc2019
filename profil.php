<?php
      include 'header.php';
?>


<?php
    if (isset($_POST["speichern"])) {

      $name=$_POST["name"];
      $name=sqlxss($name);

      $email=$_POST["email"];
      $email=sqlxss($email);

      $db_link->query("UPDATE nutzer SET name='$name', email='$email'");

    }
    $infos=$db_link->query("SELECT * FROM nutzer WHERE nid='$id'");

    while ($infos2=$infos->fetch_array()) {
        $name=$infos2["name"];
        $email=$infos2["email"];
        $rolle=$infos2['rolle'];
        if ($rolle==1) {
          $rolle='User';
        }elseif ($rolle==2) {
          $rolle='Bibo';
        }else {
          $rolle='Administrator';
        }
        echo "<div style='margin-left:2%;'>
                <h1>Profil</h2><br><br>
                <form method='post'>
                    <table>
                        <tr>
                            <td><label for='name'>Name:</label></td>
                            <td><input type='text' name='name' value='".$name."'></td>
                        </tr>
                        <tr><td colspan='2'><hr></td></tr>
                        <tr>
                            <td><label for='email'>E-Mail:</label></td>
                            <td>$email</td>
                        </tr>
                        <tr><td colspan='2'><hr></td></tr>
                        <tr>
                            <td><label for='rolle'>Rolle:</label></td>
                            <td>".$rolle."</td>
                        </tr>
                        <tr><td colspan='2'><hr></td></tr>
                        <tr>
                            <td><a href='Passwort_aendern_anfrage.php'>Passwort ändern</a></td>
                        </tr>
                        <tr><td colspan='2'><br></td></tr>
                        <tr>
                            <td><input type='submit' name='speichern' value='Änderungen speichern'></td>
                        </tr>
                    </table>
                </form>
              </div>";
    }
?>

<br><br><br><br>
<br><br><br><br>


</section>
<?php include 'footer.php'; ?>
