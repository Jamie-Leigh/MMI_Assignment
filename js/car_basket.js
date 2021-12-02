$(function(){
  $('body').on('click', '.add', function (e) {
    var car_id = $(this).data('carid');
    console.log('add', car_id);
    $.ajax({
      method: "POST",
      url: "./ajax/togglebasket.php",
      dataType: 'json',
      data: { car_id: car_id }
    })
    .done(function(rtnData) {
      console.log(rtnData);
      $(`.${car_id}`).text('Remove from Basket').attr('class', `btn btn-primary addToBasket remove ${car_id}`);
    })
  });

  $('body').on('click', '.remove', function (e) {
    var car_id = $(this).data('carid');
    var page = $(this).data('page');
    console.log('remove', car_id);
    console.log('#removebasket',car_id);
    $.ajax({
      method: "POST",
      url: "./ajax/togglebasket.php",
      dataType: 'json',
      data: { car_id: car_id }
    })
    .done(function(rtnData) {
      console.log(rtnData);
      if (page == "basket") {
        window.location.reload();
      } else {
        $(`.${car_id}`).text('Add to Basket').attr('class', `btn btn-primary addToBasket add ${car_id}`);
      }
    })
  });
})