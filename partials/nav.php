<div class="nav__spacer"></div>
<nav class="nav-bar-main">
    <ul class="nav-bar__content">
        <li class="nav-bar__logo">
            <a href="index"><span>🦄</span>
                <h2>Cracked Unicorn</h2>
            </a>
        </li>
        <form method="get" class="search-bar__wrapper">
            <input class="search-bar__input" name="search-bar" type="text" placeholder="Search" autocomplete="off">
            <button type="submit" for="search-bar" class="search-bar__button">🔍</button>
        </form>
        <div class="nav-bar__actions">
            <li class="nav-bar__item">
                <a href="cart">🛒</a>
            </li>
            <!-- if they're logged in display this -->
            <?php if (isset($_SESSION['username'])): ?>

                <li id="accountDropDown" class="nav-bar__item accountDropDown">
                    <a>👤&#9660;</a>
                    <ul id="dropDownList" class="nav-bar__dropdown">
                        <a href="profile">
                            <li class="dropdown__item account">
                                <div class="profile__picture-menu grid__row--span-2 grid__align--center">
                                <!-- for some reason this now works and doesn't cause header issues -->
                                <img src="data:image/jpeg;base64,<?= isset($_SESSION['pfp'])?base64_encode($_SESSION['pfp']):'' ?>" alt="">
                                </div>
                                <h3>Welcome, <b>
                                        <?= $_SESSION['username'] ?>
                                    </b></h3>
                                <p>View Profile</p>
                            </li>
                        </a>
                        <a class="disabled" href="">
                            <li class="dropdown__item dropdown__devider-both">Order History</li>
                        </a>
                        <!-- if they have a store display this -->
                        <?php if ($_SESSION['store']): ?>
                            <span class="dropdown__list">
                                <a href="store?name=<?= $_SESSION['store'] ?>">
                                    <li>Store</li>
                                </a>
                                <a href="manage-store">
                                    <li class="dropdown__list-item">Manage Store</li>
                                </a>
                                <a href="manage-products">
                                    <li class="dropdown__list-item">Manage Products</li>
                                </a>
                                <a class="disabled" href="#">
                                    <li class="dropdown__list-item">Orders</li>
                                </a>
                            </span>
                            <!-- if they don't have a store display this -->
                        <?php else: ?>
                            <a href="create-store">
                                <li>Create Store</li>
                            </a>
                        <?php endif; ?>
                        <a href="account">
                            <li class="dropdown__item">Account</li>
                        </a>
                        <a href="logout">
                            <li class="dropdown__item">Sign Out</li>
                        </a>
                    </ul>
                </li>
                <!-- if they're not logged in display this -->
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