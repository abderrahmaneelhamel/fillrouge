<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('event Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your event information") }}
        </p>
    </div>
    </header>

    <form method="post" action="{{ route('events.update', [$event->id] ) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="label" :value="__('label')" />
            <x-text-input id="label" name="label" type="text" class="mt-1 block w-full" :value="old('label', $event->label)" required autofocus autocomplete="label" />
            <x-input-error class="mt-2" :messages="$errors->get('label')" />
        </div>
        <x-input-label for="organisation" :value="__('organisations')" />
        <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="organisation">
                <option value="{{ $event->organisation }}">{{ $event->organisations->name }}</option>
                @foreach($users as $key => $user)
                    @if (($user->role == 'organisation') && ($user->id != $event->organisation))
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            
        </select>
        <div>
            <x-input-label for="description" :value="__('description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $event->description)" required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="location" :value="__('location')" />
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location', $event->location)" required autofocus autocomplete="location" />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="amount" :value="__('amount')" />
            <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount', $event->amount)" required autofocus autocomplete="amount" />
            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="raised" :value="__('raised')" />
            <x-text-input id="raised" class="block mt-1 w-full" type="number" name="raised" :value="old('raised', $event->raised)" autofocus autocomplete="raised" />
            <x-input-error :messages="$errors->get('raised')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="emergency" :value="__('emergency?')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="emergency" id="emergency">
                <option value="{{$event->emergency}}">
                @if ($event->emergency == 0)
                    no
                @else
                    yes
                @endif
            </option>
            @if ($event->emergency != 0)
                <option value="0">no</option>
            @else
                <option value="1">yes</option>
            @endif 
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('emergency')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'events-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
