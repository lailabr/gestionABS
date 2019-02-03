<?php
require_once "UtilBD.php";
require_once "DAO.php";
?>
<?php
if(isset($_POST['action']))
{
    $action=$_POST['action'];
    switch ($action)
    {
        case "Authentify" :
            if(isset($_POST['login']) && isset($_POST['password']))
            {
                $login=$_POST['login'];
                $password=$_POST['password'];
                $result=authentify($login,$password);

                if($result=="admin")
                {
                    header("location:admin.php?nom=$login");
                }else if($result=="prof") {
                    header("location:prof.php?nom=$login");
                }else if($result=="scolarite") {
                    header("location:scolarite.php?nom=$login");
                }else
                    echo "Authentification echouée !";

            }
            break;
        case "Ajouter":
            if(isset($_POST['nom'] , $_POST['prenom'] , $_POST['mdp'] , $_POST['statut']))
            {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $mdp =$_POST['mdp'];
                $statut = $_POST['statut'];

                switch ($statut)
                {
                    case "prof":
                        addProf($_POST);
                        header("location:admin.php?message=prof a été  bien ajouté ! ");
                        break;
                    case "scolarite":
                        addScolarite($_POST);
                        header("location:admin.php?message=Scolarité a été  bien ajouté !");
                        break;
                }
            }
            break;
        case "Ajouter Etudiant":
            if(isset($_POST['nom'] , $_POST['prenom'] , $_POST['cne'] , $_POST['filiere']))
            {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $cne =$_POST['cne'];
                $filiere = $_POST['filiere'];

                addEtudiant($_POST);
                header("location:ajoutEtudiant.php?message=Etudiant a été  bien ajouté ! ");

            }
            break;
    }


}elseif (isset($_GET['action']))
{
    $action = $_GET['action'];
    switch ($action)
    {
        case "Ajouter":
            header("location:ajoutEtudiant.php");
            break;
        case "Lister":
            header("location:Lister.php");
            break;
        case  "Abscences":
            header("location:abscences.php");
            break;


    }
}
if(isset($_POST['AbscCheck']))
{
    $k=null;
    for($i=0;$i<sizeof($_POST['AbscCheck']);$i++)
    {
        $k[$i]= intval($_POST['AbscCheck'][$i]);

    }
    incrementerAbsc($k);
    header("location:prof.php");

}