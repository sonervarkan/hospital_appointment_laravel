<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('welcome') }}">Home Page</a></li>
            <li><a href="{{ route('departments.index') }}">Department List</a></li>
            <li><a href="{{ route('departments.create') }}">Department Add</a></li>
            <li><a href="{{ route('doctors.index') }}">Doctor List</a></li>
            <li><a href="{{ route('doctors.create') }}">Add Doctor</a></li>
            <li><a href="{{ route('patients.index') }}">Patient List</a></li>
            <li><a href="{{ route('patients.create') }}">Add Patient</a></li>
            <li><a href="{{ route('times.index') }}">Time List</a></li>
            <li><a href="{{ route('times.create') }}">Add Time</a></li>
            <li><a href="{{ route('appointments.index') }}">Appointment List</a></li>
            <li><a href="{{ route('appointments.create') }}">Add Appointment</a></li>
        </ul>
    </div>

</body>
</html>
