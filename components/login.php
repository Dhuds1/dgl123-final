<?php if($_SESSION['username']){
    header('Location: index');
    exit();
}
?>
<form action="controller/process_login.php" onsubmit="" method="post">
    <label for="username_or_email">Username or Email:</label>
    <input type="text" id="username_or_email" name="username_or_email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form> 