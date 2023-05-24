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
                <th>Naam</th>
                <th>ContactPersoon</th>
                <th>Leverancier nummer</th>
                <th>Mobiel</th>
                <th>Aantal verschillende producten</th>
                <th>Toon producten</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['leverancier'] as $leverancier) : ?>
                <tr>
                    <td><?= $leverancier->Naam ?></td>
                    <td><?= $leverancier->ContactPersoon ?></td>
                    <td><?= $leverancier->LeverancierNummer ?></td>
                    <td><?= $leverancier->Mobiel ?></td>
                    <td><?= $leverancier->Aantal ?></td>
                    <td><a href="<?= URLROOT; ?>/Magazijnen/GeleverdeProducten/<?= $leverancier->Id ?>"><ion-icon name="cube-outline"></ion-icon></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="buttons" style="text-align: right;">
        <button class="home"><a href="<?=URLROOT;?>/index">Home</a></button>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>