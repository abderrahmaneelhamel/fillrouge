<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create A new Donation') }}
        </h2>
        
    </div>
    </header>

    <form class="space-y-6 mb-10" method="POST" action="{{ route('donations.store') }}" enctype="multipart/form-data">
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
                @foreach($Categories as $key => $category)
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
                    <option value="">Choose a user</option>
                    @foreach($users as $key => $user)
                        <option value="{{ $user->id }}">{{ $user->id }}-{{ $user->name }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
            </div>
          <button type="submit" class="button5 w-full">Add</button>
      </form>
</section>
