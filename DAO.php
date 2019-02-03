<?php
session_start();
require_once "UtilBD.php";

function authentify($login,$password)
{
    $result ="";

    $listeAdmins =getAllAdmins();
    while ($data=ObjetSuivant($listeAdmins))
    {
        if(($data->login)==$login && ($data->mdp)==$password)
        {
            $result="admin";
            break;
        }

    }
    $listProfs =getAllProfs();
    while ($data=ObjetSuivant($listProfs))
    {
        if(($data->nom)==$login && ($data->mdp)==$password)
        {
            $result="prof";
            $_SESSION['idProf']=$data->ID_PROF;
            break;
        }

    }
    $listScolarites = getAllScolarites();
    while ($data=ObjetSuivant($listScolarites))
    {
        if(($data->nom)==$login && ($data->mdp)==$password)
        {
            $result="scolarite";
            break;
        }

    }

    return $result;


}

/**
 * @return All admins
 */
function getAllAdmins()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $admins ="SELECT * FROM admin";
    $result =ExecRequete($admins,$connexion);
    return $result;
}

/**
 * @return All Profs
 */
function getAllProfs()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $commissaires="SELECT * FROM prof";
    $result =ExecRequete($commissaires,$connexion);
    return $result;
}

function getAllScolarites()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $commissaires="SELECT * FROM scolarite";
    $result =ExecRequete($commissaires,$connexion);
    return $result;
}

/**
 * Add prof
 */
function addProf(array $prof){

    try{
        $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
        if(!is_null($prof)){
            $connexion->beginTransaction();
            $stmt = $connexion->prepare("INSERT INTO prof (nom,prenom,mdp,statut) 
	    			VALUES (:nom,:prenom,:mdp,:statut)");

            $stmt->bindParam(':nom', $prof['nom']);
            $stmt->bindParam(':prenom', $prof['prenom']);
            $stmt->bindParam(':mdp', $prof['mdp']);
            $stmt->bindParam(':statut', $prof['statut']);


            $stmt->execute();
            $connexion->commit();
            // $st="bien ajouté dans la Bd";
        }
    }
    catch(Exception $e){
        $connexion->rollback();
        echo $e->getMessage();
    }
}

/**
 * Add scolarite
 */
function addScolarite(array $scolarite){

    try{
        $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
        if(!is_null($scolarite)){
            $connexion->beginTransaction();
            $stmt = $connexion->prepare("INSERT INTO scolarite (nom,prenom,mdp,statut) 
	    			VALUES (:nom,:prenom,:mdp,:statut)");

            $stmt->bindParam(':nom', $scolarite['nom']);
            $stmt->bindParam(':prenom', $scolarite['prenom']);
            $stmt->bindParam(':mdp', $scolarite['mdp']);
            $stmt->bindParam(':statut', $scolarite['statut']);


            $stmt->execute();
            $connexion->commit();
            // $st="bien ajouté dans la Bd";
        }
    }
    catch(Exception $e){
        $connexion->rollback();
        echo $e->getMessage();
    }
}

function AllFilieres()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stm ="SELECT * FROM filiere";
    $result =ExecRequete($stm,$connexion);
    return $result;
}

function addEtudiant(array $etudiant)
{
    try{
        $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
        if(!is_null($etudiant)){
            $connexion->beginTransaction();
            $stmt = $connexion->prepare("INSERT INTO etudiants (nom,prenom,cne,ID_FIL) 
	    			VALUES (:nom,:prenom,:cne,:ID_FIL)");

            $stmt->bindParam(':nom', $etudiant['nom']);
            $stmt->bindParam(':prenom', $etudiant['prenom']);
            $stmt->bindParam(':cne', $etudiant['cne']);
            $stmt->bindParam(':ID_FIL', $etudiant['filiere']);


            $stmt->execute();
            $connexion->commit();
            // $st="bien ajouté dans la Bd";
        }
    }
    catch(Exception $e){
        $connexion->rollback();
        echo $e->getMessage();
    }
}

function getAllResults($idfil)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT * FROM etudiants where ID_FIL='$idfil' order by nom desc");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}

function getAllEtudiantsByAbscences($idfil)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT * FROM etudiants where ID_FIL='$idfil'and abscences>=6");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}
function getFiliere($id)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM filiere where ID_FIL='$id'";
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}


function getIdFilieres($idProf)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM filiere_prof where ID_PROF='$idProf'";
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}



function incrementerAbsc(array $t)
    {
        $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);

        for($i=0;$i<sizeof($t);$i++)
        {
            $stm ="update etudiants  set abscences=abscences+1 where ID_ETUD= '$t[$i]'";
            ExecRequete($stm,$connexion);
        }
    }
