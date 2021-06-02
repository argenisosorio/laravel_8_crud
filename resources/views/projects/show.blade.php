<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show project</title>
  </head>
  <body>
    <h1>Show project</h1>
    <p>
      Name: {{ $project->name }}
    </p>
    <p>
      Introduction: {{ $project->introduction }}
    </p>
    <p>
      Created at: {{ $project->created_at }}
    </p>
  </body>
</html>