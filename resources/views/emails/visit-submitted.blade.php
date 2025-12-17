<h1>Nieuw bezoekformulier</h1>

<p><strong>Naam:</strong> {{ $visit->name }}</p>
<p><strong>Telefoonnummer:</strong> {{ $visit->phonenumber }}</p>
<p><strong>Datum:</strong> {{ \Carbon\Carbon::parse($visit->visit_date)->format('d-m-Y') }}</p>
<p><strong>Tijd:</strong> {{ $visit->visit_hour }}</p>
