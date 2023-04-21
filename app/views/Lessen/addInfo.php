<link rel="stylesheet" href="<?=URLROOT;?>/css/style.css">

<h4>Onderwerp toevoegen</h4>

<form action="<?= URLROOT ?>/lessen/addInfo" method="post">
    <label for="info">Opmerking</label><br>
    <input type="text" name="info" id="info"><br>
    <div class="lesInfoError"><?= $data['lesInfoError'];?></div>
    <br>
    <input type="hidden" name="lesId" value="<?= $data['lesId']; ?>"><br>
    <input type="submit" value="Toevoegen">
</form>