<?php
    $Basket = new Basket($Conn);
    $Car = new Car($Conn);
    $cars = $Car->getAllFilteredActiveCars($_POST);
    $attributesToHide = ["car_id", "image", "active"];
?>

<div class="container">
    <h1 class="mb-4 pb-2">Cars</h1>
    <p>Browse our wide range of cars below</p>
    <div class="row">
        <?php foreach($cars as $car) { ?>
            <div class='col-md-12'>
                <div class="car-card">
                    <div class="car-card-image" style="background-image: url('./car_images_main/<?php echo $car['image']; ?>');">
                        <a href="index.php?p=car&id=<?php echo $car['car_id']; ?>"></a>
                        <a class="car-card-text" href="index.php?p=car&id=<?php echo $car['car_id']; ?>"><h3><?php echo $car['make'].' '.$car['model']; ?></h3></a>
                    </div>
                    <div class="car-details">
                        <?php foreach($car as $detailName => $detail) {
                            // Filter through table's attributes, if the attribute's value does not exist,
                            // or the attribute is in the $attributesToHide variable, do not create a div for it.
                            if ($detail && !in_array($detailName, $attributesToHide)) {
                                // The attribute names aren't very readable as they are, so The string functions:
                                // ucwords() and str_replace() are used here to improve readability to the user.
                                // If it's displaying price, a £ symbol is added with a ternary.
                                echo "<div class=".$detailName.">
                                        <div class='detail-title'>".ucwords(str_replace("_", " ", $detailName))."</div>
                                        <div class='detail-content'>".($detailName == 'price' ? "£" : ""),$detail."</div>
                                    </div>";
                            }
                        }
                        ?>
                        <?php
                            $isInBasket = $Basket->isInBasket($car['car_id']);
                            require(__DIR__.'/../includes/addToBasket.php');
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>