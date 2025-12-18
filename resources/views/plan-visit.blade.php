@extends('layouts.app')

@section('title', 'Plan je bezoek')

@section('content')
    <div class="container flex items-center justify-center min-h-screen flex-col px-4">
        <div class="bg"></div>

        <div class="flex min-h-full flex-col justify-center px-6 py-12 bg-white rounded-xl shadow-2xl shadow-gray-500">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img src="{{ asset('images/baby-boy.png') }}" alt="Your Company" class="mx-auto h-25 w-auto" />
                <h2 class="mt-10 text-center text-2xl font-bold tracking-tight">Wanneer wil jij op bezoek
                    komen?</h2>
                <p class="mt-2 px-3  text-gray-600 text-sm leading-relaxed">
                    We nemen via whatsapp contact met je op om het bezoek te bevestigen 😄😄
                </p>

            </div>

            <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                <form action="{{ route('visits.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm/6 font-medium">Namen</label>
                        <div class="mt-2">
                            <input id="name" type="text" name="name" autocomplete="name"
                                placeholder="Geef de namen op van iedereen die komt" value="{{ old('name') }}"
                                class="block w-full rounded-md px-3 py-1.5 text-base outline-1 placeholder:text-gray-500 focus:outline-2  focus:outline-emerald-700 sm:text-sm/6" />
                        </div>
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="phonenumber" class="block text-sm/6 font-medium ">Telefoonnummer</label>
                        </div>
                        <div class="mt-2">
                            <input id="phonenumber" type="tel" name="phonenumber"
                                placeholder="We sturen je een berichtje of het uitkomt" autocomplete="phonenumber"
                                value="{{ old('phonenumber') }}"
                                class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base outline-1 placeholder:text-gray-500 focus:outline-2 focus:outline-emerald-700 sm:text-sm/6" />
                        </div>
                        @error('phonenumber')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="visit_date" class="block text-sm font-medium">Gewenste datum van bezoek</label>
                        <div class="mt-2">
                            <input id="visit_date" type="date" name="visit_date" value="{{ old('visit_date') }}"
                                class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base outline-1 outline-offset-1  placeholder:text-gray-500 focus:outline-2 focus:outline-emerald-700 sm:text-sm/6" />
                        </div>
                        @error('visit_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    @php
                        $hours = [
                            '09:00',
                            '09:30',
                            '10:00',
                            '10:30',
                            '11:00',
                            '11:30',
                            '12:00',
                            '12:30',
                            '13:00',
                            '13:30',
                            '14:00',
                            '14:30',
                            '15:00',
                            '15:30',
                            '16:00',
                            '16:30',
                            '17:00',
                            '17:30',
                            '18:00',
                            '18:30',
                            '19:00',
                            '19:30',
                        ];
                    @endphp

                    <div>
                        <label for="visit_hour" class="block text-sm font-medium">Gewenste tijd van bezoek</label>
                        <div class="mt-2">
                            <select id="visit_hour" name="visit_hour"
                                class="block w-full h-9 rounded-md bg-white/5 px-3 py-1.5 text-base outline-1 outline-offset-1 placeholder:text-gray-500 focus:outline-2 focus:outline-emerald-700 sm:text-sm/6 appearance-none">

                                @foreach ($hours as $hour)
                                    <option value="{{ $hour }}" {{ old('visit_hour') == $hour ? 'selected' : '' }}>
                                        {{ $hour }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>






                    <div>
                        <button type="submit"
                            class="flex justify-center rounded-md bg-emerald-700 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-emerald-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            Verzenden
                        </button>

                    </div>
                    @if (session('success'))
                        <div class="text-green-600">{{ session('success') }}</div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
