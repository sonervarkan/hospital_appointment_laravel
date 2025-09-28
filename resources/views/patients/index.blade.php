<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient List</title>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('welcome') }}">Home Page</a></li>
            <li><a href="{{ route('patients.create') }}">Add Patient</a></li>
        </ul>
    </div>

    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Patient Tc No</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->patient_name }}</td>
                    <td>{{ $patient->patient_name }}</td>
                    <td>{{ $patient->patient_tc_no }}</td>
                    <td>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn">Edit</a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" onclick="return confirm('Bu hastayı silmek istediğinizden emin misiniz?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
