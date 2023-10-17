<?php
    $user_logged = false;
    $user_store = false;
?>
<div class="search__bar-wrapper"><input class="search__bar" name="search__bar" type="text" placeholder="Search"><button for="search__bar" class="search__bar-button">Search</button></div>
<nav class="nav__bar-main">
    <h1>Hello, <?= $user_name ?>!</h1>
    <ul>
        <div>
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="">Wishlist</a>
            </li>
            <li>
                <a href="">Store</a>
            </li>
            <?php
            if($user_logged && $user_store){
                echo "
                <div>
                <li>
                <a href=''>Manage Store</a>
                </li>
                <li>
                <a href=''>Manage Products</a>
                </li>
                </div>";
            }
            else {
                echo "
                <div>
                <li>
                <a href=''>Create Store</a>
                </li>
                </div>
                ";
            }
            ?>
            </div>
        <div>
            <li>
                <a href="">Profile</a>
            </li>
            <li>
                <a href="">Settings</a>
            </li>
        </div>
    </ul>
</nav>