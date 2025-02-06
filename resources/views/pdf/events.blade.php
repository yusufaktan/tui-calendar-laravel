<!DOCTYPE html>
<html>
<head>
    <title>Events for {{ date("F Y", mktime(0, 0, 0, $month, 1, $year)) }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .event { margin-bottom: 20px; padding: 10px; border-bottom: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>Events for {{ date("F Y", mktime(0, 0, 0, $month, 1, $year)) }}</h1>
    
    @foreach($events as $event)
        <div class="event">
            <h3>{{ $event->title }}</h3>
            <p>{{ $event->description }}</p>
            <p>Start: {{ $event->start_date }}</p>
            <p>End: {{ $event->end_date }}</p>
        </div>
    @endforeach
</body>
</html>