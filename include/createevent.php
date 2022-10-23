        <form action="include/createevent-action.php" method="post">
            <fieldset class="flex-column">
                <legend style="font-size: 20px;">Tworzenie nowej akcji charytatywnej</legend>
                <input type="text" name="city" class="input-text" placeholder="Miasto">
                <input type="text" name="title" class="input-text" placeholder="Tytuł">
                <textarea name="description" class="input-text input-textarea" placeholder="Opis"></textarea>
                <input type="text" name="image" class="input-text" placeholder="URL zdjęcia (opcjonalne)">
                <input type="submit" name="submit" class="input-submit" value="Stwórz">
            </fieldset>
        </form>
        <?php
            if(isSet($_GET['error'])){
                if($_GET['error'] == "emptyinput"){
                    echo '<p class="error-message">Wypełnij wszystkie pola!</p>';
                }
                else if($_GET['error'] == "invalidcity"){
                    echo '<p class="error-message">Nie ma takiego miasta w bazie danych!</p>';
                }
            }
        ?>
    </main>
    <?php include_once "include/footer.php" ?>
</body>
</html>