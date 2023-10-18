<form method="get" class="search__bar-wrapper"><input class="search__bar" name="search_bar" type="text" placeholder="Search"><button type="submit" for="search_bar" class="search__bar-button">Search</button>
</form>
<nav class="nav__bar-main">
    <h1>Welcome<?php
        if($user_name){
           echo ", $user_name";
        }
    ?>!</h1>
    <ul>
        <div>
            <li>
                <a href="/">Home</a>
            </li>
            <?php
            if($user_logged){
                echo
                "
                <li>
                    <a href='$user_name'>Wishlist</a>
                </li>
                ";
            }
            ?>
            <?php if($user_logged && $user_store): ?>
                echo "
                <div>
                <li>
                <a href=<?=$store_info['info']?>>Store</a>
                </li>
                <li>
                <a href=''>Manage Store</a>
                </li>
                <li>
                <a href='$store_name/products'>Manage Products</a>
                </li>
                </div>

            <?php elseif($user_logged && !$user_store): ?>
                <div>
                <li>
                <a href='createStore'>Create Store</a>
                </li>
                </div>
            <?php endif; ?>
            </div>
            <div>
            <?php if($user_logged): ?>
            <li>
            <a href=''>Profile</a>
            </li>
            <li>
            <a href=''>Settings</a>
            </li>
            <?php else: ?>
                echo "
                <li>
                <a href='loginSignup'>Login or SignUp</a>
                </li>
            <?php endif; ?>
        </div>
    </ul>
</nav>