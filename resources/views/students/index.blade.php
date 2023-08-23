<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List of students</title>
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
<h1>List of students</h1>
<a href="{{ route('students.create') }}">
  <button>NEW</button>
</a>
<br />
<br />
<table border="1px" cellspacing="0px" style="width:100%;">
  <thead>
  <tr>
    <th class="text-center">ID</th>
    <th class="text-center">Name</th>
    <th class="text-center">Courses</th>
    <th class="text-center">Actions</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($students as $student)
    <tr>
      <td class="text-center">{{ $student->id }}</td>
      <td class="text-center">{{ $student->name }}</td>
      <td class="text-center">
        @foreach ($student->courses as $course)
          {{ $course->name }}
          @unless ($loop->last)
            ,
          @endunless
        @endforeach
      </td>
      <td>
        <a href="{{ route('students.edit', $student->id) }}">
          <button>UPDATE</button>
        </a>
        <a href="{{ route('students.show', $student->id) }}">
          <button>SHOW</button>
        </a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
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
