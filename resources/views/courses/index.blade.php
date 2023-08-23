<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List of courses</title>
</head>
<body>
@if(Session::has('success'))
    Message: {{ Session::get('success') }}
@endif
<a href="{{ route('courses.index') }}">
  <button>Courses</button>
</a>
<a href="{{ route('students.index') }}">
  <button>Students</button>
</a>
<br>
<h1>List of courses</h1>
<a href="{{ route('courses.create') }}">
  <button>NEW</button>
</a>
<br />
<br />
<table border="1px" cellspacing="0px" style="width:100%;">
  <thead>
    <tr>
      <th class="text-center">ID</th>
      <th class="text-center">Name</th>
      <th class="text-center">Students</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($courses as $course)
    <tr>
      <td class="text-center">{{ $course->id }}</td>
      <td class="text-center">{{ $course->name }}</td>
      <td class="text-center">
        @foreach ($course->students as $student)
          {{ $student->name }}
          @unless ($loop->last)
            ,
          @endunless
        @endforeach
      </td>
      <td>
        <a href="{{ route('courses.edit', $course->id) }}">
          <button>UPDATE</button>
        </a>
        <a href="{{ route('courses.show', $course->id) }}">
          <button>SHOW</button>
        </a>
        <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Are you sure you want to delete the record? ');">DELETE</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
</body>
</html>
