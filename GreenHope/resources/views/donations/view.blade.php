<x-app-layout>

  <section class="bg-white dark:bg-gray-900">
      <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
          <div class="mr-auto place-self-center lg:col-span-7">
              <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Welcome to GreenHope</h1>
              <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">an online community for donors from around the world.</p>
              {{-- <a href="/events" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900">
                  Donate
                  <svg class="w-5 h-5 ml-2 -mr-1" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </a> --}}
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
<div class="bg-gray-50 flex flex-wrap px-16 w-full">
  <div class="pt-5 w-full flex justify-center">
      <p class="max-w-2xl mb-6 font-bold text-green-600 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Some items for you to have</p>
  </div>
      <div class="relative w-full">
        <div class="absolute top-0 -left-4 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob "></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 left-20 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
      <div class="w-full flex flex-wrap">
  <!-- card -->
@if($donations->count())
      
@foreach($donations as $key => $donation)
@if ($donation->To == null)
<form action="{{  route('donationGeting') }}" method="POST" class="w-full lg:w-1/3">
    @csrf
<div class="bg-white m-3 isolate rounded-md object-cover">
    <input type="text" name="id" value="{{ $donation->id }}" class="hidden">
<abbr style="text-decoration: none" title="take it">
    <div class="group w-full relative block bg-black rounded-lg">
            <img
              alt=""
              src="{{ $donation->image }}"
              class="absolute bg-gray-100 inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50 rounded-lg"
            />
          
            <div class="relative w-full p-4 sm:p-6 lg:p-8">
              <p class="text-sm font-medium uppercase tracking-widest text-green-600">
                {{ $donation->categories->label }}
              </p>
          
              <p class="text-xl font-bold text-white sm:text-2xl">{{ $donation->label }}</p>
          
              <div class="mt-32 sm:mt-48 lg:mt-64">
                <div
                  class="flex flex-col justify-center translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100"
                >
                  <p class="text-sm text-white">
                    {{ $donation->description }}
                  </p>
                  @if (Auth::user()->hasRole('Inneed'))
                      <button type="submit" class="inline-flex items-center justify-center px-5 py-3 mr-3 mt-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900">
                        Take it!
                      </button>
                  @endif
                </div>
              </div>
            </div>
  </div></abbr> 
  
</div>
</form>
@endif
@endforeach
@endif   
</div>
{!! $donations->appends(\Request::except('page'))->render() !!}
<div class="flex items-end justify-end fixed bottom-0 right-2 mb-4 mr-4 z-10">
  <div>
      <a title="Contact Us" href="/contact" class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
          <img class="object-cover bg-white object-center w-full h-full rounded-full" src="../build/assets/Logo-Green-Hope.png"/>
      </a>
  </div>
</div>
</div> 
</div>
<!-- Modal toggle -->
@if ((Auth::user()->hasRole('Donor')) || (Auth::user()->hasRole('Organisation')) || (Auth::user()->hasRole('Admin')))
  <div class="flex justify-center p-5">
  <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="button2" type="button">
      Donate
    </button>
  </div>  
@endif
  <!-- Main modal -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
      <div class="relative w-full h-full max-w-md md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mt-20 lg:mt-36">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="px-6 pt-10 lg:pt-6 py-6 lg:px-8 h-screen overflow-y-auto">
                  <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">give some thing</h3>
                  <form class="space-y-6" method="POST" action="{{ route('donations.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div>
                            <label for="label" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">label</label>
                            <input type="text" name="label" id="label" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                      <div>              
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">description</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-600 focus:border-green-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-600 dark:focus:border-green-600" placeholder="Write your description here..." required></textarea>
                      </div>
                      <div>
                        <x-input-label for="category_id" :value="__('category')" />
                        <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-600 dark:focus:border-green-600" name="category_id" id="category_id">
                            <option value="">Choose a category</option>
                            @foreach($categories as $key => $category)
                                <option value="{{ $category->id }}">{{ $category->id }}-{{ $category->label }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                    </div>
                      <div class="my-4">
                        <x-input-label for="image" :value="__('the image')" />
                        <x-text-input id="image" name="file" type="file" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>
                        <div>
                            <x-input-label for="user_id" :value="__('do you have a specific person in mind?')" />
                            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-600 dark:focus:border-green-600" name="user_id" id="user_id">
                                <option value="">No</option>
                                @foreach($users as $key => $user)
                                  @if ($user->role != 'organisation' && !($user->hasRole('Admin')))
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                  @endif
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                        </div>
                      <button type="submit" id="bottone1">Donate</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>