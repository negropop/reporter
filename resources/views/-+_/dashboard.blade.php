@extends('-+_.app')
@section('title','DashboardV1')
@extends('-+_.nav')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



@section('content')

    


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
   <div>
   </div>

   <div class="mt-8 text-2xl">
       Welcome to your Cpanel!
   </div>

   <div class="mt-6 text-gray-500">
Version 1   </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
 
   <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
       <div class="flex items-center">
        <img src="{{asset('img/user-male--v1.png')}}">
        
           <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('users')}}">       {{$users}}
           </a></div>
       </div>

       <div class="ml-12">
           <div class="mt-2 text-sm text-gray-500">
               Here you can see total users            </div>

           <a href="{{route('users')}}">
               <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                       <div>See More Data</div>

                       <div class="ml-1 text-indigo-500">
                           <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-right w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                       </div>
               </div>
           </a>
       </div>
   </div>

   <div class="p-6 border-t border-gray-200">
       <div class="flex items-center">
        <img src="{{asset('img/documents.png')}}">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('reportes')}}">{{$docs}}</a></div>
       </div>

       <div class="ml-12">
           <div class="mt-2 text-sm text-gray-500">
            Here you can see reportes of thiefs          </div>
       </div>
   </div>

   <div class="p-6 border-t border-gray-200 md:border-l">
       <div class="flex items-center">
           <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
           <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Futuers</div>
       </div>

       <div class="ml-12">
           <div class="mt-2 text-sm text-gray-500">
Come soon

        </div>
       </div>
   </div>
</div>

</div>


@endsection