<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comment Ajax</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

	<style type="text/css">
		.panel.panel-default {
	    border: 1px solid #ccc;
	    padding: 5px 10px;
	    margin-top:30px;
	}
	</style>
</head>
<body>
	<div class="jumbotron text-center">
		<h1 class="display-4">Comment Ajax</h1>
		<p class="lead">Using AJAX Laravel</p>
		<hr class="my-4">
	</div>
	<div class="container">
		<form method="post" id="comment_form">
			@csrf
			<div class="form-group">
				<input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Input name">
			</div>
			<div class="form-group">
				<textarea name="comment_content" id="comment_content" cols="30" rows="5" class="form-control" placeholder="Enter Comment"></textarea>
			</div>
			<div class="form-group">
				<input type="hidden" name="comment_id" id="comment_id" value="0" />
				<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
			</div>
		</form>

		<span id="comment_message"></span>
		<br>
		<span id="display_comment"></span>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>.
{{-- @foreach($data_comment as $item)

	<h1>helllo</h1>
@endforeach --}}
{{-- 
serialize(): Lấy giá trị các thành phần form, mã hóa các giá trị này thành giá trị chuỗi.
Giá trị sẽ được hiển thị theo các cặp cách nhau bởi ký tự "&": name1=value1&name2=value2&..
vd:comment_name=hung%20do&comment_content=duoc%20cua%20%20lo&comment_id=0
 --}}
<script type="text/javascript">

	$(document).ready(function(){
		// 		$(document).on('submit','#comment_form',function(){
  //          alert("hello bb");
		// })
		var _token = $('input[name="_token"]').val();
		
		$('#comment_form').on('submit',function(){
		   event.preventDefault();//không cho gửi form khi nhấn vào button submit.
          var _token = $('input[name="_token"]').val();
          var form_data = $(this).serialize();
         
          //alert(form_data)
          $.ajax({
               url:"{{route("comment_ajax.actionAdd")}}",
               method:"post",
               data:form_data,
               dataType:"JSON",
               success:function(data)
               {
                   if(data.error !='')
                   {
                   	 $('#comment_form')[0].reset();// reset lai gia tri cua the input
	                 $('#comment_message').html(data.error);
	               	 $('#comment_id').val('0');
	               	 load_comment();

                   }
               }
          });

		});
		load_comment();

		function load_comment()
		 {
		  $.ajax({
		   url:"{{route("comment_ajax.loadComment")}}",
		   method:"GET",
		   success:function(data)
		   {
		    $('#display_comment').html(data);
		   }
		  })
		 }


         $(document).on("click",".reply",function(){
         	
            var comment_id = $(this).attr("id");            
             $("#comment_id").val(comment_id);
             $("#comment_name").focus();
         });
	});
</script>