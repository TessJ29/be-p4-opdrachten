<?php var_dump($data);
$data['title'];
?>

<form action="<?= URLROOT; ?>/countries/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="Name">Naam van het land</label>
                    <input type="text" name="Name" id="Name" placeholder="Name">
            </tr>
            <tr>
                <td>
                    <label for="CapitalCity">Naam van de hoofdstad</label>
                    <input type="text" name="CapitalCity" id="CapitalCity" placeholder="Capital City">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Continent">Naam van de continent</label>
                    <select name="Continent">
                        <option value="Europa">Europa</option>
                        <option value="Azie">Azie</option>
                        <option value="Noord Amerika">Noord Amerika</option>
                        <option value="Zuid Amerika">Zuid Amerika</option>
                        <option value="Oceanie">Oceanie</option>
                        <option value="Antartica">Antartica</option>
                        <option value="Afrika">Afrika</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Population">Hoeveelheid inwoners</label>
                    <input type="number" name="Population" id="Population">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Id" id="Id">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Verzenden">
                </td>
            </tr>
        </tbody>
    </table>
</form>