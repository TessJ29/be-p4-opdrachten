-- Step: 01
-- Goal: Create a new database jamin
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/

-- Check if the database exists
DROP DATABASE IF EXISTS `jamin`;

-- Create a new Database
CREATE DATABASE IF NOT EXISTS `jamin`;

-- Use database jamin
Use `jamin`;

-- Step: 02
-- Goal: Create a new table Product
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/

-- Drop table Product
DROP TABLE IF EXISTS Product;
CREATE TABLE Product (
    Id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    Naam VARCHAR(50) NOT NULL,
    Barcode VARCHAR(15) NOT NULL,
    IsActive BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(500) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL,
    CONSTRAINT PK_Product_Id PRIMARY KEY CLUSTERED(Id)
)ENGINE=InnoDB;


-- Step: 03
-- Goal: Fill table Product with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/

INSERT INTO Product
(
     Naam
    ,Barcode
    ,IsActive
    ,Opmerking
    ,DatumAangemaakt
    ,DatumGewijzigd
)
VALUES
     ('Mintnopjes', '8719587231278', 1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Schoolkrijt', '8719587326713', 1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Honingdrop', '8719587327836', 1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Zure Beren', '8719587321441',1,NULL, SYSDATE(6), SYSDATE(6))
    ,('Cola Flesjes', '8719587321237',1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Turtles', '8719587322245',1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Witte Muizen', '8719587328256',1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Reuzen Slangen', '8719587325641',1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Zoute Rijen', '8719587322739',1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Winegums', '8719587327527',1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Drop Munten', '8719587322345',1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Kruis Drop', '8719587322265',1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Zoute Ruitjes', '8719587323256',1, NULL, SYSDATE(6), SYSDATE(6));

-- Step: 04
-- Goal: Create a new table Allergeen
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/

-- Drop table Allergeen
DROP TABLE IF EXISTS Allergeen;
CREATE TABLE Allergeen (
    Id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    Naam VARCHAR(50) NOT NULL,
    Omschrijving VARCHAR(500) NOT NULL,
    IsActive BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(500) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL,
    CONSTRAINT PK_Allergeen_Id PRIMARY KEY CLUSTERED(Id)
)ENGINE=InnoDB;


-- Step: 05
-- Goal: Fill table Allergeen with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/

INSERT INTO Allergeen
(
     Naam
    ,Omschrijving
    ,IsActive
    ,Opmerking
    ,DatumAangemaakt
    ,DatumGewijzigd
)
VALUES
     ('Gluten', 'Dit product bevat gluten', 1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Gelatine', 'Dit product bevat gelatine', 1, NULL, SYSDATE(6), SYSDATE(6))
    ,('AZO-Kleurstof', 'Dit product bevat AZO-Kleurstof', 1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Lactose', 'Dit product bevat lactose',1,NULL, SYSDATE(6), SYSDATE(6))
    ,('Soja', 'Dit product bevat soja',1,NULL, SYSDATE(6), SYSDATE(6));

-- Step: 06
-- Goal: Create a new table Leverancier
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/

-- Drop table Leverancier
DROP TABLE IF EXISTS Leverancier;
CREATE TABLE Leverancier (
    Id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    Naam VARCHAR(50) NOT NULL,
    ContactPersoon VARCHAR(100) NOT NULL,
    LeverancierNummer VARCHAR(15) NOT NULL,
    Mobiel VARCHAR(11) NOT NULL,
    IsActive BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(500) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL,
    CONSTRAINT PK_Leverancier_Id PRIMARY KEY CLUSTERED(Id)
)ENGINE=InnoDB;


-- Step: 07
-- Goal: Fill table Leverancier with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/

INSERT INTO Leverancier
(
     Naam
    ,ContactPersoon
    ,LeverancierNummer
    ,Mobiel
    ,IsActive
    ,Opmerking
    ,DatumAangemaakt
    ,DatumGewijzigd
)
VALUES
     ('Venco', 'Bert van Linge', 'L1029384719', '06-28493827', 1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Astra Sweets', 'Jasper del Monte', 'L1029284315', '06-39398734', 1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Haribo', 'Sven Stalman', 'L1029324748', '06-24383291', 1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Basset', 'Joyce Stelterberg', 'L1023845773', '06-48293823', 1, NULL, SYSDATE(6), SYSDATE(6))
    ,('De Bron', 'Remco Veenstra', 'L1023857736', '06-34291234', 1, NULL, SYSDATE(6), SYSDATE(6))
    ,('Quality Street', 'Johan Nooij', 'L1029234586','06-23458456',1, NULL, SYSDATE(6), SYSDATE(6));


-- Step: 08
-- Goal: Create a new table Magazijn
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/


-- Drop table Magazijn
DROP TABLE IF EXISTS Magazijn;
CREATE TABLE Magazijn (
    Id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    ProductId TINYINT UNSIGNED NOT NULL,
    VerpakkingsEenheid VARCHAR(10) NOT NULL,
    AantalAanwezig INT NULL,
    IsActive BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(500) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL,
    CONSTRAINT PK_Magazijn_Id PRIMARY KEY CLUSTERED(Id)
    ,CONSTRAINT FK_Magazijn_productId_product_id FOREIGN KEY(ProductId) REFERENCES Product(Id)
)ENGINE=InnoDB;

-- Step: 09
-- Goal: Fill table Magazijn with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/

INSERT INTO Magazijn
(
     ProductId
    ,VerpakkingsEenheid
    ,AantalAanwezig
    ,IsActive
    ,Opmerking
    ,DatumAangemaakt
    ,DatumGewijzigd
)
VALUES
     (1,'5 kg',453, 1, NULL, SYSDATE(6), SYSDATE(6))
    ,(2,'2,5 kg',400, 1, NULL, SYSDATE(6), SYSDATE(6))
    ,(3,'5 kg',1, 1, NULL, SYSDATE(6), SYSDATE(6))
    ,(4,'1 kg',800,1,NULL, SYSDATE(6), SYSDATE(6))
    ,(5,'3 kg',234,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(6,'2 kg',345,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(7,'1 kg',795,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(8,'10 kg',233,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(9,'2,5 kg',123,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(10,'3 kg',NULL,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(11,'2 kg',367,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(12,'1 kg',467,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(13,'5 kg',20,1, NULL, SYSDATE(6), SYSDATE(6));

-- Step: 10
-- Goal: Create a new table ProductPerAllergeen
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/


-- Drop table ProductPerAllergeen
DROP TABLE IF EXISTS ProductPerAllergeen;
CREATE TABLE ProductPerAllergeen (
    Id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    ProductId TINYINT UNSIGNED NOT NULL,
    AllergeenId TINYINT UNSIGNED NOT NULL,
    IsActive BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(500) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL,
    CONSTRAINT PK_ProductPerAllergeen_Id PRIMARY KEY CLUSTERED(Id)
    ,CONSTRAINT FK_ProductPerAllergeen_productId_product_id FOREIGN KEY(ProductId) REFERENCES Product(Id)
    ,CONSTRAINT FK_ProductPerAllergeen_AllergeenId FOREIGN KEY (AllergeenId) REFERENCES Allergeen (Id)
)ENGINE=InnoDB;

-- Step: 11
-- Goal: Fill table ProductPerAllergeen with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/

INSERT INTO ProductPerAllergeen
(
     ProductId
    ,AllergeenId
    ,IsActive
    ,Opmerking
    ,DatumAangemaakt
    ,DatumGewijzigd
)
VALUES
     (1,2,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(1,1,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(1,3,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(3,4,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(6,5,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(9,2,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(9,5,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(10,2,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(12,4,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(13,1,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(13,4,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(13,5,1, NULL, SYSDATE(6), SYSDATE(6));

    -- Step: 12
-- Goal: Create a new table ProductPerLeverancier
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/


-- Drop table ProductPerLeverancier
DROP TABLE IF EXISTS ProductPerLeverancier;
CREATE TABLE ProductPerLeverancier (
    Id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    LeverancierId TINYINT UNSIGNED NOT NULL,
    ProductId TINYINT UNSIGNED NOT NULL,
    DatumLevering DATE NOT NULL,
    Aantal INT NOT NULL,
    DatumEerstVolgendeLevering DATE NULL,
    IsActive BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(500) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL,
    CONSTRAINT PK_ProductPerLeverancier_Id PRIMARY KEY CLUSTERED(Id)
    ,CONSTRAINT FK_ProductPerLeverancier_LeverancierId FOREIGN KEY (LeverancierId) REFERENCES Leverancier(Id)
    ,CONSTRAINT FK_ProductPerLeverancier_productId_product_id FOREIGN KEY(ProductId) REFERENCES Product(Id)
)ENGINE=InnoDB;

-- Step: 
-- Goal: Fill table ProductPerLeverancier with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            17-04-2023      Tess Jansen                 New
-- **********************************************************************************/

INSERT INTO ProductPerLeverancier
(
     LeverancierId
    ,ProductId
    ,DatumLevering
    ,Aantal
    ,DatumEerstVolgendeLevering
    ,IsActive
    ,Opmerking
    ,DatumAangemaakt
    ,DatumGewijzigd
)
VALUES
     (1, 1, '2023-04-09', 23, '2023-04-16',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(1, 1, '2023-04-18', 21, '2023-04-25',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(1, 2, '2023-04-09', 12, '2023-04-16',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(1, 3, '2023-04-10', 11, '2023-04-17',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(2, 4, '2023-04-14', 16, '2023-04-21',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(2, 4, '2023-04-21', 23, '2023-04-28',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(2, 5, '2023-04-14', 45, '2023-04-21',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(2, 6, '2023-04-14', 30, '2023-04-21',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(3, 7, '2023-04-12', 12, '2023-04-19',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(3, 7, '2023-04-19', 23, '2023-04-26',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(3, 8, '2023-04-10', 12, '2023-04-17',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(3, 9, '2023-04-11', 1, '2023-04-18',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(4, 10, '2023-04-16', 24, '2023-04-30',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(5, 11, '2023-04-10', 47, '2023-04-17',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(5, 11, '2023-04-19', 60, '2023-04-26',1, NULL, SYSDATE(6), SYSDATE(6))
    ,(5, 12, '2023-04-11', 45, NULL,1, NULL, SYSDATE(6), SYSDATE(6))
    ,(5, 13, '2023-04-12', 23, NULL,1, NULL, SYSDATE(6), SYSDATE(6));