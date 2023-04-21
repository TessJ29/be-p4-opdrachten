<?php require(APPROOT . '/views/includes/header.php'); ?>


<?= $data['title']; ?>
<br>
<br>
<a href="<?= URLROOT; ?>/lessen/index">
    <input type="button" value="Terug naar overzicht">
</a>

<h5><?= 'Datum' . $data['date'] . ' Tijd: ' . $data['time']; ?></h5>
<table border='1'>
    <thead>
        <th>Onderwerpen</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<br>

<a href="<?= URLROOT; ?>/lessen/addTopic/<?= $data['lesId']; ?>">
    <input type="button" value="Onderwerp toevoegen">
</a>

<?php require(APPROOT . '/views/includes/footer.php'); ?>