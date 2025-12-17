@php
    function generateGoogleCalendarLink($visit)
    {
        $start = \Carbon\Carbon::parse($visit->visit_date . ' ' . $visit->visit_hour)->format('Ymd\THis');
        $end = \Carbon\Carbon::parse($visit->visit_date . ' ' . $visit->visit_hour)
            ->addHour()
            ->format('Ymd\THis');
        $text = urlencode('Bezoek ' . $visit->name);
        $details = urlencode('Bezoek gepland. Telefoon: ' . $visit->phonenumber);
        $location = urlencode('Vier-Meistraat 16, 4695 EW Sint-Maartensdijk, Netherlands'); // Locatie toevoegen

        return "https://calendar.google.com/calendar/r/eventedit?text={$text}&dates={$start}/{$end}&details={$details}&location={$location}";
    }
@endphp


@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Bezoekoverzicht</h1>

        @if ($visits->isEmpty())
            <p class="text-gray-600">Er zijn nog geen bezoeken geregistreerd.</p>
        @else
            <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Naam</th>
                        <th class="px-4 py-2 text-left">Telefoon</th>
                        <th class="px-4 py-2 text-left">Datum</th>
                        <th class="px-4 py-2 text-left">Tijd</th>
                        <th class="px-4 py-2 text-left">Agenda</th>
                        <th class="px-4 py-2 text-left">Acties</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($visits as $visit)
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2">{{ $visit->name }}</td>
                            <td class="px-4 py-2">{{ $visit->phonenumber }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($visit->visit_date)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2">{{ $visit->visit_hour }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ generateGoogleCalendarLink($visit) }}" target="_blank"
                                    class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white rounded hover:bg-blue-500">
                                    <i class="fa-solid fa-calendar "></i>
                                </a>
                            </td>
                            <td class="px-4 py-2">
                                <form action="{{ route('visits.destroy', $visit) }}" method="POST"
                                    onsubmit="return confirm('Weet je zeker dat je dit bezoek wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1.5 bg-red-600 text-white rounded hover:bg-red-500">
                                        <i class="fa-solid fa-trash-can"></i>



                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
