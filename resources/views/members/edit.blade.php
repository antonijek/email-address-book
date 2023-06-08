<x-guest-layout>
    <form method="POST" action="{{route('member.update',$member->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('First name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="firstName" value="{{$member->firstName}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="name" :value="__('Last name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="lastName" value="{{$member->lastName}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$member->email}}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="image" class="block font-medium text-sm text-gray-700">Image</label>
            <div><img src="http://127.0.0.1:8000/{{$member->image?->path}}" class="w-16" alt=""></div>
            <input id="image" class="form-control" type="file" name="image" autocomplete="off" />
            @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">

            </a>

            <x-primary-button class="ml-4">
                {{ __('Edit') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>