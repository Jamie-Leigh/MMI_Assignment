<?php
$Car = new Car($Conn);
$cars = $Car->getAllActiveCars();
?>

<div class="container">
    <h1 class="mb-4 pb-2">Cars</h1>
    <p>Browse our wide range of cars below</p>
    <div class="row">
        <?php foreach($cars as $car) { ?>
            <div class="col-md-3">
                <div class="car-card">
                    <div class="car-card-image" style="background-image: url('./car_images_main/<?php echo $car['image']; ?>');">
                        <a href="index.php?p=car&id=<?php echo $car['car_id']; ?>"></a>
                        <a href="index.php?p=car&id=<?php echo $car['make']; ?>"><h3><?php echo $car['model']; ?></h3></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>