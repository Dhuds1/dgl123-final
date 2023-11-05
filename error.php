<?php 
require "partials/head.php";
require "partials/nav.php";
?>
<style>
    .error__center-page {
        width: 100%;
        height: 100vh;
        background-color: pink;
        display: flex;
        position: absolute;
        top: 0;
        flex-direction: column; 
        justify-content: center;
        align-items: center;
    }
</style>
<div class="error__center-page">
    <h2>Error 404 Page not found</h2>
    <a href="index">Go back home</a>
</div>

<?php require "partials/footer.php"; ?>