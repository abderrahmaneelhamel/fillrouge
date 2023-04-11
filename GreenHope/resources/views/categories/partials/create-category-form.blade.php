<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create A new category') }}
        </h2>
        
    </div>
    </header>

    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="label" :value="__('label')" />
            <x-text-input id="label" class="block mt-1 w-full" type="text" name="label" :value="old('label')" required autofocus autocomplete="label" />
            <x-input-error :messages="$errors->get('label')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="button5 w-full">Add</button>
        </div>
    </form>
</section>
