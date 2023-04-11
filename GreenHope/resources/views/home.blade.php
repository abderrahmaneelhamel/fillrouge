<x-app-layout>

    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Welcome to GreenHope</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">an online community for donors from around the world.</p>
                <a href="/events" class="cssbuttons-io-button"> Get started
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                    </div>
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img style="width: 413px; height: 310px;" src="./build/assets/Logo-Green-Hope.png" alt="mockup">
            </div>                
        </div>
    </section>
    <div class="flex items-end justify-end fixed bottom-0 right-2 mb-4 mr-4 z-10">
        <div>
            <a title="Contact Us" href="/contact" class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
                <img class="object-cover bg-white object-center w-full h-full rounded-full" src="../build/assets/Logo-Green-Hope.png"/>
            </a>
        </div>
    </div>
<div class="bg-gray-50 min-h-screen flex items-center justify-center px-16">
    <div class="relative w-full max-w-lg">
      <div class="absolute top-0 -left-4 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob "></div>
      <div class="absolute top-0 -right-4 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
      <div class="absolute -bottom-32 left-20 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
      <div class="m-8 relative space-y-4 w-full">
        <div class="pt-5 w-full flex justify-center">
            <p class="max-w-2xl mb-6 font-bold text-green-600 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Some of People Needs</p>
        </div>
      @if($needs->count())
        
      @foreach($needs as $key => $need)
             <div class="w-full p-5 bg-white rounded-lg flex items-center justify-between space-x-8">
              <div class="flex justify-between items-center">
                <div class="flex mr-5">
                <div class="text-gray-500">{{ $need->inneed_user->name }} needs : </div>
                <div class="text-green-600 ml-2">{{ $need->label }}</div>
              </div>            
                <!-- Modal toggle -->
                
                <button class="button1" type="button">
                    <a class="hover:text-white" href="/needs">Donate</a> 
                </button>
              </div>
            </div>
        @endforeach
        @endif 
      </div>
    </div>
  </div>


  <div class="pt-5 w-full flex justify-center">
    <p class="max-w-2xl mb-6 font-bold text-green-600 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Events from around the world</p>
</div>
    <div class="relative w-full">
      <div class="absolute top-0 -left-4 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob "></div>
      <div class="absolute top-0 -right-4 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
      <div class="absolute -bottom-32 left-20 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    <div class="w-full flex flex-wrap">
<!-- card -->
@if($events->count())
    
@foreach($events as $key => $event)
<?php     $progress = ($event->raised/$event->amount)*100;  ?>
<div style="width: 47%" class="shadow-lg my-5 ml-4 rounded-xl p-4 bg-white relative overflow-hidden">
    <div class="w-full h-full block">
        <div class="flex items-center border-b-2 mb-2 py-2">
          @if ($event->organisations->picture)
          <img class='w-10 h-10 bg-white object-cover rounded-full' alt='User avatar' src='{{ $event->organisations->picture }}'>
          @else
          <img class='w-10 h-10 bg-white object-cover rounded-full' alt='User avatar' src='../build/assets/user.png'>
          @endif
            <div class="pl-3">
                <div class="font-medium">
                    {{ $event->organisations->name }}
                </div>
                <div class="text-gray-600 text-sm">
                    {{ $event->created_at->format('Y-m-d') }} at: {{ date('g:ia', strtotime($event->created_at)) }}
                </div>
            </div>
        </div>
        <div class="flex justify-between">
            <div class="w-1/2">
                <p class="text-green-600 text-sm font-medium mb-2">
                    {{ $event->location }}
                </p>
                @if ($event->emergency != 0)
                    <p class="text-red-600 text-xs font-medium mb-2">
                        Emergency
                    </p>
                @else
                <div class="h-4"></div>
                @endif
                <p class="text-gray-800 text-xl font-medium mb-2">
                    {{ $event->label }}
                </p>
                <div class="h-20 overflow-y-auto">
                <p class="text-gray-800 text-sm font-medium mb-2">
                    {{ $event->description }}
                </p>
                </div>
            </div>
            <div class="w-1/2 flex items-center">
                <img class="w-full" src="{{ $event->image }}" alt="">
            </div>
        </div>
        <div class="flex items-center justify-between my-2">
            <p class="text-gray-400 text-sm">
               {{ round($progress, 2) }}% progress
            </p>
            <p class="text-gray-400 text-sm">
              raised : {{ $event->raised }}/{{ $event->amount }}
           </p>
        </div>
        <div class="w-full h-2 bg-green-200 rounded-full">
            <div style="width: {{ $progress }}%" class=" h-full text-center text-xs text-white bg-green-600 rounded-full">
            </div>
        </div>
        <div class="flex justify-end">
            @if ($progress != 100 )
            <button class="button4" type="button">
                <a href="/events">Donate</a> 
            </button>
            @else
            <button disabled class="button4 cursor-not-allowed" type="button">
                Done
            </button>
            @endif     
        </div>
    </div>
</div>
@endforeach
@endif   
</div>
</x-app-layout>
