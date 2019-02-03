<?php

require_once "UtilBD.php";
require_once "DAO.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des Abscences </title>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/listeEtudiants.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body class="center">
<div>
    Filiere :
    <div id="divFilProf">
        <select id="FilieresProf">
            <?php
            $listeFilieres = getIdFilieres(intval($_SESSION['idProf']));

            while($fils = ObjetSuivant($listeFilieres)) {
                $data=ObjetSuivant(getFiliere($fils->ID_FIL));
                ?>
                <option value="<?php echo $data->ID_FIL ?>"><?php echo $data->NOM_FIL ?></option>
            <?php }?>
        </select>

    </div>
</div>
<div>
    Etudiants :
    <div id="divEtudAbs"></div>

</div>
</body>