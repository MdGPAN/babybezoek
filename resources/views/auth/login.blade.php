@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="flex items-center justify-center min-h-screen flex-col">
        <div class="bg"></div>

        <div
            class="flex min-h-full flex-col justify-center px-6 py-6 pb-6 bg-white rounded-xl shadow-2xl shadow-gray-500 min-w-md">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-2 text-2xl font-bold tracking-tight">Login</h2>
            </div>
            <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="email" class="block text-sm/6 font-medium ">Email</label>
                        </div>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" placeholder="Email" autocomplete="email"
                                value="{{ old('email') }}"
                                class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base outline-1 placeholder:text-gray-500 focus:outline-2 focus:outline-emerald-700 sm:text-sm/6" />
                        </div>
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium ">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" placeholder="Password"
                                autocomplete="password" value="{{ old('password') }}"
                                class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base outline-1 placeholder:text-gray-500 focus:outline-2 focus:outline-emerald-700 sm:text-sm/6" />
                        </div>
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="flex justify-center rounded-md bg-emerald-700 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-emerald-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Inloggen
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
