<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor List</title>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('welcome') }}">Home Page</a></li>
            <li><a href="{{ route('doctors.create') }}">Add Doctor</a></li>
        </ul>
    </div>

    <table>
        <thead>
            <tr>
                <th>Doctor Name Surname</th>
                <th>Department Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->doctor_name_surname }}</td>
                    <td>
                        @if ($doctor->department)
                            {{ $doctor->department->department_name }}
                        @else
                            <span style="color: red;">[Bölüm Atanmamış]</span>
                        @endif
                    </td>
                <!--
                if olmadan $doctor->department->department_name şeklinde de kullanılabilir
                ancak eğer db de department_id null ise department_name bulamayacağı için hata verir
                -->
                    <td>
                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn">Edit</a>
                        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" onclick="return confirm('Bu doktoru silmek istediğinizden emin misiniz?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
