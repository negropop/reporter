@extends('-+_.app')
@section('title','User')
@extends('-+_.nav')

@section('content')
    
<main>
    <div>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
<div wire:id="lxEgRp7tgoSLOJdYV15E" class="md:grid md:grid-cols-3 md:gap-6">
<div class="md:col-span-1">
<div class="px-4 sm:px-0">
<h3 class="text-lg font-medium text-gray-900">Profile Information</h3>

<p class="mt-1 text-sm text-gray-600">
Update your User's profile information and email address.
</p>
</div>
</div>


<div class="mt-5 md:mt-0 md:col-span-2">
<form method="POST" action="update">
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
#ID : {{$id->id}}
</label>


    <!-- Current Profile Photo -->
 

    <!-- New Profile Photo Preview -->
    <div class="mt-2" x-show="photoPreview" style="display: none;">
        <span class="block rounded-full w-20 h-20" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
        </span>
    </div>

    
    
      
</div>

<!-- Name -->
<div class="col-span-6 sm:col-span-4">
 <label class="block font-medium text-sm text-gray-700" for="name">
Name
</label>

 <input class="form-input rounded-md shadow-sm mt-1 block w-full" name="name" id="name" value="{{$id->name}}" type="text" wire:model.defer="state.name" autocomplete="name">

  
</div>

<!-- Email -->
<div class="col-span-6 sm:col-span-4">
 <label class="block font-medium text-sm text-gray-700" for="email">
Email
</label>

 <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="email" value="{{$id->email}}" type="email" wire:model.defer="state.email">

  
</div>
<!-- Email -->
<div class="col-span-6 sm:col-span-4">
    <label class="block font-medium text-sm text-gray-700" for="pass">
   Password
   </label>
   
    <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="email" type="password" wire:model.defer="state.password">
   
     
   </div>
   

</div>
    </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('lxEgRp7tgoSLOJdYV15E').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.opacity.out.duration.1500ms="shown" style="display: none;" class="text-sm text-gray-600 mr-3">
Saved.
</div>


<button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
Save
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


  


<div class="mt-10 sm:mt-0">
    <div wire:id="hSxGSabpx8E2L9upv6cE" class="md:grid md:grid-cols-3 md:gap-6">
<div class="md:col-span-1">
<div class="px-4 sm:px-0">
<h3 class="text-lg font-medium text-gray-900">Delete Account</h3>

<p class="mt-1 text-sm text-gray-600">
Permanently delete your account.
</p>
</div>
</div>


<div class="mt-5 md:mt-0 md:col-span-2">
<div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
<div class="max-w-xl text-sm text-gray-600">
Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
</div>

<div class="mt-5">
 <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150" wire:click="confirmUserDeletion" wire:loading.attr="disabled">
Delete Account
</button>

</div>

<!-- Delete User Confirmation Modal -->
<div id="36ac91a8122577c7b197539ebb1a5123" x-data="{ show: window.Livewire.find('hSxGSabpx8E2L9upv6cE').entangle('confirmingUserDeletion')  }" x-show="show" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" class="fixed top-0 inset-x-0 px-4 pt-6 sm:px-0 sm:flex sm:items-top sm:justify-center" style="display: none;">
<div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">
<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
</div>

<div x-show="show" class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" style="display: none;">
<div class="px-6 py-4">
<div class="text-lg">
Delete Account
</div>

<div class="mt-4">
Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.

    <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
         <input class="form-input rounded-md shadow-sm mt-1 block w-3/4" type="password" placeholder="Password" x-ref="password" wire:model.defer="password" wire:keydown.enter="deleteUser">


          
    </div>
</div>
</div>

<div class="px-6 py-4 bg-gray-100 text-right">
<button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150" wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
Nevermind
</button>


     <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150 ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
Delete Account
</button>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</main>

@endsection