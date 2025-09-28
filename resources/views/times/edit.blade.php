<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Time</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('welcome') }}">Home Page</a></li>
            <li><a href="{{ route('times.index') }}">Time List</a></li>
        </ul>
    </div>
    <form action="{{ route('times.update', $time->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="appointment_hour">Appointment Hour:</label>
        <input type="text" name="appointment_hour" value="{{$time->appointment_hour}}" required>

        <button type="submit">Update Time</button>
    </form>

</body>
</html>
