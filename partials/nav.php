<?php
session_start();
?>
<div class="nav__spacer"></div>
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
            <?php if (isset($_SESSION['username'])): ?>
                <li class="nav-bar__item">
                    <a href="wishlist?<?= $SESSION['username']?>">❤️</a>
                </li>
                <li class="nav-bar__item">
                    <a href="updates">🔔&#9660;</a>
                </li>
                <li id="accountDropDown" class="nav-bar__item accountDropDown">
                    <a>👤&#9660;</a>
                    <ul id="dropDownList" class="nav-bar__dropdown">
                        <a href="profile?name=<?= $_SESSION['username']?>">
                            <li class="dropdown__item account">
                                <div class="profile__picture-menu grid__row--span-2 grid__align--center">
                                    PFP
                                </div>
                                <h3>Welcome, <b><?= $_SESSION['username'] ?></b></h3>
                                <p>View Profile</p>
                            </li>
                        </a>
                            <a href="">
                                <li class="dropdown__item dropdown__devider-both">Order History</li>
                            </a>
                        <?php if ($_SESSION['store']): ?>
                            <span class="dropdown__list">
                                <a href="store?name=<?= $_SESSION['store'] ?>"><li>Store</li></a>
                                <a href="manage-store"><li class="dropdown__list-item">Manage Store</li></a>
                                <a href="manage-products"><li class="dropdown__list-item">Manage Products</li></a>
                                <a href="#"><li class="dropdown__list-item">Orders</li></a>
                            </span>
                        <?php else: ?>
                            <a href="create-store"><li>Create Store</li></a>
                        <?php endif; ?>
                        <a href="account-settings"><li class="dropdown__item">Account Settings</li></a>
                        <a href="logout"><li class="dropdown__item">Sign Out</li></a>
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
