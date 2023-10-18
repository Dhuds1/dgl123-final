<nav class="nav__bar-main">
    <h1>Welcome<?php
        if($user_name){
           echo ", $user_name";
        }
    ?>!</h1>
    <ul>
        <div>
            <li>
                <a href="/index">Home</a>
            </li>
            <?php if($user_logged): ?>
                <li>
                    <a href=<?= "$user_name/wishlist" ?>>Wishlist</a>
                </li>
            <?php endif; ?>
            <?php if($user_logged && $user_store): ?>
                <div>
                <li>
                <a href="store">Store</a>
                </li>
                <li>
                <a href=<?= $store['name'].'/manage' ?>>Manage Store</a>
                </li>
                <li>
                <a href='<?= $store['name'].'/products' ?>'>Manage Products</a>
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
            <a href=<?= "$user_name/profile" ?>>Profile</a>
            </li>
            <li>
            <a href=<?= "$user_name/settings" ?>>Settings</a>
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
