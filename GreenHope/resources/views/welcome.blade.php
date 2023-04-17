<x-guest2-layout>
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
          <div class="relative space-y-4 w-full">
            <div class="pt-5 w-full flex justify-center">
                <p class="max-w-2xl mb-6 font-bold text-green-600 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Some of People Needs</p>
            </div>
          @if($needs->count())
            
          @foreach($needs as $key => $need)
                 <div class="w-full p-5 bg-white rounded-lg flex items-center justify-between space-x-8 hover:scale-105">
                  <div class="flex flex-col lg:flex-row w-full justify-between items-center">
                  <div class="flex mr-5">
                    <div class="text-gray-500">A person needs a: </div>
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
      <div class="bg-gray-50  h-56">
        <div class="relative w-full">
          <div class="absolute top-0 -left-4 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob "></div>
          <div class="absolute top-0 -right-4 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
          <div class="absolute -bottom-32 left-20 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
          <div class="w-full relative">
            <div class="w-full flex justify-center">
                <p class="max-w-2xl mb-6 font-bold text-green-600 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">We have achived</p>
            </div>
            <div class="antialiased flex justify-evenly space-x-10 items-center text-center text-gray-800">
                <div class="w-48">
                  <span class="text-4xl font-bold text-green-600" 
                    x-data="animation()"
                    x-init="animate(1251)"
                    x-text="counter">
                    0
                  </span>
                  <p>Donors</p>
                </div>
                <div class="w-48">
                  <span class="text-4xl font-bold text-green-600" 
                    x-data="animation()"
                    x-init="animate(9400)"
                    x-text="counter">
                    0
                  </span>
                  <p>benefiters</p>
                </div>
                <div class="w-48">
                  <span class="text-4xl font-bold text-green-600" 
                    x-data="animation()"
                    x-init="animate(11024)"
                    x-text="counter">
                    0
                  </span>
                  <p>Cases</p>
                </div>
              </div>
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
    <div class="eventcard shadow-lg my-5 ml-4 rounded-xl p-4 bg-white relative overflow-hidden">
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
            <div class="flex justify-center lg:justify-end">
                @if ($progress != 100 )
                <button class="button4" type="button">
                    <a href="/events">Donate</a> 
                </button>
                @else
                <button  class="button4 cursor-not-allowed" type="button">
                    <a href="/events">Done</a>
                </button>
                @endif     
            </div>
        </div>
    </div>
    @endforeach
    @endif   
    </div>
    <section>
      <div class="pt-5 w-full flex justify-center">
        <p class="max-w-2xl mb-6 font-bold text-green-600 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Testamonials</p>
    </div>
      <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div
          class="[column-fill:_balance] sm:columns-2 sm:gap-6 lg:columns-3 lg:gap-8"
        >
          <div class="mb-8 sm:break-inside-avoid">
            <blockquote class="rounded-xl bg-gray-50 p-6 shadow">
              <p class="leading-relaxed text-gray-700">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
                minima dicta amet, molestiae aliquam incidunt suscipit recusandae
                labore ratione doloremque, architecto et illo minus quo tenetur
                ducimus.
              </p>
            </blockquote>
    
            <div class="mt-4 flex items-center gap-4">
              <img
                alt="Woman"
                src="https://images.unsplash.com/photo-1603366445787-09714680cbf1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=944&q=80"
                class="h-12 w-12 rounded-full object-cover"
              />
    
              <div class="text-sm">
                <p class="font-medium">Gladis Lennon</p>
                <p class="mt-1">Head of SEO</p>
              </div>
            </div>
          </div>
    
          <div class="mb-8 sm:break-inside-avoid">
            <blockquote class="rounded-xl bg-gray-50 p-6 shadow">
              <p class="leading-relaxed text-gray-700">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore vel
                quo deserunt quos expedita minima incidunt sed tempora, a architecto
                consectetur reprehenderit, in repellat voluptatum.
              </p>
            </blockquote>
    
            <div class="mt-4 flex items-center gap-4">
              <img
                alt="Woman"
                src="https://images.unsplash.com/photo-1603366445787-09714680cbf1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=944&q=80"
                class="h-12 w-12 rounded-full object-cover"
              />
    
              <div class="text-sm">
                <p class="font-medium">Gladis Lennon</p>
                <p class="mt-1">Head of SEO</p>
              </div>
            </div>
          </div>
    
          <div class="mb-8 sm:break-inside-avoid">
            <blockquote class="rounded-xl bg-gray-50 p-6 shadow">
              <p class="leading-relaxed text-gray-700">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio
                beatae incidunt perferendis soluta facilis voluptas dicta
                repudiandae quasi asperiores libero, exercitationem molestiae autem
                sapiente dolore nulla non consequatur. Eaque, dolores.
              </p>
            </blockquote>
    
            <div class="mt-4 flex items-center gap-4">
              <img
                alt="Woman"
                src="https://images.unsplash.com/photo-1603366445787-09714680cbf1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=944&q=80"
                class="h-12 w-12 rounded-full object-cover"
              />
    
              <div class="text-sm">
                <p class="font-medium">Gladis Lennon</p>
                <p class="mt-1">Head of SEO</p>
              </div>
            </div>
          </div>
    
          <div class="mb-8 sm:break-inside-avoid">
            <blockquote class="rounded-xl bg-gray-50 p-6 shadow">
              <p class="leading-relaxed text-gray-700">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus
                doloribus eius aut unde, dolores accusantium!
              </p>
            </blockquote>
    
            <div class="mt-4 flex items-center gap-4">
              <img
                alt="Woman"
                src="https://images.unsplash.com/photo-1603366445787-09714680cbf1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=944&q=80"
                class="h-12 w-12 rounded-full object-cover"
              />
    
              <div class="text-sm">
                <p class="font-medium">Gladis Lennon</p>
                <p class="mt-1">Head of SEO</p>
              </div>
            </div>
          </div>
    
          <div class="mb-8 sm:break-inside-avoid">
            <blockquote class="rounded-xl bg-gray-50 p-6 shadow">
              <p class="leading-relaxed text-gray-700">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi a
                voluptatum quidem nulla quisquam natus velit provident earum esse,
                odio numquam labore recusandae similique sunt.
              </p>
            </blockquote>
    
            <div class="mt-4 flex items-center gap-4">
              <img
                alt="Woman"
                src="https://images.unsplash.com/photo-1603366445787-09714680cbf1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=944&q=80"
                class="h-12 w-12 rounded-full object-cover"
              />
    
              <div class="text-sm">
                <p class="font-medium">Gladis Lennon</p>
                <p class="mt-1">Head of SEO</p>
              </div>
            </div>
          </div>
    
          <div class="mb-8 sm:break-inside-avoid">
            <blockquote class="rounded-xl bg-gray-50 p-6 shadow">
              <p class="leading-relaxed text-gray-700">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius ut
                necessitatibus, ipsum dolor sit amet consectetur adipisicing eli
                repudiandae qui dolor ipsum dolor sit amet consectetur adipisicing eli
                minima.
              </p>
            </blockquote>
    
            <div class="mt-4 flex items-center gap-4">
              <img
                alt="Woman"
                src="https://images.unsplash.com/photo-1603366445787-09714680cbf1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=944&q=80"
                class="h-12 w-12 rounded-full object-cover"
              />
    
              <div class="text-sm">
                <p class="font-medium">Gladis Lennon</p>
                <p class="mt-1">Head of SEO</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>    
</x-guest2-layout>