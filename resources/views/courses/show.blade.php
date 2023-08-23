<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show course</title>
  </head>
  <body>
    <a href="{{ route('courses.index') }}">
      <button>Courses</button>
    </a>
    <a href="{{ route('students.index') }}">
      <button>Students</button>
    </a>
    <br>
    <h1>Show course</h1>
    <p>
      Name: {{ $course->name }}
    </p>
    <p>
      Created at: {{ $course->created_at }}
    </p>
  </body>
</html>