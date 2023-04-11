<x-app-layout>
    <div class="bg-gray-50 min-h-screen flex items-center justify-center overflow-x-hidden overflow-y-hidden">
        <div class="relative w-full">
          <div class="absolute top-0 -left-4 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob "></div>
          <div class="absolute top-0 -right-4 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
          <div class="absolute -bottom-32 left-20 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
          <div class="w-full relative space-y-4">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div style="width: 99%" class="ml-2 my-5 rounded-lg relative overflow-x-hidden sm:rounded-lg">
    <p class="ml-3 max-w-2xl mb-6 font-bold text-black lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">donations</p>
    <!-- drawer init and show -->
    <div>         
        <button data-drawer-target="drawer-contact-donation" data-drawer-show="drawer-contact-donation" aria-controls="drawer-contact-donation" class="buttonA mb-5 ml-3 font-semibold"> Add a donation
        </button>
      </div>
      <!-- drawer component -->
    <div style="top : 64px;" id="drawer-contact-donation" class="fixed left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-contact-label">
        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Green Hope</h5>
        <button type="button" data-drawer-hide="drawer-contact-donation" aria-controls="drawer-contact-donation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Close menu</span>
        </button>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div class="max-w-xl">
              @include('donations.partials.create-donation-form')
          </div>
      </div>
    </div>
    <table class="w-full rounded-lg text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs rounded-lg text-gray-700 uppercase bg-green-100 dark:bg-green-700 dark:text-green-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('id')
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('label')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('image')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('description')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('donor')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('To')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('category')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('created_at')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($donations->count())
        
                    @foreach($donations as $key => $donation)
        
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $donation->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $donation->label }}
                            </td>
                            <td class="px-6 py-4">
                                <img width="100px" src="{{ $donation->image }}" alt="">
                            </td>
                            <td class="px-6 py-4">
                                {{ $donation->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $donation->donor_user->name }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($donation->To_user)
                                  {{ $donation->To_user->name }} 
                                @else
                                    <span class="text-red-400">It is not owned by anyone </span>   
                                @endif
                             </td>
                            <td class="px-6 py-4">
                                {{ $donation->categories->label }}
                            </td>
                            </td>
                            <td class="px-6 py-4">
                                {{ $donation->created_at->format('Y-m-d') }}
                            </td>        
                            <td class="px-6 py-4 text-right">
                                <a href="/donations/{{ $donation->id }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Edit Or Delete</a>
                            </td>
                        </tr>
        
                    @endforeach
        
                @endif
        </tbody>
    </table>
</div>
<div style="width: 99%" class="ml-2 my-5 relative overflow-x-hidden shadow-md sm:rounded-lg">
    <p class="ml-3 max-w-2xl mb-6 font-bold text-black lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Categories</p>
    <!-- drawer init and show -->
    <div>         
        {{-- <x-primary-button class="ml-3 mb-2" type="button" data-drawer-target="drawer-contact-category" data-drawer-show="drawer-contact-category" aria-controls="drawer-contact-category">
          {{ __('Add a category') }}
        </x-primary-button> --}}
        <button data-drawer-target="drawer-contact-category" data-drawer-show="drawer-contact-category" aria-controls="drawer-contact-category" class="buttonA mb-5 ml-3 font-semibold"> Add a category
        </button>
      </div>
      <!-- drawer component -->
    <div style="top : 64px;" id="drawer-contact-category" class="fixed left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-contact-label">
        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Green Hope</h5>
        <button type="button" data-drawer-hide="drawer-contact-category" aria-controls="drawer-contact-category" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Close menu</span>
        </button>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div class="max-w-xl">
              @include('categories.partials.create-category-form')
          </div>
      </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-green-100 dark:bg-green-700 dark:text-green-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('id')
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('category')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('created_at')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($Categories->count())
        
                    @foreach($Categories as $key => $Category)
        
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $Category->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $Category->label }}
                            </td> 
                            <td class="px-6 py-4">
                                {{ $Category->created_at->format('Y-m-d') }}
                            </td>  
                            <td class="px-6 py-4 text-right">
                                <a href="/categories/{{ $Category->id }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Edit Or Delete</a>
                            </td>      
                        </tr>
        
                    @endforeach
        
            @endif
        </tbody>
    </table>
</div>
<div style="width: 99%" class="ml-2 my-5 relative overflow-x-hidden shadow-md sm:rounded-lg">
    <p class="ml-3 max-w-2xl mb-6 font-bold text-black lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">needs</p>
    <!-- drawer init and show -->
    <div>         
        {{-- <x-primary-button class="ml-3 mb-2" type="button" data-drawer-target="drawer-contact-need" data-drawer-show="drawer-contact-need" aria-controls="drawer-contact-need">
          {{ __('Add a need') }}
        </x-primary-button> --}}
        <button data-drawer-target="drawer-contact-need" data-drawer-show="drawer-contact-need" aria-controls="drawer-contact-need" class="buttonA mb-5 ml-3 font-semibold"> Add a need
        </button>
      </div>
      <!-- drawer component -->
    <div style="top : 64px;" id="drawer-contact-need" class="fixed left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-contact-label">
        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Green Hope</h5>
        <button type="button" data-drawer-hide="drawer-contact-need" aria-controls="drawer-contact-need" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Close menu</span>
        </button>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div class="max-w-xl">
              @include('needs.partials.create-need-form')
          </div>
      </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-green-100 dark:bg-green-700 dark:text-green-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('id')
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('label')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('inneed')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('category')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('created_at')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($needs->count())
        
                    @foreach($needs as $key => $need)
        
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $need->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $need->label }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $need->inneed_user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $need->categories->label }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $need->created_at->format('Y-m-d') }}
                            </td>  
                            <td class="px-6 py-4 text-right">
                                <a href="/needs/{{ $need->id }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Edit Or Delete</a>
                            </td>      
                        </tr>
        
                    @endforeach
        
            @endif
        </tbody>
    </table>
</div>
<div style="width: 99%" class="ml-2 my-5 relative overflow-x-hidden shadow-md sm:rounded-lg">
    <p class="ml-3 max-w-2xl mb-6 font-bold text-black lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">events</p>
    <!-- drawer init and show -->
    <div>
                        
        {{-- <x-primary-button class="ml-3 mb-2" type="button" data-drawer-target="drawer-contact" data-drawer-show="drawer-contact" aria-controls="drawer-contact">
          {{ __('create event') }}
        </x-primary-button> --}}
        <button data-drawer-target="drawer-contact" data-drawer-show="drawer-contact" aria-controls="drawer-contact" class="buttonA mb-5 ml-3 font-semibold"> Create event
        </button>
      </div>
      <!-- drawer component -->
      <div style="top : 64px;" id="drawer-contact" class="fixed left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-contact-label">
        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Green Hope</h5>
        <button type="button" data-drawer-hide="drawer-contact" aria-controls="drawer-contact" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Close menu</span>
        </button>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div class="max-w-xl">
              @include('events.partials.create-event-information-form')
          </div>
      </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-green-100 dark:bg-green-700 dark:text-green-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('id')
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('label')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('organisation')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('image')
                    </div>
                </th><th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('amount')
                    </div>
                </th><th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('raised')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('description')
                    </div>
                </th><th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('location')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        emergency?
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('created_at')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($events->count())
        
                    @foreach($events as $key => $event)
        
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $event->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $event->label }}
                            </td>
                            
                            <td class="px-6 py-4">
                                {{ $event->organisations->name }}
                            </td>
                            <td class="px-6 py-4">
                                <img width="400px" src="{{ $event->image }}" alt="">
                            </td>
                            <td class="px-6 py-4">
                                {{ $event->amount }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $event->raised }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $event->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $event->location }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($event->emergency == 1)
                                    yes
                                @else
                                    no    
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $event->created_at->format('Y-m-d') }}
                            </td>        
                            <td class="px-6 py-4 text-right">
                                <a href="/events/{{ $event->id }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Edit Or Delete</a>
                            </td>
                        </tr>
        
                    @endforeach
        
                @endif
        </tbody>
    </table>
</div>
<div style="width: 99%" class="ml-2 my-5 relative overflow-x-hidden shadow-md sm:rounded-lg">
    <p class="ml-3 max-w-2xl mb-6 font-bold text-black lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Money Donations</p>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-green-100 dark:bg-green-700 dark:text-green-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('id')
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('amount')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('donor')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('To')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('created_at')
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($money_donations->count())
        
                    @foreach($money_donations as $key => $money_donation)
        
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $money_donation->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $money_donation->amount }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $money_donation->donor_user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $money_donation->To_user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $money_donation->created_at->format('Y-m-d') }}
                            </td>        
                        </tr>
        
                    @endforeach
        
            @endif
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</x-app-layout>
