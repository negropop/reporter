@extends('-+_.app')
@section('title','Reportes')
@extends('-+_.nav')

@section('content')
    
  
        <table class="table table-hover mt-5">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Sender</th>
                <th scope="col">Thief</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
            
               @forelse ($rep as $report)
               <tr>
                <td scope="col">{{$report->id}}</td>
                <td scope="col">{{$report->name}}</td>
                <td scope="col">{{$report->thief}}</td>
                <td scope="col">
                    
                    <a class="btn btn-warning" href="reportes/{{$report->id}}/show">Show</a>
                    <a class="btn btn-danger" href="">Delete</a>

                </td>
              </tr>
               @empty
                   
               @endforelse
    

              
            </tbody>
          </table>


    </div>


@endsection