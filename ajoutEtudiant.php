<?php require_once "UtilBD.php";
require_once "DAO.php";
?>
<html>
<head>

<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/javascript.js"></script>
</head>
<body>


<div id="succes">

    <?php
    if(isset($_GET['message']))
        echo $_GET['message'];
    ?>

</div>
<div class="center">

    <form action="Controller.php" method="post">
        <table>

            <tr>
                <th>Nom : </th>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <th>Prenom : </th>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <th>CNE : </th>
                <td><input type="text" name="cne"></td>
            </tr>
            <tr>
                <th>Filiere : </th>
                <td>
                    <select name="filiere">
                        <?php
                        $listeFiliere = AllFilieres();
                        while($fil = ObjetSuivant($listeFiliere)) { ?>
                            <option value="<?php echo $fil->ID_FIL ?>"><?php echo $fil->NOM_FIL ?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>

            <tr>
                <th><input type="submit" value="Ajouter Etudiant" name="action"></th>
                <td><input type="submit" value="Effacer" name="action"></td>
            </tr>

        </table>

    </form>
</div>
</body>
</html>