<?php require_once "UtilBD.php";
require_once "DAO.php";

?>

<form action="Controller.php" method="post">
    <table border="1">
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>ABSCENCES</th>


        </tr>
        <?php

        if(isset($_GET['idfil']))
        {
            $idfiliere=$_GET['idfil'];

            $listeResultats =getAllResults(intval($idfiliere));

            while ($data =ObjetSuivant($listeResultats)) {

                echo "<tr>";
                echo "<td>".$data->nom."</td> ";
                echo "<td>".$data->prenom."</td> ";
                echo "<td><input type='checkbox' name='AbscCheck[]' value='$data->ID_ETUD'></td> ";

                echo "</tr>";
            }
        }

        ?>


    </table><br/>
    <input type="submit" name="action" value="valider Absc">
    <input type="reset" name="action" value="Effacer">
</form>


