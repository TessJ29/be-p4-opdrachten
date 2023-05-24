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
        <h3>Contactpersoon Leverancier: <?= $data['ContactPersoon'] ?></h3>
        <h3>Leverancier nummer: <?= $data['LeverancierNummer'] ?></h3>
        <h3>Mobiel: <?= $data['Mobiel'] ?></h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>Naam Product</th>
                <th>Datum Laatste levering</th>
                <th>Aantal</th>
                <th>Eerstvolgende levering</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['info'] as $info) : ?> 
                <tr>
                    <td><?= $info->Naam ?></td>
                    <td><?= $info->DatumLevering ?></td>
                    <td><?= $info->Aantal ?></td>
                    <td><?= $info->DatumEerstVolgendeLevering ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2 class="ErrorMessage"><?= $data['ErrorMessage']?></h2>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>