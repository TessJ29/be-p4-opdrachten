<?php
class Magazijnen extends Controller
{
    private $magazijnModel;

    public function __construct()
    {
        $this->magazijnModel = $this->model('Magazijn');
    }

    public function index()
    {
        $producten = $this->magazijnModel->getProducts();
        $data = [
            'title' => 'Overzicht Magazijn Jamin',
            'producten' => $producten,
        ];
        $this->View('Magazijnen/index', $data);
    }

    public function LeverantieInfo($naam)
    {
        $info = $this->magazijnModel->getLeverantieInfo($naam);
        if (empty($info)) {
            $message = "Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: 30-04-2023";
            $data = [
                'title' => 'Leverings Informatie',
                'info' => $info,
                'LeverancierNaam' => '',
                'ContactPersoon' => '',
                'LeverancierNummer' =>  '',
                'Mobiel' => '',
                'ErrorMessage' => $message ?? ''
            ];
            header('Refresh:5; url=' . URLROOT . '/magazijnen/index/');
            $this->view('Magazijnen/leverantieInfo', $data);
        } else {
            $LeverancierNaam = $info[0]->LeverancierNaam;
            $ContactPersoon = $info[0]->ContactPersoon;
            $LeverancierNummer = $info[0]->LeverancierNummer;
            $Mobiel = $info[0]->Mobiel;

            $data = [
                'title' => 'Leverings Informatie',
                'info' => $info,
                'LeverancierNaam' => $LeverancierNaam ?? '',
                'ContactPersoon' => $ContactPersoon ?? '',
                'LeverancierNummer' => $LeverancierNummer ?? '',
                'Mobiel' => $Mobiel ?? '',
                'ErrorMessage' => ''
            ];
            $this->view('Magazijnen/leverantieInfo', $data);
        }
    }

    public function AllergeenInfo($productId)
    {
        $info = $this->magazijnModel->getAllergeenInfo($productId);
        $product = $this->magazijnModel->getProductInfoById($productId);
        $productNaam = $product[0]->Naam;
        $barcode = $product[0]->Barcode;
        if ($info) {
            $data = [
                'title' => 'Overzicht Allergenen',
                'allergeenInfo' => $info,
                'Naam' => $productNaam,
                'Barcode' => $barcode,
                'ErrorMessage' => $message ?? ''
            ];
            $this->view('Magazijnen/allergeenInfo', $data);
        } else {
            $message = "In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken";
            $data = [
                'title' => 'Overzicht Allergenen',
                'allergeenInfo' => $info,
                'Naam' => $productNaam,
                'Barcode' => $barcode,
                'ErrorMessage' => $message ?? ''
            ];
            header('Refresh:5; url=' . URLROOT . '/magazijnen/index/');
            $this->view('Magazijnen/allergeenInfo', $data);
        }
    }

    public function Leverancier()
    {
        $leverancier = $this->magazijnModel->getLeveranciers();
        $data = [
            'title' => 'Overzicht Leveranciers',
            'leverancier' => $leverancier ?? ''
        ];
        $this->view('magazijnen/leverancier', $data);
    }

    public function GeleverdeProducten($leverancierId)
    {
        $leverancier = $this->magazijnModel->getLeverancierById($leverancierId);
        $producten = $this->magazijnModel->getGeleverdeProducten($leverancierId);
        if (empty($producten)) {
            $message = "Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin";
            header('Refresh:3; url=' . URLROOT . '/magazijnen/leverancier/');
        } else {
            $message = "";
        }
        $data = [
            'title' => 'Geleverde Producten',
            'LeverancierNaam' => $leverancier->Naam,
            'ContactPersoon' => $leverancier->ContactPersoon,
            'LeverancierNummer' => $leverancier->LeverancierNummer,
            'Mobiel' => $leverancier->Mobiel,
            'producten' => $producten,
            'Message' => $message,
        ];

        $this->view('magazijnen/geleverdeProducten', $data);
    }

    public function nieuweLevering($leverancierId, $productId)
    {
        $leverancier = $this->magazijnModel->getLeverancierById($leverancierId);
        $getAantal = $this->magazijnModel->getAantalAanwezig($leverancierId, $productId);
        $previousAantal = $getAantal->AantalAanwezig;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $aantal = $_POST["Aantal"];
                $nieuweAantal = $previousAantal + $aantal;
                $presentDate = date('Y-m-d');

                $this->magazijnModel->nieuweLevering($leverancierId, $productId, $nieuweAantal, $presentDate, $_POST);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        $data = [
            'title' => 'Levering product',
            'LeverancierNaam' => $leverancier->Naam,
            'ContactPersoon' => $leverancier->ContactPersoon,
            'LeverancierNummer' => $leverancier->LeverancierNummer,
            'Mobiel' => $leverancier->Mobiel,
            'LeverancierId' => $leverancierId,
            'ProductId' => $productId,
        ];
        $this->view('magazijnen/nieuweLevering', $data);
    }
}
