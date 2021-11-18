<?php
  $Car = new Car($Conn);
  $car_data = $Car->getAllActiveCars($_GET['id']);
?>

<div class="container">
    <h1 class="mb-4 pb-2"><?php echo $data_data['make']." ".$car_data['model']; ?></h1>

    <div class="row">
        <div class="col-md-6">
          <?php if($car_data['images']) { ?>
            <div class="row">
              <?php foreach($car_data['images'] as $image) { ?>
                <div class="col-md-4">
                    <div class="car-image mb-4" style="background-image: url('./car-images/<?php echo $image['car_image']; ?>');">
                    <a href="./car-images/<?php $image['car_image'];?>" data-lightbox='car-imgs'></a>
                    </div>
                </div>
              <?php } ?>
            </div>
            <?php } ?>
        </div>
        <div class="col-md-6">
          <p>
            <?php echo $car_data['description']; ?>
          </p>
          <?php
            $Favourite = new Favourite($Conn);
            $is_fav = $Favourite->isFavourite($_GET['id']);

            if($is_fav) {
              ?>
                <button id="removeFav" type="button" class="btn btn-primary mb-3" data-carid="<?php echo $_GET['id']; ?>">Remove from favourites</button>
              <?php
            } else {
              ?>
                <button id="addFav" type="button" class="btn btn-primary mb-3" data-carid="<?php echo $_GET['id']; ?>">Add to favourites</button>
              <?php
            }
            ?>
        </div>
    </div>
</div>