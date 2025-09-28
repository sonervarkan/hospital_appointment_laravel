<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Patient</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('welcome') }}">Home Page</a></li>
            <li><a href="{{ route('patients.index') }}">Patient List</a></li>
        </ul>
    </div>
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <label for="patient_name">Patient Name:</label>
        <input type="text" name="patient_name" id="patient_name" required>

        <label for="patient_surname">Patient Surname:</label>
        <input type="text" name="patient_surname" id="patient_surname" required>

        <label for="patient_tc_no">Patient Tc No:</label>
        <input type="text" name="patient_tc_no" id="patient_tc_no" required>

        <button type="submit">Add Patient</button>
    </form>

</body>
</html>
