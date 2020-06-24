<!DOCTYPE html>
<html>
<head>
  <title>Live search in laravel using AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <style>
    .box{
      width: 700px;
      border: 1px solid #ccc;
      padding: 15px 5px;
    }
    .has-error
     {
      border-color:#cc0000;
      background-color:#ffff99;
     }

  </style>
</head>
<body>

  <div class="jumbotron text-center">
    <h1 class="display-4">Check Email</h1>
    <p class="lead">Using AJAX Laravel</p>
    <hr class="my-4">
  </div>
 
<div class="container box">
          
  <form action="https://getbootstrap.com/docs/4.0/components/forms/" method="post" >
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" id="email" class="form-control" autocomplete="on" placeholder="Enter email">
      <span id="status_email"></span>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <div class="modal-footer">
      <button type="submit" name="save_user" id="save_user" class="btn btn-primary">Save User</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
    </div>
  </form>
        
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
{{-- <script type="text/javascript">

  $(document).ready(function(){
     


       checkEmail();
       
       function checkEmail(email='')
       {
        $.ajax({
          url:"{{route('email_available.check')}}",
          method:"GET",
          data:{email:email},
          dataType:'json',
          success:function(data){
             if(data!= 0)
             {
                $('#status_email').html('<span class="text-danger">Email not available</span>');
                $('#save_user').attr('disabled', true);
                $('#save_user').css("cursor","not-allowed");
             }
             // else if(data== 2)
             // {
             //    $('#status_email').html('<span class="text-success">Check In Herer</span>');
             // }
             else
             {
              $('#status_email').html('<span class="text-success">Email Available</span>');
              $('#save_user').attr('disabled', false);
             }
          }
        })
       }

      $(document).on('keyup','#email',function(){
         var query = $(this).val();
         checkEmail(query);
         // alert(query);
       });
   });
</script>
 --}}

 <script type="text/javascript">
    $(document).ready(function(){
      $('#email').blur(function(){
       
         var email = $('#email').val();
         var _token = $('input[name="_token"]').val();
         var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         if(!filter.test(email))
         {
           $('#status_email').html('<label class="text-danger">Sai dinh dang email</label>');
           $('#save_user').attr('disabled','true');
            $('#save_user').css('cursor','not-allowed');
         }
         else
         {
           $.ajax({
                
              url:"{{route('email_available.check')}}",
              method:"post",
              data:{email:email, _token:_token},
              success:function(result)
              {
                if( result == 0)
                {
                    $('#status_email').html('<label class="text-success">success email</label>');
                    $('#save_user').attr('disabled',false);
                    $('#save_user').css('cursor','pointer');
                }
                else
                {
                    $('#status_email').html('<label class="text-danger">Email da ton tai</label>');
                    $('#save_user').attr('disabled',true);
                    $('#save_user').css('cursor','not-allowed');
                }
              }
           });
         }
        
      });
    });
 </script>

