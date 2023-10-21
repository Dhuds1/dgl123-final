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
                            <li class="account">
                                <a>
                                <div class="profile__picture-menu grid__row--span-2 grid__align--center">
                                    PFP
                                </div>
                                <h3>Welcome, <b><?= $user_name ?></b></h3>
                                <p>View Profile</p>
                                </a>
                            </li>
                            <span class="dropdown__sub-section-both">
                                <li>Order History</li>
                            </span>
                            <?php if ($user_store): ?>
                            <span class="dropdown__sub-section-bottom">

                                <li><a href="store">Store</a></li>
                                <li class="tab">Settings</li>
                                <li class="tab">Products</li>
                                <li class="tab">Orders</li>
                            </span>
                            <?php else: ?>
                                <li>Create Store</li>
                            <?php endif; ?>
                            <li>Account Settings</li>
                            <li>Sign Out</li>
                        </ul>
                    </li>
            <?php else: ?>
                <li class="account">
                    <a href='loginSignup'><h3>welcome, <b>Login</b></h3></a>
                </li>
            <?php endif; ?>
        </div>
    </ul>
</nav>