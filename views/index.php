<header class="header__home">
    <img src="images/cracked_background.jpg" alt="">
    <div class="header__home--text-content">
        <h1>Cracked Unicorn</h1>
        <h2>The best place to sell</h2>
    </div>
</header>
<div class="page__content-wrapper">
    <div class="title__wrapper">
        <h2 class="store__card--title">Top Stores</h2>
        <h2 class="store__card--title"><a href="all-stores">View All Stores</a></h2>
    </div>
    <section class="store__card--wrapper">
        <?php require "components/top-stores.php" ?>
    </section>
    <h2 class="store__card--title">Browse Products</h2>
    <section>
        <?php require "components/product.loader.php" ?>
    </section>
</div>  