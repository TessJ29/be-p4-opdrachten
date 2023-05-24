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
    <table>
        <thead>
            <tr>
                <th>Barcode</th>
                <th>Naam</th>
                <th>Verpakkingseenheid</th>
                <th>Aantal aanwezig</th>
                <th>Allergenen Info</th>
                <th>Leverantie Info</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['producten'] as $product) : ?>
                <tr>
                    <td><?= $product->Barcode ?></td>
                    <td><?= $product->Naam ?></td>
                    <td><?= $product->VerpakkingsEenheid ?></td>
                    <td><?php if($product->AantalAanwezig == NULL) {
                        echo "Geen producten aanwezig";
                    } else {
                        echo $product->AantalAanwezig;
                    }
                    ?></td>
                    <td><a href="<?= URLROOT; ?>/Magazijnen/allergeenInfo/<?= $product->Id ?>"><ion-icon name="close-outline" class="cross"></ion-icon></a></td>
                    <td><a href="<?= URLROOT; ?>/Magazijnen/LeverantieInfo/<?= $product->Naam ?>"><ion-icon name="help-outline" class="question"></ion-icon></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>