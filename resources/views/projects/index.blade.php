<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List of projects</title>
  </head>
  <body>
    @if(Session::has('success'))
      Message: {{ Session::get('success') }}
    @endif
    <h1>List of projects</h1>
    <a href="{{ route('projects.create') }}">
      <button>NEW</button>
    </a>
    <br />
    <br />
    <table border="1px" cellspacing="0px" style="width:100%;">
      <thead>
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">Name</th>
          <th class="text-center">Introduction</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($projects as $project)
      <tr>
        <td class="text-center">{{ $project->id }}</td>
        <td class="text-center">{{ $project->name }}</td>
        <td class="text-center">{{ $project->introduction }}</td>
        <td>
          <a href="{{ route('projects.edit', $project->id) }}">
            <button>UPDATE</button>
          </a>
          <a href="{{ route('projects.show', $project->id) }}">
            <button>SHOW</button>
          </a>
          <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
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