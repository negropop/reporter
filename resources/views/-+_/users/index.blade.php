@extends('-+_.app')
@section('title','Users')
@extends('-+_.nav')

@section('content')
    
    <div class="container">
      @if (session()->has('success')) 
      <div class="alert alert-success">{{session()->get('success')}}</div>
  
   @endif
   @if (session()->has('deleted')) 
   <div class="alert alert-danger">{{session()->get('deleted')}}</div>

@endif
        <table class="table table-hover mt-5">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">UserName</th>
                <th scope="col">Reportes</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
            
@forelse ($users as $user)
<tr>
             
    <th scope="row">{{$user->id}}</th>
    <td>{{$user->name}}</td>
    <td>{{Request::ip()}}</td>
    <td>
        <a class="btn btn-success" href="users/{{$user->id}}/edit">Edit</a>
        <a  class="btn btn-danger"href="users/{{$user->id}}/delete">Delete</a>
    
    </td>
  </tr>

@empty
    
@endforelse

              
            </tbody>
          </table>


    </div>


@endsection