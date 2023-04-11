<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete need') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your need is deleted, all of its resources and data will be permanently deleted. Before deleting your need, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <form method="post" action="{{ route('needs.destroy' , [$need->id]) }}">
        @csrf
        @method('delete')
        <div class="flex justify-start">
            {{-- <x-danger-button>
                {{ __('Delete need') }}
            </x-danger-button> --}}
            <button class="buttonD"><span class="text">Delete</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span></button>

        </div>
    </form>
</section>
