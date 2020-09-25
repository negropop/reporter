<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
 <head>
  <title> List of thieves</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
      
   <h3 align="center">{{ __('messages.Live search in database') }}
       <a href="{{ url('locale/ar')}}">            <img src="https://img.icons8.com/officel/16/000000/egypt.png"/>
       </a>
       <a href="{{ url('locale/en')}}">   
        <img src="https://img.icons8.com/officel/16/000000/usa.png"/>
    </a>
    </h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">{{ __('messages.Search thieves') }}</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="{{ __('messages.Search Thieves Data') }}" />
     </div>
     <div class="table-responsive">
      <h3 align="center">{{ __('messages.Total Data') }} : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>                        {{ __('messages.Thief Name') }} 
            </th>
         <th> {{ __('messages.Thief Facebook') }} </th>
         <th>{{ __('messages.Thief Mobile') }} </th>
         <th>         <th>{{ __('messages.Screen') }} </th>
        </th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
      <a class="btn btn-warning" href="/">{{ __('messages.Home') }} </a>
     </div>
    </div>    
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search2.action') }}",
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
</script>
