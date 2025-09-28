<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment List</title>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('welcome') }}">Home Page</a></li>
            <li><a href="{{ route('appointments.create') }}">Add Appointment</a></li>
        </ul>
    </div>

    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Patient Tc No</th>
                <th>Department Name</th>
                <th>Doctor Name Surname</th>
                <th>Appointment Date</th>
                <th>Appointment Hour</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient->patient_name }}</td>
                    <td>{{ $appointment->patient->patient_surname }}</td>
                    <td>{{ $appointment->patient->patient_tc_no }}</td>
                    <td>{{ $appointment->doctor->department->department_name }}</td>
                    <td>{{ $appointment->doctor->doctor_name_surname }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->time->appointment_hour }}</td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn">Edit</a>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" onclick="return confirm('Bu randevuyu silmek istediğinizden emin misiniz?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
