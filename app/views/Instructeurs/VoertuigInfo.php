<?php require(APPROOT . '/views/includes/header.php'); ?>


<h1><u><?= $data['title']; ?></u></h1>

<p>Naam: <?php echo $data['naam'];?></p>
<h5>Datum in dienst: <?= $data['date']; ?></h5>
<p>Aantal sterren: <?= $data['sterren'];?></p>

<table border='1'>
    <thead>
        <th>Type voertuig</th>
        <th>Type</th>
        <th>Kenteken</th>
        <th>Bouwjaar</th>
        <th>Brandstof</th>
        <th>Rijbewijscategorie</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<br>
<a href="<?= URLROOT; ?>/Instructeurs/index/">
    <input type="button" value="Terug naar overzicht met instructeurs">
</a>

