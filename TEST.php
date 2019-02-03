<?php
require_once "UtilBD.php";
require_once "DAO.php";


?>

<html>
<body>


<table>
    <tr>
        <th>ID_FIL</th>
        <th>NOM_FIL</th>

    </tr>
    <?php
    $listeFilieres = getIdFilieres(intval($_SESSION['idProf']));

    while($fils = ObjetSuivant($listeFilieres)) {
        $data=ObjetSuivant(getFiliere($fils->ID_FIL));
        ?>
        <tr>
            <td><?php echo $data->ID_FIL ;?></td>
            <td><?php echo $data->NOM_FIL ;?></td>
        </tr>

    <?php
    }
    ?>

</table>

</body>
</html>
