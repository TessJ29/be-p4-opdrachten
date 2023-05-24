<?php


class Magazijn
{
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

    public function getLeveranciers()
    {
        try {
            $this->db->query("SELECT 
            Leverancier.Id,
            Leverancier.Naam,
            Leverancier.ContactPersoon,
            Leverancier.LeverancierNummer,
            Leverancier.Mobiel,
            ProductPerLeverancier.Id AS pplId,
            COUNT(ProductPerLeverancier.ProductId) AS Aantal
            FROM Leverancier
            LEFT JOIN ProductPerLeverancier ON ProductPerLeverancier.LeverancierId = Leverancier.Id
            GROUP BY Leverancier.Naam
            ORDER BY Aantal DESC;");
            $leveranciers = $this->db->resultSet();
            return $leveranciers;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getLeverancierById($leverancierId)
    {
        try {
            $this->db->query("SELECT
            Id,
            Naam,
            ContactPersoon,
            LeverancierNummer,
            Mobiel
            FROM Leverancier WHERE Id = :leverancierId");
            $this->db->bind(':leverancierId', $leverancierId);
            $leverancier = $this->db->single();
            return $leverancier ?? [];
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getGeleverdeProducten($leverancierId)
    {
        try {
            $this->db->query("SELECT 
                Product.Id AS productId,
                Product.Naam,
                Magazijn.Id AS magazijnId,
                Magazijn.AantalAanwezig,
                Magazijn.VerpakkingsEenheid,
                ProductPerLeverancier.Id AS pplId,
                ProductPerLeverancier.DatumLevering,
                ProductPerLeverancier.LeverancierId AS LeverancierId
                FROM Product
                INNER JOIN ProductPerLeverancier ON ProductPerLeverancier.ProductId = Product.Id
                INNER JOIN Magazijn ON Magazijn.ProductId = Product.Id
                WHERE ProductPerLeverancier.LeverancierId = :leverancierId
                ORDER BY Magazijn.AantalAanwezig DESC
            ");
            $this->db->bind(':leverancierId', $leverancierId);
            $producten = $this->db->resultSet();
            return $producten ?? [];
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getAantalAanwezig($leverancierId, $productId)
    {
        try {
            $this->db->query("SELECT Magazijn.AantalAanwezig FROM ProductPerLeverancier INNER JOIN Magazijn ON Magazijn.ProductId = ProductPerLeverancier.ProductId WHERE ProductPerLeverancier.LeverancierId = :leverancierId AND ProductPerLeverancier.ProductId = :productId");
            $this->db->bind(':leverancierId', $leverancierId);
            $this->db->bind(':productId', $productId);
            $aantal = $this->db->single();
            return $aantal;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function nieuweLevering($leverancierId, $productId, $nieuweAantal, $presentDate, $post)
    {
        if ($post["DatumEerstVolgendeLevering"] > $presentDate) {
            try {
                $this->db->query("UPDATE Magazijn AS M
                JOIN ProductPerLeverancier AS PPL ON M.ProductId = PPL.ProductId
                SET M.AantalAanwezig = :aantal, PPL.DatumLevering = :datumLevering
                WHERE PPL.LeverancierId = :leverancierId AND M.ProductId = :productId");
                $this->db->bind(':aantal', $nieuweAantal);
                $this->db->bind(':datumLevering', $post["DatumEerstVolgendeLevering"]);
                $this->db->bind(':leverancierId', $leverancierId);
                $this->db->bind(':productId', $productId);
                $this->db->execute();
                
                if ($this->db->rowCount() == 0) {
                    echo "Levering is succesvol gewijzigd.";
                    header('Refresh:3; url=' . URLROOT . '/magazijnen/geleverdeProducten/' . $leverancierId);
                } else {
                    echo "Er is iets fout gegaan bij het updaten van de levering.";
                }
            } catch (PDOException $e) {
                $e->getMessage();
                echo "Er is iets fout gegaan.";
            }
        } else {
            echo "Deze datum ligt in het verleden, graag een nieuwe datum invoeren.";
            header('Refresh:3; url=' . URLROOT . '/magazijnen/nieuweLevering/' . $leverancierId . '/' . $productId);

        }
    }
}
