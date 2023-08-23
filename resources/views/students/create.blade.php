<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create student</title>
  </head>
  <body>
    <h1>Create student</h1>
    @if(count($errors))
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <form action="{{ route('students.store') }}" method="POST">@csrf
      <div>
        <label>Name</label>
        <input type="text" name="name">
      </div>
      <button type="submit" >SAVE</button>
    </form>
  </body>
</html>