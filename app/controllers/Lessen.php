<?php

class Lessen extends Controller
{

    public function __construct()
    {
        $this->lesModel = $this->model('Les');
    }

    public function index()
    {
        $result = $this->lesModel->getLessons();

        // Get single object from array //
        // var_dump($result);
        // $d = new DateTimeImmutable($result[0]->Datum, new DateTimeZone('Europe/Amsterdam'));
        // echo $d->format('D M Y ') .   '<br>';
        // echo $result[0]->Datum;
        if ($result) {
            $instructeurNaam = $result[0]->INNA;
        } else {
            $instructeurNaam = '';
        }
        $rows = '';
        foreach ($result as $info) {
            $d = new DateTimeImmutable($info->Datum, new DateTimeZone('Europe/Amsterdam'));

            $rows .= "<tr>
                        <td>{$d->format('d-m-Y')}</td>
                        <td>{$d->format('H:i')}</td>
                        <td>$info->LENA</td>
                        <td><a href='" . URLROOT . "/Lessen/Lesinfo/{$info->Id}'><img src='" . URLROOT . "/img/b_help.png' alt='questionmark'></a></td>
                        <td><a href='" . URLROOT . "/lessen/topicslesson/{$info->Id}'><img src='" . URLROOT . "/img/b_props.png' alt='topiclist'></a></td>
                      </tr>";
        }

        $data = [
            'title' => '<h1>Overzicht rijlessen</h1>',
            'rows' => $rows,
            'instructeurNaam' => $instructeurNaam
        ];

        $this->view('Lessen/index', $data);
    }

    public function topicsLesson($lesId)
    {
        $result = $this->lesModel->getTopicsLesson($lesId);
        // var_dump($result);

        if ($result) {
            $d = new DateTimeImmutable($result[0]->Datum, new DateTimeZone('Europe/Amsterdam'));
            $date = $d->Format('d-m-Y');
            $time = $d->Format('H:i');
        }
        $rows = '';
        foreach ($result as $topic) {
            $rows .= "<tr>      
                        <td>$topic->Onderwerp</td>
                      </tr>";
        }
        $data = [
            'title' => 'Onderwerpen Les',
            'rows' => $rows,
            'lesId' => $lesId,
            'date' => $date,
            'time' => $time
        ];
        $this->view('Lessen/topicslesson', $data);
    }

    function addTopic($lesId = NULL)
    {
        $data = [
            'title' => 'Onderwerp Toevoegen',
            'lesId' => $lesId,
            'topicError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => 'Onderwerp Toevoegen',
                'lesId' => $_POST['lesId'],
                'topic' => $_POST['topic'],
                'topicError' => ''
            ];

            $data = $this->validateAddTopicForm($data);

            if (empty($data['topicError'])) {
                $result = $this->lesModel->addTopic($_POST);

                if ($result) {
                    $data['title'] = "<p>Het nieuwe onderwerp is succesvol toegevoegd</p>";
                } else {
                    echo "<p>Het nieuwe onderwerp is niet toegevoegd</p>";
                }
                header('Refresh:3; url=' . URLROOT . '/lessen/topicslesson/' . $data['lesId']);
            } else {
                header('Refresh:3; url=' . URLROOT . '/lessen/addTopic/' . $data['lesId']);
            }
        }

        $this->view('lessen/addTopic', $data);
    }

    public function LesInfo($lesId)
    {
        $result = $this->lesModel->getLesInfo($lesId);
        
        $rows = '';
        foreach ($result as $info) {
            $rows .= "<tr>
                        <td>$info->Opmerking</td>
                      </tr>";
        }
        $data = [
            'title' => 'Opmerking les',
            'rows' => $rows,
            'lesId' => $lesId
        ];
        $this->view('Lessen/Lesinfo', $data);
    }

    function addInfo($lesId = NULL)
    {
        $data = [
            'title' => 'Opmerking Toevoegen',
            'lesId' => $lesId,
            'lesInfoError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => 'Onderwerp Toevoegen',
                'lesId' => $_POST['lesId'],
                'info' => $_POST['info'],
                'lesInfoError' => ''
            ];

            $data = $this->validateAddInfoForm($data);

            if (empty($data['topicError'])) {
                $result = $this->lesModel->addInfo($_POST);

                if ($result) {
                    $data['title'] = "<p>Uw opmerking is succesvol ingevoerd</p>";
                } else {
                    echo "<p>Uw opmerking is niet ingevoerd</p>";
                }
                header('Refresh:3; url=' . URLROOT . '/lessen/lesinfo/' . $data['lesId']);
            } else {
                header('Refresh:3; url=' . URLROOT . '/lessen/addinfo/' . $data['lesId']);
            }
        }

        $this->view('lessen/addinfo', $data);
    }


    private function validateAddTopicForm($data)
    {
        if (strlen($data['topic']) > 50) {
            // input is meer dan totaal aantal characters
            $data['topicError'] = 'U heeft meer dan het maximale aantal characters ingevoerd';
        } else if (empty($data['topic'])) {
            // input is leeg
            $data['topicError'] = 'U bent verplicht het veldt in te vullen';
        }

        return $data;
    }

    private function validateAddInfoForm($data)
    {
        if(strlen($data['info']) > 100) {
            $data['lesInfoError'] = 'U heeft meer dan het maximale aantal characters ingevoerd.';
        } else if (empty($data['info'])) {
            $data['lesInfoError'] = 'U bent verplicht het veldt in te vullen';
        }

        return $data;
    }
}
