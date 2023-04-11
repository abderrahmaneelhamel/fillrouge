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
<div class="bg-gray-50 flex flex-wrap px-10 w-full">
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
<?php     $progress = ($event->raised/$event->amount)*100; if($progress >= 100){ $progress = 100;}  ?>
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
                raised : {{ $event->raised }} from {{ $event->amount }}
             </p>
          </div>
          <div class="w-full h-2 bg-green-200 rounded-full">
              <div style="width: {{ $progress }}%" class=" h-full text-center text-xs text-white bg-green-600 rounded-full">
              </div>
          </div>
          <div class="flex justify-end">
<!-- Modal toggle -->
<button data-modal-target="authentication-modal{{ $event->id }}" data-modal-toggle="authentication-modal{{ $event->id }}" class="button4" type="button">
    Donate
</button> 
  
  <!-- Main modal -->
  <div id="authentication-modal{{ $event->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal{{ $event->id }}">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
<div class="min-w-screen h-screen overflow-y-scroll flex items-center justify-center px-5 pb-10 pt-16">
    <div class="w-full mx-auto rounded-lg mt-72 bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
        <div class="w-full pt-1 pb-5">
            <div class="bg-green-600 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                <i class="mdi mdi-credit-card-outline text-3xl"></i>
            </div>
        </div>
        <div class="mb-10">
            <h1 class="text-center font-bold text-xl uppercase">Secure payment info</h1>
        </div>
        <div class="mb-3 flex -mx-2">
            <div class="px-2">
                <label for="type1" class="flex items-center cursor-pointer">
                    <input type="radio" class="form-radio h-5 w-5 text-green-600" name="type" id="type1" checked>
                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                </label>
            </div>
            <div class="px-2">
                <label for="type2" class="flex items-center cursor-pointer">
                    <input type="radio" class="form-radio h-5 w-5 text-green-600" name="type" id="type2">
                    <img src="https://www.sketchappsources.com/resources/source-image/PayPalCard.png" class="h-8 ml-3">
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Name on card</label>
            <div>
                <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="John Smith" type="text"/>
            </div>
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Card number</label>
            <div>
                <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="0000 0000 0000 0000" type="text"/>
            </div>
        </div>
        <div class="mb-3 -mx-2 flex items-end">
            <div class="px-2 w-1/2">
                <label class="font-bold text-sm mb-2 ml-1">Expiration date</label>
                <div>
                    <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                        <option value="01">01 - January</option>
                        <option value="02">02 - February</option>
                        <option value="03">03 - March</option>
                        <option value="04">04 - April</option>
                        <option value="05">05 - May</option>
                        <option value="06">06 - June</option>
                        <option value="07">07 - July</option>
                        <option value="08">08 - August</option>
                        <option value="09">09 - September</option>
                        <option value="10">10 - October</option>
                        <option value="11">11 - November</option>
                        <option value="12">12 - December</option>
                    </select>
                </div>
            </div>
            <div class="px-2 w-1/2">
                <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Security code</label>
            <div>
                <input class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="000" type="text"/>
            </div>
        </div>
        <form action="{{ route('event.add') }}" method="POST">
            @csrf
            <input type="text" name="id" value="{{ $event->id }}" class="hidden">
            <div class="mb-3">
                <label class="font-bold text-sm mb-2 ml-1">amount</label>
                <div>
                    <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" name="amount" type="number" min="1" required/>
                </div>
            </div>    
        <div>
            <button class="block w-full max-w-xs mx-auto bg-green-600 hover:bg-green-700 focus:bg-green-700 text-white rounded-lg px-3 py-3 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
        </div>
    </form>
    </div>
</div>
</div>
  </div>   
          </div>
      </div>
  </div>
  @endforeach
@endif   
</div>
<div class="flex items-end justify-end fixed bottom-0 right-2 mb-4 mr-4 z-10">
    <div>
        <a title="Contact Us" href="/contact" class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
            <img class="object-cover bg-white object-center w-full h-full rounded-full" src="../build/assets/Logo-Green-Hope.png"/>
        </a>
    </div>
</div>
{!! $events->appends(\Request::except('page'))->render() !!}
<!-- drawer init and show -->
@if (Auth::user()->role == 'organisation')
<div class="flex justify-center p-5">
    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="button2" type="button">
        Create an event
      </button>
    </div> 
  <!-- drawer component -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-56 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 mt-32 pb-5 py-6 lg:px-8 h-screen overflow-y-auto">
          @include('events.partials.create-event-information-form')
      </div>
  </div>
</div>
</div> 
@endif
</div>
</x-app-layout>