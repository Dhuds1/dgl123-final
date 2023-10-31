<script>
    function handleSubmit() {
        event.preventDefault();
        return false;
    }
</script>
<form action="controller/process_signup.php" onsubmit="return handleSubmit();" method="post">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="email_confirm">Confirm Email:</label>
    <input type="email" id="email_confirm" name="email_confirm" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="password_confirm">Confirm Password:</label>
    <input type="password" id="password_confirm" name="password_confirm" required><br><br>

    <input type="submit" value="Sign Up">
</form>
