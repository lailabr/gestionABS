<?php require_once "UtilBD.php";
require_once "DAO.php"; ?>


<table border="1">
    <tr>
        <th>NOM</th>
        <th>PRENOM</th>
        <th>CNE</th>
        <th>ABSCENCES</th>


    </tr>
    <?php
    if(isset($_GET['idfilsCons']))
    {
        $_SESSION['idFil']=$_GET['idfilsCons'];
        $idfiliere=$_GET['idfilsCons'];

         $listeResultats =getAllEtudiantsByAbscences(intval($idfiliere));

        while ($data =ObjetSuivant($listeResultats)) {

            echo "<tr>";
            echo "<td>".$data->nom."</td> ";
            echo "<td>".$data->prenom."</td> ";
            echo "<td>".$data->cne."</td> ";
            echo "<td>".$data->abscences."</td> ";

            echo "</tr>";
        }
    }
    ?>


</table>

