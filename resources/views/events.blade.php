<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Events for {{ date("F Y", mktime(0, 0, 0, $month, 1, $year)) }}</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            padding: 20px;
        }
        .event { 
            margin-bottom: 20px; 
            padding: 10px; 
            border-bottom: 1px solid #ccc; 
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        h3 {
            color: #444;
            margin-bottom: 10px;
        }
        p {
            margin: 5px 0;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Events for {{ date("F Y", mktime(0, 0, 0, $month, 1, $year)) }}</h1>
    
    @forelse($events as $event)
        <div class="event">
            <h3>{{ $event->title }}</h3>
            @if($event->description)
                <p><strong>Description:</strong> {{ $event->description }}</p>
            @endif
            <p><strong>Start:</strong> {{ $event->start_date->format('d/m/Y H:i') }}</p>
            <p><strong>End:</strong> {{ $event->end_date->format('d/m/Y H:i') }}</p>
        </div>
    @empty
        <p>No events found for this month.</p>
    @endforelse
</body>
</html>