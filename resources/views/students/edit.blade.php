<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update student</title>
  </head>
  <body>
    <a href="{{ route('courses.index') }}">
      <button>Courses</button>
    </a>
    <a href="{{ route('students.index') }}">
      <button>Students</button>
    </a>
    <br>
    <h1>Update student</h1>
    @if(count($errors))
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <form action="{{ route('students.update', $student->id) }}" method="POST"> 
      @csrf 
      @method('PUT')
      <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ $student->name }}">
      </div>
      <div>
        <label>Courses</label>
        <select name="selected_courses[]">
          @foreach ($courses as $course)
            <option value="{{ $course->id }}" 
              {{ in_array($course->id, $student->courses->pluck('id')->toArray()) ? 'selected' : '' }}>
              {{ $course->name }}
            </option>
          @endforeach
        </select>
      </div>
      <button type="submit">SAVE</button>
    </form>
  </body>
</html>
