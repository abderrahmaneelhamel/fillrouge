<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('category Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your category information") }}
        </p>
    </div>
    </header>

    <form method="post" action="{{ route('categories.update', [$category->id] ) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="label" :value="__('label')" />
            <x-text-input id="label" name="label" type="text" class="mt-1 block w-full" :value="old('label', $category->label)" required autofocus autocomplete="label" />
            <x-input-error class="mt-2" :messages="$errors->get('label')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'categories-updated')
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
