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
    Filieres :
    <div id="divFil">
        <select id="Filieres">
            <?php
            $listeFilieres = AllFilieres();
            while($fils = ObjetSuivant($listeFilieres)) { ?>
                <option value="<?php echo $fils->ID_FIL ?>"><?php echo $fils->NOM_FIL ?></option>
            <?php }?>
        </select>

    </div>
</div>
<div>
    Conseil :
    <div id="divConseil">
        <select id="FilieresCons">
            <?php
            $listeFilieres = AllFilieres();
            while($fils = ObjetSuivant($listeFilieres)) { ?>
                <option value="<?php echo $fils->ID_FIL ?>"><?php echo $fils->NOM_FIL ?></option>
            <?php }?>
        </select>

    </div>
</div>
<div>
    Etudiants :
    <div id="divEtud"></div>

</div>
<div>
    <button name="action" value="Telecharger PDF"><a href="telechargerPDF.php?idFil=">Telecharger PDF</a></button>
</div>

</body>
</html>