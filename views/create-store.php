<?php
if (!$_SESSION['username']){
    header('Location: index');
    exit();
}
if($_SESSION['store']) {
    header('Location: index');
    exit();
}
echo isset($_SESSION['error'])? $_SESSION['error']: '';
if (isset($_SESSION['success']['clean'])) {
    echo "Availale! <br>";
    echo "Name: ".$_SESSION['success']['clean'] . '<br>';
}

if (isset($_SESSION['success']['slug'])) {
    echo "Slug: ".$_SESSION['success']['slug'];
}

?>
<?php if(!isset($_SESSION['success'])): ?>
<form action="controller/check-store.php" method="post">
    <label for="check_store_name">Store</label>
    <input name="check_store_name" id="check_store_name" type="text" value="<?= isset($_SESSION['store_name'])? $_SESSION['store_name']: '' ?>">
    <button type="submit">Check Name</button>
</form>
<?php endif ?>
<?php if(isset($_SESSION['success'])): ?>
    <form action="controller/create-store.php" method="post">
        <!-- Hidden input field to submit store_name to the new form -->
        <input type="hidden" name="store_name" value="<?= $_SESSION['success']['clean'] ?>">
        <input type="hidden" name="slug" value="<?= $_SESSION['success']['slug'] ?>">
        <button type="reset" onclick="clearSession()">Clear</button>
        <br>
        <button type="submit">Set name</button>
    </form>
<?php endif ?>
<?php
$_SESSION['error'] = null;
$_SESSION['success'] = null;
?>
<script>
function clearSession() {
    // Clear the session variable using JavaScript and reloads page
    <?php $_SESSION['success'] = null; ?>
    location.reload();
}
</script>