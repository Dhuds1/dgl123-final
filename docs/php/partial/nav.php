<form method="get" class="search__bar-wrapper"><input class="search__bar" name="search__bar" type="text" placeholder="Search"><button type="submit" for="search__bar" class="search__bar-button">Search</button>
<?php
    if($_SERVER['REQUEST_METHOD'] === ['GET']){
        
    }
?>
</form>
<nav class="nav__bar-main">
    <h1>Hello, <?= $user_name ?>!</h1>
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
                    <a href='&wishlist=$user_name'>Wishlist</a>
                </li>
                ";
            }
            ?>
            <?php
            if($user_logged && $user_store){
                echo "
                <div>
                <li>
                <a href='$store_name'>Store</a>
                </li>
                <li>
                <a href=''>Manage Store</a>
                </li>
                <li>
                <a href='$store_name/products'>Manage Products</a>
                </li>
                </div>";}
            elseif($user_logged && !$user_store){
                echo "
                <div>
                <li>
                <a href='createStore'>Create Store</a>
                </li>
                </div>
                ";}
            ?>
            </div>
            <div>
            <?php
            if($user_logged){
            echo "
            <li>
            <a href=''>Profile</a>
            </li>
            <li>
            <a href=''>Settings</a>
            </li>
            ";}
            else {
                echo "
                <li>
                <a href='loginSignup'>Login or SignUp</a>
                </li>
                ";}
            ?>
        </div>
    </ul>
</nav>