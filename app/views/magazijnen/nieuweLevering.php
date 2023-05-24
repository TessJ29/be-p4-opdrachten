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

    <form action="<?= URLROOT ?>/magazijnen/nieuweLevering" method="post">
        <div>
            <label for="Aantal">Aantal producteenheden</label>
            <input type="number" name="Aantal" id="Aantal">
            <br>
            <label for="DatumEerstVolgendeLevering">Datum eerst volgende levering</label>
            <input type="date" name="DatumEerstVolgendeLevering" id="DatumEerstVolgendeLevering">
        </div>
        <div class="submit">
            <input type="submit" value="Sla op">
            <button><a href="<?=URLROOT?>/magazijnen/geleverdeProducten">Terug</a></button>
            <button><a href="<?=URLROOT?>/landingpages/index">Home</a></button>
        </div>
        <div class="cancel">


        </div>


    </form>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>