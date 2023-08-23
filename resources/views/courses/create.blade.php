<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create course</title>
  </head>
  <body>
    <a href="{{ route('courses.index') }}">
      <button>Courses</button>
    </a>
    <a href="{{ route('students.index') }}">
      <button>Students</button>
    </a>
    <br>
    <h1>Create course</h1>
    @if(count($errors))
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <form action="{{ route('courses.store') }}" method="POST">@csrf
      <div>
        <label>Name</label>
        <input type="text" name="name">
      </div>
      <button type="submit" >SAVE</button>
    </form>
  </body>
</html>