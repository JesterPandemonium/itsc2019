<?php
    function startedb()
    {
        error_reporting(E_ALL);

            // Zum Aufbau der Verbindung zur Datenbank
            $db_link = mysqli_connect ('localhost' , 'root' , '' , 'sommer2019');

            mysqli_set_charset($db_link, 'utf8');

            return $db_link;
    }

    function nutzerid()
    {

            if (empty($_SESSION["nutzer"])) {
                $id=$_SESSION["nutzer"]='';
            }else{
                $id=$_SESSION['nutzer'];
            }
            return $id;
    }


  function sqlxss($wert)
  {
    //Ändern bestimmter Zeichen in deren HTML-Form
    $wert=str_replace("<","&lt;",$wert);$wert=str_replace(">","&gt;",$wert);
    $wert=str_replace('"',"&quot;",$wert);$wert=str_replace("'","&apos;",$wert);
    $wert=str_replace('=',"&equals;",$wert);

    return ($wert);
  }


?>
