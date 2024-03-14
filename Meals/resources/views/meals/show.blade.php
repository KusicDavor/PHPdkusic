<!DOCTYPE html>
<html>
  <head>
    <title>Meal {{ $meal->id }}</title>
  </head>
  <body>
    <h1>{{ $meal->title }}</h1>
    <ul>
      <li>ID: {{ $meal->id }}</li>
      <li>Title: {{ $meal->title }}</li>
      <li>Description: {{ $meal->description }}</li>
    </ul>
  </body>
</html>