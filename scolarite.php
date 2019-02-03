
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css">

<div class="center">
    <p id="bienvenu">Bienvenu  <?php echo $_GET['nom'];?></p>

    <div class="buttons">
        <button type="button"><a href="Controller.php?action=Ajouter">Ajouter</a></button>
        <button type="button"><a href="Controller.php?action=Lister">Lister</a></button>
        <button type="button"><a href="Controller.php?action=Abscences">Abscences</a></button>
    </div>
</div>

