$(function(){
  $('body').on('click', '#addFav', function (e) {
    var car_id = $(this).data('carid');
    $.ajax({
      method: "POST",
      url: "./ajax/togglefav.php",
      dataType: 'json',
      data: { car_id: car_id }
    })
    .done(function(rtnData) {
      console.log(rtnData);
      $('#addFav').text('Remove from favourites').attr('id', 'removeFav');
    })
  });

  $('body').on('click', '#removeFav', function (e) {
    var car_id = $(this).data('carid');
    $.ajax({
      method: "POST",
      url: "./ajax/togglefav.php",
      dataType: 'json',
      data: { car_id: car_id }
    })
    .done(function(rtnData) {
      console.log(rtnData);
      $('#removeFav').text('Add to favourites').attr('id', 'addFav');
    })
  });
})