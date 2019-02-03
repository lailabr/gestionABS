<?PHP

require_once "PDF/fpdf.php";
require_once "UtilBD.php";
require_once "DAO.php";


class myPDF extends FPDF
{
    function headerTable()
    {
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,'nom',1,0,'C');
        $this->Cell(40,10,'prenom',1,0,'C');
        $this->Cell(40,10,'cne',1,0,'C');
        $this->Cell(60,10,'filiere',1,0,'C');
        $this->Cell(36,10,'abscences',1,0,'C');
        $this->Ln();
    }

    function viewTable($db)
    {
        $this->SetFont('Times','',12);
        if (isset($_SESSION['idFil'])) {
            $idFil = $_SESSION['idFil'];


            $listeConseil = getAllEtudiantsByAbscences($idFil);
            $filiere= getFiliere($idFil);

            while ($data = ObjetSuivant($listeConseil)) {
                $data2 = ObjetSuivant($filiere);
                $this->Cell(20, 10, $data->nom, 1, 0, 'L');
                $this->Cell(40, 10, $data->prenom, 1, 0, 'L');
                $this->Cell(40, 10, $data->cne, 1, 0, 'L');
                $this->Cell(60, 10, $data2->NOM_FIL, 1, 0, 'L');
                $this->Cell(36, 10, $data->abscences, 1, 0, 'L');
                $this->Ln();
            }
        }


    }

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$db =Connexion(NOM,PASSE,BASE,SERVEUR);
$pdf->viewTable($db);
$pdf->Output();