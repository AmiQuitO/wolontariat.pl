<?php include_once "include/header.php" ?>
        <form action="include/login-action.php" method="post">
            <fieldset class="flex-column">
                <legend>Logowanie</legend>
                <input type="text" name="username" class="input-text" id="input-login" placeholder="Nazwa użytkownika" maxlength="10">
                <input type="password" name="password"class="input-text" id="input-password" placeholder="Hasło" maxlength="20">
                <input type="submit" name="submit" class="input-submit" value="Zaloguj się">
                <p style="text-align:center;">nie masz konta? <a href="register.php">zarejestruj się</a></p>
            </fieldset>
        </form>
        <?php
            if(isSet($_GET['error'])){
                if($_GET['error'] == "emptyinput"){
                    echo '<p class="error-message">Wypełnij wszystkie pola!</p>';
                }
                else if($_GET['error'] == "wronglogin"){
                    echo '<p class="error-message">Niepoprawna nazwa użytkownika!</p>';
                }
                else if($_GET['error'] == "wrongpassword"){
                    echo '<p class="error-message">Niepoprawne hasło!</p>';
                }
            }
        ?>
    </main>
    <?php include_once "include/footer.php" ?>
</body>
</html>