<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create A new need') }}
        </h2>
        
    </div>
    </header>

    <form method="POST" action="{{ route('needs.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="label" :value="__('label')" />
            <x-text-input id="label" class="block mt-1 w-full" type="text" name="label" :value="old('label')" required autofocus autocomplete="label" />
            <x-input-error :messages="$errors->get('label')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="inneed" :value="__('ineed')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-600 dark:focus:border-green-600" name="inneed" id="inneed">
                <option value="">Choose a user</option>
                @foreach($users as $key => $user)
                    @if ($user->id != 1)
                    <option value="{{ $user->id }}">{{ $user->id }}-{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('inneed')" />
        </div>
        <div>
            <x-input-label for="category" :value="__('category')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-600 dark:focus:border-green-600" name="category" id="category">
                <option value="">Choose a category</option>
                @foreach($Categories as $key => $category)
                    <option value="{{ $category->id }}">{{ $category->id }}-{{ $category->label }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('category')" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="button5 w-full">Add</button>
        </div>
    </form>
</section>
