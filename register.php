<?php include_once "include/header.php" ?>
        <form action="include/register-action.php" method="post">
            <fieldset class="flex-column">
                <legend>Rejestracja</legend>
                <input type="text" name="username" class="input-text" id="input-login" placeholder="Nazwa użytkownika" maxlength="10">
                <input type="number" name="phone-number" class="input-text" id="input-phonenumber" placeholder="Numer telefonu">
                <input type="password" name="password" class="input-text" id="input-password" placeholder="Hasło" maxlength="20">
                <input type="password" name="repeat-password" class="input-text" id="input-password" placeholder="Powtórz hasło" maxlength="20">
                <p class="input-radio-text"><input type="radio" name="user-type" value="volunteer" checked> wolontariusz
                <input type="radio" name="user-type" value="organizer" style="margin-left:10px"> organizator</p>
                <input type="submit" name="submit" class="input-submit" value="Zarejestruj się">
            </fieldset>
        </form>
        <?php
            if(isSet($_GET['error'])){
                if($_GET['error'] == "emptyinput"){
                    echo '<p class="error-message">Wypełnij wszystkie pola!</p>';
                }
                else if($_GET['error'] == "invalidusername"){
                    echo '<p class="error-message">Nazwa użytkownika jest niepoprawna!</p>';
                }
                else if($_GET['error'] == "invalidphonenumber"){
                    echo '<p class="error-message">Numer telefonu jest niepoprawny!</p>';
                }
                else if($_GET['error'] == "passwordsdontmatch"){
                    echo '<p class="error-message">Hasła nie są identyczne!</p>';
                }
                else if($_GET['error'] == "usernameorphonenumbertaken"){
                    echo '<p class="error-message">Nazwa użytkownika lub telefon jest już zajęty!</p>';
                }
                else if($_GET['error'] == "stmtfailed"){
                    echo '<p class="error-message">Coś poszło nie tak, spróbuj ponownie później!</p>';
                }
                else if($_GET['error'] == "none"){
                    echo '<p class="success-message">Zarejestrowano pomyślnie!</p>';
                }
            }
        ?>
    </main>
    <?php include_once "include/footer.php" ?>
</body>
</html>