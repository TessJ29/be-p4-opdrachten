<?php


class Magazijn {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    } 
    
    public function getProducts()
    {
        try {
            $this->db->query("SELECT        Product.Id,
                                            Product.Barcode, 
                                            Product.Naam, 
                                            Magazijn.VerpakkingsEenheid, 
                                            Magazijn.AantalAanwezig, 
                                            ProductPerAllergeen.AllergeenId AS ProductPerAllergeenId,
                                            ProductPerLeverancier.Id AS ProductPerLeverancierId 
                                            FROM Product
                                            left JOIN Magazijn ON Magazijn.ProductId = Product.Id
                                            left JOIN ProductPerAllergeen ON ProductPerAllergeen.ProductId = Product.Id
                                            left JOIN ProductPerLeverancier ON ProductPerLeverancier.ProductId = Product.Id
                                            ORDER BY Product.Barcode DESC");
            $products = $this->db->resultSet();
            return $products ?? [];
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getLeverantieInfo($naam) 
    {
        try {
            $this->db->query("SELECT 
            ProductPerLeverancier.Id,
            Product.Naam, 
            ProductPerLeverancier.DatumLevering, 
            ProductPerLeverancier.Aantal,
            ProductPerLeverancier.DatumEerstVolgendeLevering, 
            Leverancier.Id as LeverancierId,
            Leverancier.Naam AS LeverancierNaam,
            Leverancier.ContactPersoon,
            Leverancier.LeverancierNummer,
            Leverancier.Mobiel
            FROM Product
            INNER JOIN ProductPerLeverancier ON ProductPerLeverancier.ProductId = Product.Id
            INNER JOIN Leverancier ON Leverancier.Id = ProductPerLeverancier.LeverancierId
            WHERE Product.Naam = :productNaam
            ORDER BY ProductPerLeverancier.DatumLevering DESC");
            // $this->db->bind(':productPerLeverancierId', $id);
            $this->db->bind(':productNaam', $naam);
            $info = $this->db->resultSet();
            return $info ?? [];
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getAllergeenInfo($productId)
    {
        try {
            $this->db->query("SELECT 
            ProductPerAllergeen.Id,
            Product.Id AS ProductId,
            Allergeen.Id AS AllergeenId,
            Product.Naam,
            Product.Barcode,
            Allergeen.Naam,
            Allergeen.Omschrijving
            FROM ProductPerAllergeen
            INNER JOIN Product ON Product.Id = ProductPerAllergeen.ProductId
            INNER JOIN Allergeen ON Allergeen.Id = ProductPerAllergeen.AllergeenId
            WHERE Product.Id = :productId
            ORDER BY Allergeen.Naam DESC");
            $this->db->bind(':productId', $productId);
            $info = $this->db->resultSet();
            return $info ?? [];
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getProductInfoById($productId)
    {
        try {
            $this->db->query("SELECT 
            Product.Id,
            Product.Naam,
            Product.Barcode
            FROM Product
            WHERE Product.Id = :productId");
            $this->db->bind(':productId', $productId);
            $info = $this->db->resultSet();
            return $info ?? [];
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}