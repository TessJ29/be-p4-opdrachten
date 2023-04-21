<?php

class Les
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getLessons()
    {
        $this->db->query("SELECT Les.Datum
                                ,Leerling.Naam as LENA
                                ,Les.Id
                                ,Instructeurs.Naam as INNA
                            FROM Les
                            INNER JOIN Instructeurs
                            ON Les.InstructeurId = Instructeurs.Id
                            INNER JOIN Leerling
                            ON Les.LeerlingId = Leerling.Id
                            WHERE Instructeurs.Id = :Id");

        $this->db->bind(':Id', 2);

        $result = $this->db->resultSet();

        return $result;
    }

    public function getTopicsLesson($lessonId)
    {
        $this->db->query("SELECT *
                            FROM Onderwerp
                            INNER JOIN Les
                            ON Les.Id = Onderwerp.LesId
                            WHERE LesId = :LessonId");

        $this->db->bind(':LessonId', $lessonId);
        $result = $this->db->resultSet();
        return $result;
    }
    
    public function addTopic($post) 
    {
        $sql = "INSERT INTO Onderwerp (LesId
                                      ,Onderwerp)
                VALUES                (:lesId
                                      ,:topic)";

        $this->db->query($sql);
        $this->db->bind(':lesId', $post['lesId'], PDO::PARAM_INT);
        $this->db->bind(':topic', $post['topic'], PDO::PARAM_STR);
        return $this->db->execute();
    }

    public function getLesInfo($lessonId)
    {
        $this->db->query("SELECT *
                            FROM opmerking
                            INNER JOIN Les
                            ON Les.Id = Opmerking.LesId
                            WHERE LesId = :LessonId");
        $this->db->bind(':LessonId', $lessonId);
        $result = $this->db->resultSet();
        return $result;
    }

    public function addInfo($post) 
    {
        $sql = "INSERT INTO Opmerking (LesId
                                      ,Opmerking)
                VALUES                (:lesId
                                      ,:info)";

        $this->db->query($sql);
        $this->db->bind(':lesId', $post['lesId'], PDO::PARAM_INT);
        $this->db->bind(':info', $post['info'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}