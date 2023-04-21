<?php

class Instructeur
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getInstructeurs()
    {
        $this->db->query("SELECT            Instructeur.Voornaam
                                            ,Instructeur.Tussenvoegsel
                                            ,Instructeur.Achternaam
                                            ,Instructeur.Mobiel
                                            ,Instructeur.DatumInDienst
                                            ,Instructeur.AantalSterren
                                            ,Instructeur.Id
                                            FROM Instructeur");


        $result = $this->db->resultSet();

        return $result;
    }

    public function getVoertuigInfo($instructeurId)
    {
        $this->db->query("SELECT Voertuig.Kenteken
                                ,Voertuig.Type
                                ,Voertuig.Bouwjaar
                                ,Voertuig.Brandstof
                                ,TypeVoertuig.TypeVoertuig
                                ,TypeVoertuig.Rijbewijscategorie
                                ,Voertuig.Id as VoertuigId
                                ,TypeVoertuig.Id as VoertuigTypeId
                                ,Instructeur.Id as InstructeurId
                                ,Instructeur.Voornaam
                                ,Instructeur.Tussenvoegsel
                                ,Instructeur.Achternaam
                                ,Instructeur.DatumInDienst
                                ,Instructeur.AantalSterren
                                FROM VoertuigInstructeur
                                INNER JOIN Voertuig
                                ON VoertuigInstructeur.VoertuigId = Voertuig.Id
                                INNER JOIN Instructeur
                                ON VoertuigInstructeur.InstructeurId = Instructeur.Id
                                INNER JOIN TypeVoertuig
                                ON Voertuig.TypeVoertuigId = TypeVoertuig.Id
                                WHERE Instructeur.Id = :Id");


$this->db->bind(':Id', $instructeurId);  
                                
        $result = $this->db->resultSet();

        return $result;                      
    }
    
    public function getInstructeurById($instructeurId)
    {
        $this->db->query("SELECT Instructeur.Voornaam
        FROM VoertuigInstructeur
        INNER JOIN Instructeur
        ON VoertuigInstructeur.InstructeurId = Instructeur.Id
        WHERE InstructeurId = :InstructeurId");

$this->db->bind(':LessonId', $instructeurId);
$result = $this->db->resultSet();
return $result;
    }
}
