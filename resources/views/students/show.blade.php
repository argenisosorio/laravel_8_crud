<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show students</title>
  </head>
  <body>
    <a href="{{ route('courses.index') }}">
      <button>Courses</button>
    </a>
    <a href="{{ route('students.index') }}">
      <button>Students</button>
    </a>
    <br>
    <h1>Show students</h1>
    <p>
      Name: {{ $student->name }}
    </p>
    <p>
      Created at: {{ $student->created_at }}
    </p>
  </body>
</html>