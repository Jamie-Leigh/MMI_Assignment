<div class="container">
    <h1 class="mb-4 pb-2">My Account</h1>
    <p>Welcome to your account. From here you can view the cars added to your Basket.</p>
    <?php
        if($_SESSION['user_data']['image']) {
            echo '<img class="mb-3" style="max-width: 100px;" src="./user-images/'.$_SESSION['user_data']['image'].'" />';
        }
        ?>
    <p><a class="btn btn-studenteat" href="index.php?p=editprofileimage">Edit profile image</a></p>
    <h2>My Basket</h2>
    <ul class="user-basket">
    <?php
        $Basket = new Basket($Conn);
        $user_basket = $Basket->getBasketForUser();
        if($user_basket) {
            foreach($user_basket as $basket) {
                echo '<li><a href="index.php?p=car&id='.$basket['car_id'].'">'.$basket['car_name'].'</a></li>';
                }
        }
        ?>
    </ul>
</div>