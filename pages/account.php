<div class="container">
    <h1 class="mb-4 pb-2">My Account</h1>
    <p>Welcome to your account. From here you can view the cars added to your favourites list.</p>
    <?php
        if($_SESSION['user_data']['user_image']) {
            echo '<img class="mb-3" style="max-width: 100px;" src="./user-images/'.$_SESSION['user_data']['user_image'].'" />';
        }
        ?>
    <p><a class="btn btn-studenteat" href="index.php?p=editprofileimage">Edit profile image</a></p>
    <h2>My Favourites</h2>
    <ul class="user-favs">
    <?php
        $Favourite = new Favourite($Conn);
        $user_favs = $Favourite->getAllFavouritesForUser();
        if($user_favs) {
            foreach($user_favs as $fav) {
                echo '<li><a href="index.php?p=car&id='.$fav['car_id'].'">'.$fav['car_name'].'</a></li>';
                }
        }
        ?>
    </ul>
</div>