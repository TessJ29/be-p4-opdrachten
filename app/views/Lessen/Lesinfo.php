<?php $data['title']; ?>
<br>
<a href="<?= URLROOT; ?>/lessen/index">
    <input type="button" value="Terug naar les overzicht"></a>
<table border='1'>
    <thead>
        <th>Opmerkingen</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<br>

<a href="<?= URLROOT; ?>/lessen/addInfo/<?= $data['lesId']; ?>">
    <input type="button" value="Opmerking toevoegen">
</a>