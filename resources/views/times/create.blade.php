<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Time</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('welcome') }}">Home Page</a></li>
            <li><a href="{{ route('times.index') }}">Time List</a></li>
        </ul>
    </div>
    <form action="{{ route('times.store') }}" method="POST">
        @csrf
        <label for="appointment_hour">Appointment Hour:</label>
        <input type="text" name="appointment_hour" id="appointment_hour" required>

        <button type="submit">Add Time</button>
    </form>

</body>
</html>
