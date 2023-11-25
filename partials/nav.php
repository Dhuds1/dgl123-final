<?php $user_logged = false?>
<div class="nav__spacer">a</div>
<nav class="nav-bar-main">
    <ul class="nav-bar__content">
        <li class="nav-bar__logo">
            <a href="index"><span>🦄</span><h2>Cracked Unicorn</h2></a>
        </li>
        <form method="get" class="search-bar__wrapper">
                <input class="search-bar__input" name="search-bar" type="text" placeholder="Search" autocomplete="off">
                <button type="submit" for="search-bar" class="search-bar__button">🔍</button>
        </form>
        <div class="nav-bar__actions">
            <li class="nav-bar__item">
                <a href="cart">🛒</a>
            </li>
            <?php if ($user_logged): ?>
                <li class="nav-bar__item">
                    <a href="wishlist?<?= $SESSION['user']?>">❤️</a>
                </li>
                <li class="nav-bar__item">
                    <a href="updates">🔔&#9660;</a>
                </li>
                <li id="accountDropDown" class="nav-bar__item accountDropDown">
                    <a>👤&#9660;</a>
                    <ul id="dropDownList" class="nav-bar__dropdown">
                        <a>
                            <li class="dropdown__item account">
                                <div class="profile__picture-menu grid__row--span-2 grid__align--center">
                                    PFP
                                </div>
                                <h3>Welcome, <b><?= $user_name ?></b></h3>
                                <p>View Profile</p>
                            </li>
                        </a>
                            <a href="">
                                <li class="dropdown__item dropdown__devider-both">Order History</li>
                            </a>
                        <?php if ($user_store): ?>
                            <span class="dropdown__list">
                                <a href="store-name"><li>Store</li></a>
                                <a href=""><li class="dropdown__list-item">Settings</li></a>
                                <a href=""><li class="dropdown__list-item">Products</li></a>
                                <a href=""><li class="dropdown__list-item">Orders</li></a>
                            </span>
                        <?php else: ?>
                            <li>Create Store</li>
                        <?php endif; ?>
                        <a href=""><li class="dropdown__item">Account Settings</li></a>
                        <a href=""><li class="dropdown__item">Sign Out</li></a>
                    </ul>
                </li>
            <?php else: ?>
                <a href='login'>
                    <li class="nav-bar__item account no-border">
                        <h3>Welcome, <b>Login</b></h3>
                    </li>
                </a>
            <?php endif; ?>
        </div>
    </ul>
</nav>
