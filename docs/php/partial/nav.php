<nav class="nav__bar-main">
    <ul>
        <li class="logo">
            <a href="index"><span>🦄</span> <h2>Cracked Unicorn</h2></a>
        </li>
        <form method="get" class="search__bar-wrapper">
            <div class="search__bar">
                <input class="search__bar-input" name="search_bar" type="text" placeholder="Search"><button
                    type="submit" for="search_bar" class="search__bar-button">🔍</button>
            </div>
        </form>
        <div>
            <?php if ($user_logged): ?>
                <li>
                    <a href=<?= "cart" ?>>🛒</a>
                </li>
                <li>
                    <a href=<?= "wishlist" ?>>❤️</a>
                </li>
                <li class="account">
                    <a><h3>welcome, <b><?= $user_name ?></b></h3></a>
                </li>
                <li>
                    <a href=<?= "/profile?$user_name" ?>>👤</a>
                </li>
                <li>
                    <a href=<?= "/profile-settings?$user_name" ?>>⚙️</a>
                </li>
            <?php else: ?>
                <li>
                    <a href='loginSignup'>Login or SignUp</a>
                </li>
            <?php endif; ?>
        </div>
    </ul>
</nav>