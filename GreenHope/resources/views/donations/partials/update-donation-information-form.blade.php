<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('donation Informations') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your donation informations") }}
        </p>
    </div>
    </header>

    <form method="post" action="{{ route('donations.update', [$donation->id] ) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="label" :value="__('label')" />
            <x-text-input id="label" name="label" type="text" class="mt-1 block w-full" :value="old('label', $donation->label)" required autofocus autocomplete="label" />
            <x-input-error class="mt-2" :messages="$errors->get('label')" />
        </div>
        <div>
            <x-input-label for="description" :value="__('description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $donation->description)" required autofocus autocomplete="description" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        <div>
            <x-input-label for="donor" :value="__('donor')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-600 dark:focus:border-green-600" name="donor" id="donor">
                <option value="{{ $donation->donor_user->id }}">{{ $donation->donor_user->name }}</option>
                @foreach($users as $key => $user)
                @if ($donation->donor_user->id != $user->id)
                    <option value="{{ $user->id }}">{{ $user->id }}-{{ $user->name }}</option>
                @endif
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('donor')" />
        </div>
        <div>
            <x-input-label for="To" :value="__('To')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-600 dark:focus:border-green-600" name="To" id="To">
                @if ($donation->To_user)
                <option value="{{ $donation->To_user->id }}">{{ $donation->To_user->name }}</option>
                @else
                <option value="">choose a user</option>
                @endif        
                @foreach($users as $key => $user)
                @if ($donation->To_user)
                @if ($donation->To_user->id != $user->id)
                    <option value="{{ $user->id }}">{{ $user->id }}-{{ $user->name }}</option>
                @endif
                @else
                <option value="{{ $user->id }}">{{ $user->id }}-{{ $user->name }}</option>
                @endif
                @endforeach
                <option value="">no one</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('To')" />
        </div>
        <div>
            <x-input-label for="category" :value="__('category')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="category" id="category">
                <option value="{{$donation->category}}">{{ $donation->categories->label }}</option>
                @foreach($categories as $key => $category)
                    @if ($donation->category != $category->id)
                        <option value="{{ $category->id }}">{{ $category->id }}-{{ $category->label }}</option>
                    @endif
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('category')" />
        </div>
        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'donations-updated')
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
