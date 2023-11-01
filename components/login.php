<script>
    function handleSubmit() {
        event.preventDefault();
        return false;
    }
</script>
<form action="process_login.php" onsubmit="return handleSubmit()" method="post">
    <label for="username_or_email">Username or Email:</label>
    <input type="text" id="username_or_email" name="username_or_email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form> 