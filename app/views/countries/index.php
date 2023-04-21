<?php echo $data["title"];

?>
<div>
    <button>
        <a href="<?= URLROOT; ?>/countries/create">Voeg een nieuw land toe</a>
    </button>
</div>
<table>
    <thead>
        <th>id</th>
        <th>Land</th>
        <th>capital</th>
        <th>Continent</th>
        <th>Population</th>
        <th>Update</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?= $data['countries'] ?>
    </tbody>
</table>

<button>
    <a href="<?= URLROOT; ?>/homepages/index">Terug</a>
</button>