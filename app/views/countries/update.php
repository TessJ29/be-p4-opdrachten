<?= $data['title']; ?>

<form action="<?= URLROOT; ?>/countries/update" method="POST">
    <table>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="Name" id="Name" value="<?= $data["row"]->Name; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="CapitalCity" id="CapitalCity" value="<?= $data["row"]->CapitalCity; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <select name="Continent">
                        <option value="Europa" value="<?= $data["row"]->Continent; ?>">Europa</option>
                        <option value="Azie" value="<?= $data["row"]->Continent; ?>">Azie</option>
                        <option value="Noord Amerika" value="<?= $data["row"]->Continent; ?>">Noord Amerika</option>
                        <option value="Zuid Amerika" value="<?= $data["row"]->Continent; ?>">Zuid Amerika</option>
                        <option value="Oceanie" value="<?= $data["row"]->Continent; ?>">Oceanie</option>
                        <option value="Antartica" value="<?= $data["row"]->Continent; ?>">Antartica</option>
                        <option value="Afrika" value="<?= $data["row"]->Continent; ?>">Afrika</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="number" name="Population" id="Population" value="<?= $data["row"]->Population; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Id" value="<?= $data["row"]->Id; ?>">
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