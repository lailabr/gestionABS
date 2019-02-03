<?php require_once ("UtilBD.php"); ?>

<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css">

<div class="center">

    <?php
        $status=$_GET['statut'];
        switch ($status)
        {
            case "admin" :
                ?>
    <p id="bienvenu">Bienvenu admin</p>
         <?php
                break;
            case "prof":
                ?>
    <p id="bienvenu">Bienvenu prof</p>
          <?php
                break;
            case "scolarite":
                ?>
    <p id="bienvenu">Bienvenu scolarité</p>
    <?php
                break;
        }
    ?>
 <form action="Controller.php" method="post">
    <table>

        <tr>
            <th>login : </th>
            <td><input type="text" name="login"></td>
        </tr>
        <tr>
            <th>password : </th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th><input type="submit" value="Authentify" name="action"></th>
        </tr>

    </table>
 </form>
</div>
