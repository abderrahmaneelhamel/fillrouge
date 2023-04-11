<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create A new event') }}
        </h2>
        
    </div>
    </header>

    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="label" :value="__('label')" />
            <x-text-input id="label" class="block mt-1 w-full" type="text" name="label" :value="old('label')" required autofocus autocomplete="label" />
            <x-input-error :messages="$errors->get('label')" class="mt-2" />
        </div>
        <x-input-label for="organisation" :value="__('organisations')" />
        <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="organisation">
                <option value="">choose an organisation</option>
                @foreach($users as $key => $user)
                    @if ($user->role == 'organisation')
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            
        </select>
        <div class="my-4">
            <x-input-label for="image" :value="__('the image')" />
            <x-text-input id="image" name="file" type="file" class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>
        <div>
            <x-input-label for="description" :value="__('description')" />
            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-600 focus:border-green-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-600 dark:focus:border-green-600" placeholder="Write your description here..." required></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="location" :value="__('location')" />
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autofocus autocomplete="location" />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="amount" :value="__('amount')" />
            <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" required autofocus autocomplete="amount" />
            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
        </div>
        <x-input-label for="emergency" :value="__('emergency')" />
        <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="emergency">
                <option value="0">no</option>
                <option value="1">yes</option>
        </select>
        <div class="flex items-center justify-end mt-4 mb-10">
            <button type="submit" class="button5 w-full">Add</button>
        </div>
    </form>
</section>
