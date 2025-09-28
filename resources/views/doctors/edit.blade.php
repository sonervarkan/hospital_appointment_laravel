<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Doctor</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('welcome') }}">Home Page</a></li>
            <li><a href="{{ route('doctors.index') }}">Doctor List</a></li>
        </ul>
    </div>
    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="doctor_name_surname">Doctor Name Surname:</label>
        <input type="text" name="doctor_name_surname" value="{{$doctor->doctor_name_surname}}" required>

        <select name="department_id" id="department_id">
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
            @endforeach
        </select>

        <button type="submit">Update Doctor</button>
    </form>

</body>
</html>
