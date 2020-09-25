
@auth
<html lang="{{ app()->getLocale() }}">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@livewireStyles
@foreach ($settings as $setting)
    
@endforeach

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
<title>{{$setting->title}}</title>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{route('admin')}}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                

                <!-- Navigation Links -->
           
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{route('thiefs.list')}}" :active="request()->routeIs('thiefslist')">
                        {{ __('messages.Thieves List') }} 
                    </x-jet-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link  href="{{ url('locale/ar')}}" :active="request()->routeIs('settings')">
                        <img src="https://img.icons8.com/officel/16/000000/egypt.png"/>
                    </x-jet-nav-link>
                </div>


                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ url('locale/en')}}" :active="request()->routeIs('settings')">
                        <img src="https://img.icons8.com/officel/16/000000/usa.png"/>
                    </x-jet-nav-link>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>
                        @if (auth()->user()->IsAdmin())
                        <x-jet-dropdown-link href="{{route('admin')}}">
                            {{ __('messages.Admin') }}
                        </x-jet-dropdown-link>
                        @endif
                        <x-jet-dropdown-link href="/user/profile">
                            {{ __('messages.Profile') }}
                        </x-jet-dropdown-link>
                        

                        {{-- @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="/user/api-tokens">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif --}}

                        <div class="border-t border-gray-100"></div>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="/teams/{{ Auth::user()->currentTeam->id }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="/teams/create">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach

                            <div class="border-t border-gray-100"></div>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('messages.Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{route('admin')}}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>

        </div>
      

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="/user/profile" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{route('thiefs.list')}}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('Thieves List') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="/teams/{{ Auth::user()->currentTeam->id }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="/teams/create" :active="request()->routeIs('teams.create')">
                        {{ __('Create New Team') }}
                    </x-jet-responsive-nav-link>

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>

    
<main>
    <div>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
<div wire:id="lxEgRp7tgoSLOJdYV15E" class="md:grid md:grid-cols-3 md:gap-6">
<div class="md:col-span-1">
<div class="px-4 sm:px-0">
    
<h3 class="text-lg font-medium text-gray-900"><h1>{{ __('messages.Report Information') }}</h1>
     </h3>

<p class="mt-1 text-sm text-gray-600">

{{ __('messages.Apply Form') }}
.
</p>
</div>
</div>


<div class="mt-5 md:mt-0 md:col-span-2">
    @if (session()->has('success')) 
    <div class="alert alert-success">{{session()->get('success')}}</div>

 @endif
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="send" enctype="multipart/form-data">
    @csrf
<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">
            <!-- Profile Photo -->
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
    <!-- Profile Photo File Input -->
    <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                ">

     <label class="block font-medium text-sm text-gray-700" for="photo">
</label>


    <!-- Current Profile Photo -->
 

    <!-- New Profile Photo Preview -->
    <div class="mt-2" x-show="photoPreview" style="display: none;">
        <span class="block rounded-full w-20 h-20" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
        </span>
    </div>

    
    
      
</div>

<!-- Name -->
<input  name="userid" id="userid" value="{{Auth::user()->id}}"  type="hidden">

<div class="col-span-6 sm:col-span-4">
 <label class="block font-medium text-sm text-gray-700" for="name" aria-required="true">
{{ __('messages.Your Name') }}
</label>

 <input class="@error('name') is-invalid @enderror form-input rounded-md shadow-sm mt-1 block w-full" name="name" id="name" placeholder="{{ __('messages.Enter Your Name') }}" type="text" wire:model.defer="state.name" autocomplete="name">
 
  
</div>
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


{{-- sFacrbook --}}

<div class="col-span-6 sm:col-span-4">
    <label class="block font-medium text-sm text-gray-700" for="phone">
        {{ __('messages.Praivte Facebook Link') }}
    </label>
   
    <input class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="
    {{ __('messages.Your Facebook Link') }}
    " name="sface" value="" id="email" type="text" wire:model.defer="state.password">
   
     
   </div>
   

</div>


<!-- sPhone-->
<div class="col-span-6 sm:col-span-4">
 <label class="block font-medium text-sm text-gray-700" for="phone">
    {{ __('messages.Your Mobile(Not Required)') }}
</label>

 <input class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="{{ __('messages.hh') }}
 " name="sphone" id="email" value="" type="number" wire:model.defer="state.email">

  
</div>
<!-- Thief -->

<div class="col-span-6 sm:col-span-4">
    <label class="block font-medium text-sm text-gray-700" for="phone">
        {{ __('messages.Thief Name') }}
    </label>
   
    <input class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="
    {{ __('messages.Thief Name') }}
    " name="thief" value="" id="email" type="text" wire:model.defer="state.password">
   
     
   </div>
   
{{-- tfacebook --}}

<div class="col-span-6 sm:col-span-4">
    <label class="block font-medium text-sm text-gray-700" for="phone">
        {{ __('messages.Thief Facebook') }}
   </label>
   
    <input class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="
    {{ __('messages.Thief Facebook') }}
    " name="tface" value="" id="email" type="text" wire:model.defer="state.password">
   
     
   </div>

   {{-- teamil --}}
   <div class="col-span-6 sm:col-span-4">
    <label class="block font-medium text-sm text-gray-700" for="phone">
        {{ __('messages.Thief Email') }}
   </label>
   
    <input class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="
    {{ __('messages.Thief like') }}
    " name="temail" value="" id="email" type="text" wire:model.defer="state.password">
   
     
   </div>


{{-- tphone --}}

<div class="col-span-6 sm:col-span-4">
    <label class="block font-medium text-sm text-gray-700" for="phone">
        {{ __('messages.Thief Mobile') }}
    </label>
   
    <input class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="
    {{ __('messages.Thief Mobile') }}
    " name="tmobile" value="" id="email" type="number" wire:model.defer="state.password">
   
     
   </div>



{{-- Screen --}}

<div class="col-span-6 sm:col-span-4">
    <label class="block font-medium text-sm text-gray-700" for="phone">
        {{ __('messages.Upload Screen') }}
   </label>
   
    <input class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Thief Mobile" name="screen" value="" id="email" type="file" wire:model.defer="state.password">
   
     
   </div>



</div>
{{-- banner --}}


    

         


<button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
    {{ __('messages.save') }}

</button>
        </div>
                </div>
</form>
</div>
</div>


                 <div class="hidden sm:block">
<div class="py-8">
<div class="border-t border-gray-200"></div>
</div>
</div>


  
<script src="{{asset('js/jquery-3.5.1.slim.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<div class="mt-10 sm:mt-0">
    <div wire:id="hSxGSabpx8E2L9upv6cE" class="md:grid md:grid-cols-3 md:gap-6">
<div class="mt-5 md:mt-0 md:col-span-2">
<div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg" style="">
<div class="max-w-xl text-sm text-gray-600">
{{--     
 <script>
if ($(window).width() > 720) {
   alert('Less than 960');}
else {
    alert('Less than 960w');}

    {!!html_entity_decode($setting->banner728x90); !!}

}


 </script> --}}
    {{-- {!!html_entity_decode($setting->banner728x90); !!} --}}

</div>
@if ( app()->getLocale()  == 'ar')

       <link rel="stylesheet" href="{{ asset('css/rtl.css') }}
       ">
        
@elseif( app()->getLocale()  == 'en')
   <style>

#name {
    text-align: left;
}
   </style>
@endif

</div>
</div>
</div>
</main>

</html>
@endauth
