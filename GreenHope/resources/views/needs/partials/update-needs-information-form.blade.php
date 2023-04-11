<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('need Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your need information") }}
        </p>
    </div>
    </header>

    <form method="post" action="{{ route('needs.update', [$need->id] ) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="label" :value="__('label')" />
            <x-text-input id="label" name="label" type="text" class="mt-1 block w-full" :value="old('label', $need->label)" required autofocus autocomplete="label" />
            <x-input-error class="mt-2" :messages="$errors->get('label')" />
        </div>
        <div>
            <x-input-label for="inneed" :value="__('inneed')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-600 dark:focus:border-green-600" name="inneed" id="inneed">
                <option value="{{ $need->inneed_user->id }}">{{ $need->inneed_user->name }}</option>
                @foreach($users as $key => $user)
                @if ($need->inneed_user->id != $user->id)
                    <option value="{{ $user->id }}">{{ $user->id }}-{{ $user->name }}</option>
                @endif
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('inneed')" />
        </div>
        <div>
            <x-input-label for="category" :value="__('category')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="category" id="category">
                <option value="{{$need->category}}">{{ $need->categories->label }}</option>
                @foreach($categories as $key => $category)
                    @if ($need->category != $category->id)
                        <option value="{{ $category->id }}">{{ $category->id }}-{{ $category->label }}</option>
                    @endif
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('category')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'needs-updated')
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
