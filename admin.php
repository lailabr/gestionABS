<?php require_once "UtilBD.php";
require_once "DAO.php";?>

<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/javascript.js"></script>
<div id="succes">

    <?php
    if(isset($_GET['message']))
        echo $_GET['message'];
    ?>

</div>

    <div class="center">
        <p id="bienvenu">Bienvenu <?php echo $_GET['nom'];?></p>
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
                    <th>password : </th>
                    <td><input type="password" name="mdp"></td>
                </tr>
                <tr>
                    <th>statut : </th>
                    <td>
                        <select name="statut">
                            <option value="prof">prof</option>
                            <option value="scolarite">scolarité</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Affiliation : </th>
                    <td>
                        <select name="affil">
                            <option>Mlle</option>
                            <option>Mr</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><input type="submit" value="Ajouter" name="action"></th>
                    <td><input type="reset" value="Effacer" name="action"></td>
                </tr>
            </table>
        </form>
    </div>







