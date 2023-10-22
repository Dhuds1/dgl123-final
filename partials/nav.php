<nav class="nav__bar-main">
    <ul class="nav_content">
        <li class="logo">
            <a href="index"><span>🦄</span><h2>Cracked Unicorn</h2></a>
        </li>
        <form method="get" class="search__bar-wrapper">
            <div class="search__bar">
                <input class="search__bar-input" name="search_bar" type="text" placeholder="Search"><button
                    type="submit" for="search_bar" class="search__bar-button">🔍</button>
            </div>
        </form>
        <div>
            <li>
                <a href=<?= "cart" ?>>🛒</a>
            </li>
            <?php if ($user_logged): ?>
                <li>
                    <a href=<?= "wishlist" ?>>❤️</a>
                </li>
                <li>
                    <a href=<?= "updates" ?>>🔔&#9660;</a>
                </li>
                    <li id="accountDropDown" class="accountDropDown"><a>👤&#9660;</a>
                        <ul class="dropDown">
                            <a>
                            <li class="account">
                                <div class="profile__picture-menu grid__row--span-2 grid__align--center">
                                    PFP
                                </div>
                                <h3>Welcome, <b><?= $user_name ?></b></h3>
                                <p>View Profile</p>
                            </li>
                            </a>
                            <span class="dropdown__sub-section-both">
                                <a href="">
                                    <li>Order History</li>
                                </a>
                            </span>
                            <?php if ($user_store): ?>
                            <span class="dropdown__sub-section-bottom">

                                <a href="store"><li>Store</li></a>
                                <a href=""><li class="tab">Settings</li></a>
                                <a href=""><li class="tab">Products</li></a>
                                <a href=""><li class="tab">Orders</li></a>
                            </span>
                            <?php else: ?>
                                <li>Create Store</li>
                            <?php endif; ?>
                            <a href=""><li>Account Settings</li></a>
                            <a href=""><li>Sign Out</li></a>
                        </ul>
                    </li>
            <?php else: ?>
                <a href='loginSignup'>
                <li class="account">
                    <h3>welcome, <b>Login</b></h3>
                </li>
                </a>
            <?php endif; ?>
        </div>
    </ul>
</nav>