<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Appointment</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('welcome') }}">Home Page</a></li>
            <li><a href="{{ route('appointments.index') }}">Appointment List</a></li>
        </ul>
    </div>
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf

        <label for="patient_name">Patient Name:</label>
        <input type="text" name="patient_name" id="patient_name" required>

        <label for="patient_surname">Patient Surname:</label>
        <input type="text" name="patient_surname" id="patient_surname" required>

        <label for="patient_tc_no">Patient Tc No:</label>
        <input type="text" name="patient_tc_no" id="patient_tc_no" required>

        <select name="department_id" id="department_id">
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
            @endforeach
        </select>

        <select name="doctor_id" id="doctor_id">
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->doctor_name_surname }}</option>
            @endforeach
        </select>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" name="appointment_date" id="appointment_date" required>

        <select name="time_id" id="time_id">
            @foreach ($times as $time)
                <option value="{{ $time->id }}">{{ $time->appointment_hour }}</option>
            @endforeach
        </select>

        <button type="submit">Add Appointment</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function(){
        const departmentSelect = document.getElementById("department_id");
        const doctorSelect = document.getElementById("doctor_id");
        const dateSelect = document.getElementById("appointment_date");
        const timeSelect = document.getElementById("time_id");


        departmentSelect.addEventListener("change", function(){
            doctorSelect.innerHTML = `<option value="">-- Select Doctor --</option>`;
            if(departmentSelect.value){
                $.ajax({
                    url: `/appointments/get-doctors/${departmentSelect.value}`,
                    method: "GET",
                    success: function(response) {
                        doctorSelect.innerHTML = `<option value="">-- Select Doctor --</option>`;
                        response.forEach(doctor => {
                            doctorSelect.innerHTML += `<option value="${doctor.id}">${doctor.doctor_name_surname}</option>`;
                        });
                    }
                });
            }
        });

        function availableTimes(){
            if(doctorSelect.value && dateSelect.value){
                const doctor_id = doctorSelect.value;
                const appointment_date = dateSelect.value;
                $.ajax({
                    url: `/appointments/get-times/${doctor_id}/${appointment_date}`,
                    method: "GET",
                    success: function(response) {
                        timeSelect.innerHTML = `<option value="">-- Select Time --</option>`;
                        response.forEach(time => {
                            if(time.booked){
                                timeSelect.innerHTML += `<option disabled value="${time.id}">${time.appointment_hour} (Booked)</option>`;
                            } else {
                                timeSelect.innerHTML += `<option value="${time.id}">${time.appointment_hour}</option>`;
                            }
                        });
                    }


                });
            }
        }

        doctorSelect.addEventListener("change", availableTimes);
        dateSelect.addEventListener("change", availableTimes);

    });

</script>

</body>
</html>
