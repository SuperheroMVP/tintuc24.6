<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AJAX AREA</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

	<style type="text/css">
	 .box{
	    width:700px;
	    margin:0 auto;
	    padding: 10px;
	   }
	</style>
</head>
<body>
	  <div class="jumbotron text-center">
	    <h1 class="display-4">Laravel Dynamic Dependent Dropdown</h1>
	    <p class="lead">Using AJAX Laravel</p>
	    <hr class="my-4">
	  </div>
	<div class="container box">
		<div class="form-group">
			<select name="country" id="country" class="form-control dynamic" data-dependent="state">
				<option value="">Select Country</option>
				@foreach($list_country as $country)
				<option value="{{ $country->country}}">{{ $country->country }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<select name="state" id="state" class="form-control dynamic" data-dependent="city">
				<option value="">Select State</option>
{{-- 				<option value="1">New Yort City</option>
				<option value="2">USA</option> --}}
			</select>
		</div>
		<div class="form-group">
			<select name="city" id="city" class="form-control">
				<option value="">Select City</option>
			</select>
		</div>
		@csrf
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
// 		 Sự kiện change() xảy ra khi giá trị của các phần tử như <select> <textarea> <input> bị thay đổi.

//    - Lưu ý:

//   Đối với phần tử <select>, sự kiện change() xảy ra khi người dùng chọn option khác.
//   Đối với các phần tử nhập liệu như <textarea> hoặc <input type="text"> thì sự kiện change() xảy ra khi người dùng nhập một nội       dung mới rồi sau đó click chuột ra khỏi phần tử.
// Đối với <input type="radio"> thì sự kiện change() xảy ra khi người dùng check vào một sự lựa chọn khác.
// Đối với <input type="checkbox"> thì sự kiện change() xảy ra khi người dùng check hoặc bỏ check sự lựa chọn.
		$('.dynamic').change( function(){

	      if($(this).val( ) !='')
	      {
	      	//attr(): lấy giá trị hoặc thêm thuộc tính (attribute) cho thành phần.
	      	 var select = $(this).attr("id"); 
	      	 var value = $(this).val();

	      	 alert(select)//in ra tu country
	      	 alert(value)//in ra tu Canada

	      	 // //Dependency hay dependent nghĩa là phụ thuộc vào hỗ trợ của một cái gì, việc gì đó.
	      	  var dependent = $(this).data("dependent");
             
            alert(dependent)//in ra tu state

	      	 var _token = $('input[name="_token"]').val();

	      	 $.ajax({
	            url:"{{route('ajax_area')}}",
	            method:"POST",
	            data:{select:select, value:value, _token:_token, dependent:dependent},
	            success:function(result)
	            {
	               $('#'+dependent).html(result);
	            }
	      	 });
	      }
		});


	});
</script>

{{-- <script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('ajax_area') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#country').change(function(){
  $('#state').val('');
  $('#city').val('');
 });

 $('#state').change(function(){
  $('#city').val('');
 });
 

});
</script> --}}
