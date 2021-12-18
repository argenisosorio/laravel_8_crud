<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create project</title>
  </head>
  <body>
    <h1>Create project</h1>
    @if(count($errors))
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <form action="{{ route('projects.store') }}" method="POST">@csrf
      <div>
        <label>Name:</label>
        <input type="text" name="name">
      </div>
      <br>
      <div>
        <label>Introduction:</label>
        <input type="text" name="introduction">
      </div>
      <br>
      <div>
        <label>Members:</label>
        <br>
        Name
        <input type="text" name="member_name">
        <br>
        DNI
        <input type="text" name="member_dni">
      </div>
      <br>
      <button type="submit" >SAVE</button>
    </form>
  </body>
</html>