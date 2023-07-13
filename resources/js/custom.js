
$(document).ready(function() {

    loadcart();
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
});
 

