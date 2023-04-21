<link rel="stylesheet" href="<?=URLROOT;?>/css/style.css">

<h4>Onderwerp toevoegen</h4>

<form action="<?= URLROOT ?>/lessen/addTopic" method="post">
    <label for="topic">Onderwerp</label><br>
    <input type="text" name="topic" id="topic"><br>
    <div class="topicError"><?= $data['topicError'];?></div>
    <br>
    <input type="hidden" name="lesId" value="<?= $data['lesId']; ?>"><br>
    <input type="submit" value="Toevoegen">
</form>