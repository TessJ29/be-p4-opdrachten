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
    <table>
        <thead>
            <tr>
                <th>Naam product</th>
                <th>Aantal in Magazijn</th>
                <th>Verpakkingseinheid</th>
                <th>Laatste levering</th>
                <th>Nieuwe levering</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['producten'] as $product) : ?>
                <tr>
                    <td><?= $product->Naam ?></td>
                    <td><?= $product->AantalAanwezig ?></td>
                    <td><?= $product->VerpakkingsEenheid ?></td>
                    <td><?= $product->DatumLevering ?></td>
                    <td><a href="<?= URLROOT; ?>/Magazijnen/nieuweLevering/<?= $product->LeverancierId ?>/<?= $product->productId ?>"><ion-icon name="add-outline"></ion-icon></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h4><?= $data['Message']?></h4>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>