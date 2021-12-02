<div class="container">
    <h1 class="mb-4 pb-2">My Basket</h1>
    <div class="row"
    <?php
        $Basket = new Basket($Conn);
        $user_basket = $Basket->getBasketForUser();
        $attributesToHide = ["car_id", "image", "active", "basket_id", "user_id"];

        if($user_basket) {
            foreach($user_basket as $car) {
                    require(__DIR__.'/../includes/carCard.php');
                }
            } else {
                echo "<h3>Basket is empty!</h3>";
        }
        ?>
    </div>
</div>