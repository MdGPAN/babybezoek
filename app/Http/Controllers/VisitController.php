<?php

namespace App\Http\Controllers;

use App\Mail\VisitSubmitted;
use Illuminate\Http\Request;
use App\Models\Visit;
use Illuminate\Support\Facades\Mail;

class VisitController extends Controller
{
    public function store(Request $request)
    {
        // Validatie
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:20',
            'visit_date' => 'required|date',
            'visit_hour' => 'required|string',
        ], [
            'name.required' => 'Gelieve namen in te vullen.',
            'phonenumber.required' => 'Gelieve je telefoonnummer in te vullen.',
            'visit_date.required' => 'Kies een gewenste datum voor het bezoek.',
            'visit_hour.required' => 'Kies een gewenste tijd voor het bezoek.',
        ]);

        // Opslaan in database
        $visit = Visit::create($validated);

        Mail::mailer('resend')->to('marcdegraaf98@live.nl')->send(new VisitSubmitted($visit));


        // Optioneel: redirect met succesbericht
        return redirect()->back()->with('success', 'Je bezoek is geregistreerd!');
    }

    public function destroy(Visit $visit)
    {
        $visit->delete();
        return redirect()->back()->with('success', 'Bezoek verwijderd!');
    }

    public static function generateGoogleCalenderLink(Visit $visit) {}
}
