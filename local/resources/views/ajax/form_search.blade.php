<!DOCTYPE html>
<html>
<head>
  <title>Live search in laravel using AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
<body>

  <div class="jumbotron text-center">
    <h1 class="display-4">Search Form</h1>
    <p class="lead">Using AJAX Laravel</p>
    <hr class="my-4">
  </div>
 
<div class="container">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Add New User
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="https://getbootstrap.com/docs/4.0/components/forms/" method="post">
            @scrf
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" id="email" class="form-control"  placeholder="Enter email">
              <span id="error_email"></span>
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
              <button type="submit" class="btn btn-primary">Save User</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
  <div class="container">
    <div class="search-form">
      <div class="search-form d-flex justify-content-end">
        <div class="btn-group">
           <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
           <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </div>
   <div class="panel panel-default">

    <div class="panel-body">

    <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Customer Name</th>
         <th>Email</th>
         <th>Address</th>
         <th>City</th>
         <th>Postal Code</th>
         <th>Country</th>
       </tr>
     </thead>
     <tbody>

     </tbody>
   </table>
 </div>
</div>    
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">
   $(document).ready(function(){
    // $('#myModal').on('shown.bs.modal', function () {
    //   $('#myInput').trigger('focus')
    // })
        fetch_customer_data();
       function fetch_customer_data(query='')
       {
         $.ajax({
          url:"{{route('live_search.action')}}",
          method:'GET',
          data:{query:query},
          dataType:'json',
          success:function(data)
          {
            $('tbody').html(data.table_data);
            $('#total_records').text(data.total_data);
          }
         })
       }
       $(document).on('keyup','#search',function(){
         var query = $(this).val();
         fetch_customer_data(query);
       });
   });
</script>
<!-- <script>
  $(document).ready(function(){

   fetch_customer_data();

   function fetch_customer_data(query = '')
   {
    $.ajax({
     url:"{{ route('live_search.action') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {
      $('tbody').html(data.table_data);
      $('#total_records').text(data.total_data);
    }
  })
  }

  $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_customer_data(query);
  });
});
</script> -->

