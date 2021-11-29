<?php
    if ($_SESSION['is_loggedin']) {
        if($isInBasket) {
        ?>
            <button type="button" class="btn btn-primary addToBasket remove <?php echo $car['car_id']; ?>" data-carid="<?php echo $car['car_id']; ?>">Remove from basket</button>
        <?php
        } else {
        ?>
            <button type="button" class="btn btn-primary addToBasket add <?php echo $car['car_id']; ?>" data-carid="<?php echo $car['car_id']; ?>">Add to basket</button>
        <?php
        }
    } else {
        ?>
        <form method="post" action="index.php?p=login" class="addToBasket">
        <button id="loginBasket" type="submit" class="btn btn-primary" >Login to add cars to your basket</button>
        </form>
        <?php
    }
