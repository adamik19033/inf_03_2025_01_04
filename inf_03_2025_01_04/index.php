<?php
    $conn = new mysqli("localhost" "root" "" "obuwie");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Obuwie</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <h1>Obuwie męskie</h1>
        </header>

        <main>
            <form action="zamow.php" method="post">
                <label for="model">Model: </label>
                <select name="model" id="model" class="kontrolki">
                    <?php
                        $sql = "SELECT model FROM produkt;";
                        $result = $conn -> query($sql);
                        while ($row = $result -> fetch_assoc()) {
                            echo "<option value='" . $row['model'] . "'>" . $row['model'] . "</option>";
                        }
                    ?>
                </select>
                <label for="rozmiar">Rozmiar: </label>
                <select name="rozmiar" id="rozmiar" class="kontrolki">
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                </select>
                <label for="liczba">Liczba par: </label>
                <input type="number" name="liczba" id="liczba" class="kontrolki">
                <input type="submit" value="Zamów" class="kontrolki">
            </form>
            <?php
                $sql = "SELECT model, nazwa, cena, nazwa_pliku FROM buty JOIN produkt USING(model);";
                $result = $conn -> query($sql);
                while ($row = $result -> fetch_assoc()) {
                    echo "<div class='buty'>";
                        echo "<img src='" . $row['nazwa_pliku'] . "' alt='but męski'>";
                        echo "<h2>" . $row['nazwa'] . "</h2>";
                        echo "<h5>Model: " . $row['model'] . "</h5>";
                        echo "<h4>Cena: " . $row['cena'] . " zł</h4>";
                    echo "</div>";
                }
            ?>
        </main>

        <footer>
            <p>Strone wykonał: Adam Galikowski</a></p>
        </footer>
    </body>
</html>

<?php
    $conn -> close();
?>