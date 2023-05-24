<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <title>Magazijn Jamin</title>
</head>

<body>
    <h1><?= $data['title']; ?></h1>
    <div class="LeverancierInfo">
        <h3>Naam leverancier: <?= $data['LeverancierNaam'] ?></h3>
        <h3>Contact persoon: <?= $data['ContactPersoon'] ?></h3>
        <h3>Leverancier nr: <?= $data['LeverancierNummer'] ?></h3>
        <h3>Mobiel: <?= $data['Mobiel'] ?></h3>
    </div>

    <form action="<?= URLROOT ?>/magazijnen/nieuweLevering/<?= $data["LeverancierId"]?>/<?= $data["ProductId"]?>" method="post">
        <div>
            <label for="Aantal">Aantal producteenheden</label>
            <input type="number" name="Aantal" id="Aantal" required>
            <br>
            <br>
            <label for="DatumEerstVolgendeLevering">Datum eerst volgende levering</label>
            <input type="date" name="DatumEerstVolgendeLevering" id="DatumEerstVolgendeLevering" required>

            <input type="hidden" name="LeverancierId" value="<?= $data["LeverancierId"] ?>">
            <input type="hidden" name="ProductId" value="<?= $data["ProductId"] ?>">

        </div>
        <div class="submit" style="width: 25%; margin: 1rem 0rem; display: flex; justify-content: space-between;">
            <input type="submit" value="Sla op" style="padding: .75rem 3rem; text-decoration: none; font-size: 16px;">
            <div>
                <button style="padding: .74rem 2rem; font-size: 16px;"><a href="<?= URLROOT ?>/Magazijnen/geleverdeProducten/<?=$data["LeverancierId"];?>" style="text-decoration: none;">Terug</a></button>
                <button style="padding: .74rem 2rem; font-size: 16px;"><a href="<?= URLROOT ?>/index" style="text-decoration: none;">Home</a></button>
            </div>
        </div>
    </form>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>