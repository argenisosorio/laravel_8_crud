<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update project</title>
  </head>
  <body>
    <h1>Update project</h1>
    @if(count($errors))
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <form action="{{ route('projects.update', $project->id) }}" method="POST"> @csrf @method('PUT')
      <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ $project->name }}">
      </div>
      <div>
        <label>Introduction</label>
        <input type="text" name="introduction" value="{{ $project->introduction }}">
      </div>
      <button type="submit" >SAVE</button>
    </form>
  </body>
</html>