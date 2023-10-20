<nav class="nav__bar-main">
    <ul class="nav_content">
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
                    <a href=<?= "wishlist" ?>>❤️</a>
                </li>
                <li>
                    <a href=<?= "updates" ?>>🔔&#9660;</a>
                </li>
                    <li id="accountDropDown"><a>👤&#9660;</a>
                        <ul class="dropDown">
                            <li class="account">
                                <a>
                                <h2>Welcome, <?= $user_name ?></h2>
                                <h3>Account</h3>
                                </a>
                            </li>
                            <li>Hi</li>
                            <li>Hi</li>
                            <li>Hi</li>
                            <li>Hi</li>
                        </ul>
                    </li>
            <?php else: ?>
                <li class="account">
                    <a href='loginSignup'><h3>welcome, <b>Login</b></h3></a>
                </li>
            <?php endif; ?>
            <li>
                <a href=<?= "cart" ?>>🛒</a>
            </li>
        </div>
    </ul>
</nav>