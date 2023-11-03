<?php require "basic.vars.php" ?>
<header class="header__home">
    <h1>Test</h1>
</header>
<div class="page__content-wrapper">
    <h2 class="store__card--title">Top Stores</h2>
    <section class="store__card--wrapper">
        <?php require "components/top-stores.php" ?>
    </section>
    <h2 class="store__card--title">Browse Products</h2>
    <section>
        <?php require "components/product.loader.php" ?>
    </section>
</div>  