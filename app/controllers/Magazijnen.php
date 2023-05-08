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
}
