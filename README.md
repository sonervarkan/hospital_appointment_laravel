# Hospital Appointment Management System - Laravel

This project is a Laravel-based Appointment Management System that allows managing departments, doctors, patients, appointment hours, and appointments through a clean and simple user interface.
It includes full CRUD functionality for all entities and is structured with Blade templates, controllers, models, and custom CSS files.

## Features
### Departments

Add, edit, delete, and list departments.

### Doctors

Add, edit, delete, and list doctors.

Each doctor is linked to a department.

### Patients

Add, edit, delete, and list patients.

Includes name, surname, and TC number.

### Appointment Times

Add, edit, delete, and list available appointment hours.

### Appointments

Create appointments by selecting:

Department

Doctor

Patient

Appointment Hour

Full CRUD operations.

### Navigation

Custom navigation bar with links to all modules.

## Project Structure
```
laravel-appointment-system/
 ├── app/
 │   ├── Http/
 │   │   ├── Controllers/
 │   │   │   ├── DepartmentController.php
 │   │   │   ├── DoctorController.php
 │   │   │   ├── PatientController.php
 │   │   │   ├── TimeController.php
 │   │   │   └── AppointmentController.php
 │   ├── Models/
 │       ├── Department.php
 │       ├── Doctor.php
 │       ├── Patient.php
 │       ├── Time.php
 │       └── Appointment.php
 │
 ├── resources/
 │   ├── views/
 │   │   ├── welcome.blade.php
 │   │   ├── departments/
 │   │   ├── doctors/
 │   │   ├── patients/
 │   │   ├── times/
 │   │   └── appointments/
 │   ├── css/
 │       ├── navbar.css
 │       └── table.css
 │
 ├── public/
 ├── routes/
 │   ├── web.php
 │
 ├── package.json
 ├── tailwind.config.js (if used)
 ├── vite.config.js
 └── README.md
```
## Installation & Setup

Follow these steps to run the project locally:

1️⃣ Clone the repository
git clone https://github.com/yourusername/laravel-appointment-system.git
cd laravel-appointment-system

2️⃣ Install PHP dependencies
composer install

3️⃣ Install Node.js dependencies
npm install

4️⃣ Configure environment file
cp .env.example .env
php artisan key:generate


Update database settings in your .env file.

5️⃣ Run migrations
php artisan migrate

6️⃣ Start development servers

Laravel server:

php artisan serve


Vite / Frontend assets:

npm run dev


Then open:

http://127.0.0.1:8000

## Views Included (Blades)
### Patients

create.blade.php – Add new patient

edit.blade.php – Edit patient

index.blade.php – Patient list

### Appointment Times

create.blade.php – Add new time

edit.blade.php – Edit time

index.blade.php – Time list

### Welcome Page

welcome.blade.php – Navigation for all modules

All views include a custom navigation bar using:

/resources/css/navbar.css


Tables use:

/resources/css/table.css

## Technologies Used

Laravel 11+

PHP 8+

Blade templating

TailwindCSS (via Vite)

Vite bundler

Bootstrap (optional)

Custom CSS files

### NPM Packages

axios

vite

laravel-vite-plugin

tailwindcss

concurrently

jquery - ajax

## Routes Overview

Key routes from web.php:

/patients → list patients

/patients/create → add patient

/patients/{id}/edit → edit patient

Similar routes exist for:

Departments

Doctors

Appointment Times

Appointments

## License

This project  has no license.

## Contributing

Fork the repository

Create a new branch

Commit your changes

Open a pull request
