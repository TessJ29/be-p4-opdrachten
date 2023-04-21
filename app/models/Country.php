<?php

/**
 * Dit is de model country die hoort bij de Countries controller
 */

class Country
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCountries()
    {
        $this->db->query("SELECT * FROM country");
        $result = $this->db->resultSet();
        return $result;
    }

    public function getSingleCountry($id)
    {
        $this->db->query("SELECT * FROM country WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateCountry($post)
    {
        // var_dump($post);
        // exit();
        $this->db->query("UPDATE `country`
                          SET Name = :Name,
                              CapitalCity = :capitalCity,
                              Continent = :continent,
                              Population = :population
                          WHERE Id = :id");

        $this->db->bind(':Name', $post["Name"], PDO::PARAM_STR);
        $this->db->bind(':capitalCity', $post["CapitalCity"], PDO::PARAM_STR);
        $this->db->bind(':continent', $post["Continent"], PDO::PARAM_STR);
        $this->db->bind(':population', $post["Population"], PDO::PARAM_INT);
        $this->db->bind(':id', $post["Id"], PDO::PARAM_INT);


        return $this->db->execute();
    }

    public function deleteCountry($id)
    {
        $this->db->query("DELETE FROM country WHERE Id = :id");
        $this->db->bind("id", $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function createCountry($post)
    {
        // var_dump($post);
        // exit();
        $this->db->query("INSERT INTO `country` (Id, Name, CapitalCity, Continent, Population)
                          VALUES(:id, :name, :capitalCity, :continent, :population)");

        $this->db->bind(':id', $post["Id"], PDO::PARAM_INT);
        $this->db->bind(':name', $post["Name"], PDO::PARAM_STR);
        $this->db->bind(':capitalCity', $post["CapitalCity"], PDO::PARAM_STR);
        $this->db->bind(':continent', $post["Continent"], PDO::PARAM_STR);
        $this->db->bind(':population', $post["Population"], PDO::PARAM_INT);
        return $this->db->execute();
    }
}
