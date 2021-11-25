<div class="container">
  <h1 class="mb-4 pb-2">Welcome to YouBuyAnyCar</h1>
  <div class="row">
    <div class="col-lg-8 filter-container ">
      <p>To find your dream car at a reasonable price, click 'Browse cars' below</p>
      <p>If you know what you want, you can search by text, or narrow it down with the filters below</p>
      <div class="filters">
        <!-- <form id="filter-form" method=post action=""> -->
        <form id="filter-form" method=post action="index.php?p=results">
            <div class="form-group min-price">
              <label for="min_price">Min Price</label>
              <select class="form-control" id="min_price" name="min_price" onChange=>
                <option selected disabled>Choose a minimum price</option>
                <option value="500">£500</option>
                <option value="1000">£1000</option>
                <option value="3000">£3000</option>
                <option value="5000">£5000</option>
                <option value="10000">£10000</option>
              </select>
            </div>
            <div class="form-group max-price">
              <label for="max_price">Max Price</label>
              <select class="form-control" id="max_price" name="max_price">
                <option selected disabled>Choose a maximum price</option>
                <option value="500">£500</option>
                <option value="1000">£1000</option>
                <option value="3000">£3000</option>
                <option value="5000">£5000</option>
                <option value="10000">£10000</option>
              </select>
            </div>
            <div class="form-group fuel-type">
              <label for="fuel_type">Fuel Type</label>
              <select class="form-control" id="fuel_type" name="fuel_type">
                <option selected disabled>Choose a fuel type</option>
                <option>Petrol</option>
                <option>Diesel</option>
                <option>LPG</option>
                <option>Electric</option>
                <option>Hybrid</option>
              </select>
            </div>
            <div class="form-group min-mileage">
              <label for="min_mileage">Min Mileage</label>
              <select class="form-control" id="min_mileage" name="min_mileage">
                <option selected disabled>Choose a minimum mileage</option>
                <option value="10000">10000</option>
                <option value="30000">30000</option>
                <option value="50000">50000</option>
                <option value="75000">75000</option>
                <option value="100000">100000</option>
              </select>
            </div>
            <div class="form-group max-mileage">
              <label for="max_mileage">Max Mileage</label>
              <select class="form-control" id="max_mileage" name="max_mileage">
                <option selected disabled>Choose a maximum mileage</option>
                <option value="15000">15000</option>
                <option value="35000">35000</option>
                <option value="55000">55000</option>
                <option value="80000">80000</option>
                <option value="150000">150000</option>
              </select>
            </div>
            <div class="form-group transmission-type">
              <label for="transmission_type">Transmission Type</label>
              <select class="form-control" id="transmission_type" name="transmission_type">
                <option selected disabled>Choose a transmission type</option>
                <option>Manual</option>
                <option>Automatic</option>
                <option>semi-automatic</option>
              </select>
            </div>
            </div>
            <button type="submit" name="filter" value="1" class="btn btn-studenteat">Search with above filters</button>
        </form>
      </div>
    <div class="col-lg-4">
      <img src="images/dealership.png" alt="Cars for sale"/>
    </div>
  </div>
</div>
