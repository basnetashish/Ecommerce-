<div id="flashmsg">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block flash-message" id="flashmsg" >
	        <button type="button" class="close" data-dismiss="alert">×</button>	
           <strong>{{ $message }}</strong>
         </div>
     @endif
</div>


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block flash-message" id="flashmsg">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block flash-message" id="flashmsg">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block flash-message" id="flashmsg">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger flash-message" id="flashmsg">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Please check the form below for errors
</div>
@endif