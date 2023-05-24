<?php

class Countries extends Controller
{
    private $countryModel;

    public function __construct()
    {
        $this->countryModel = $this->model('Country');
    }

    public function index($land = null, $age = null)
    {
        $countries = $this->countryModel->getCountries();

        $rows = '';
        foreach ($countries as $value) {
            $rows .= "<tr>
                            <td>$value->Id</td>
                            <td>$value->Name</td>
                            <td>$value->CapitalCity</td>
                            <td>$value->Continent</td>
                            <td>$value->Population</td>
                            <td><a href='" . URLROOT . "/countries/update/$value->Id'>update</a></td>
                            <td><a href='" . URLROOT . "/countries/delete/$value->Id'>delete</a></td>
                          </tr>";
        }

        // var_dump($countries);

        $data = [
            'title' => '<h1>Landenoverzicht</h1>',
            'countries' => $rows
        ];

        $this->view('countries/index', $data);
    }

    public function update($id = NULL)
    {
        //var_dump($_SERVER);exit();
        var_dump($id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->countryModel->updateCountry($_POST);

            header("Location: " . URLROOT . "/countries/index");
        } else {
            $row = $this->countryModel->getSingleCountry($id);
            $data = [
                'title' => '<h1>Update landenoverzicht</h1>',
                'row' => $row

            ];

            $this->view("countries/update", $data);
        }
    }

    public function delete($id)
    {

        $this->countryModel->deleteCountry($id);

        $data = [
            'deleteStatus' => "Het record met id = $id is verwijderd"
        ];

        $this->view('countries/delete', $data);
        header("Refresh:2; url=" . URLROOT . "/countries/index");
    }

    public function create()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $_POST = FILTER_INPUT_ARRAY(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $this->countryModel->createCountry($_POST);

                header("Location:" . URLROOT . "/countries/index");
            } catch (PDOException $e) {
                echo "Het inserten van het record is niet gelukt";
                header("Refresh:3; url=" . URLROOT . "/countries/index");
            }
        } else {

            $data = [
                'title' => "Voeg een nieuw land in"
            ];
        }

        $this->view('countries/create', $data);
    }
}
