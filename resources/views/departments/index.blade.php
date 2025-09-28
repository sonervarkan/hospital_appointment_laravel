<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Department List</title>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('welcome') }}">Home Page</a></li>
            <li><a href="{{ route('departments.create') }}">Add Department</a></li>
        </ul>
    </div>

    <table>
        <thead>
            <tr>
                <th>Department Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->department_name }}</td>
                    <td>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn">Edit</a>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" onclick="return confirm('Bu departmanı silmek istediğinizden emin misiniz?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
