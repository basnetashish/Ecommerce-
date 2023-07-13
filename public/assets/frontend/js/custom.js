// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    // document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

$(document).ready(function() {

    loadcart();
    loadwishlist();
  console.log('loaded')
 $.ajaxSetup
 ({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
 function loadcart()
 {
  $.ajax({
     type:"GET",
     url: "/count-cart",
     success: function(response){
        // console.log(response.count)
        $('.cart-count').html('');
        $('.cart-count').html(response.count);
     }
  });
}

function loadwishlist()
 {
  $.ajax({
     type:"GET",
     url: "/count-wishlist",
     success: function(response){
        // console.log(response.count)
        $('.count-wishlist').html('');
        $('.count-wishlist').html(response.count);
     }
  });
}
});