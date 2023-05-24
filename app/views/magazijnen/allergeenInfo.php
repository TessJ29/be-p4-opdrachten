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
    <div class="AllergeenInfo">
        <h3>Naam: <?= $data['Naam'] ?></h3>
        <h3>Barcode: <?= $data['Barcode'] ?></h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Omschrijving</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['allergeenInfo'] as $info) : ?>
                <tr>
                    <td><?= $info->Naam ?></td>
                    <td><?= $info->Omschrijving ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2 class="ErrorMessage"><?= $data['ErrorMessage'] ?></h2>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>