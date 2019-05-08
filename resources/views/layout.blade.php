<!DOCTYPE html>

<html>

<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <style>
    .is-complete {
      text-decoration: line-through;
    }
  </style>
</head>

<body>

  <div class="box">
    <a href="/">
      <span class="icon is-large">
        <i class="fas fa-lg fa-home"></i>
      </span>
    </a>

    <a href="/projects">
      <span class="icon is-large">
        <i class="fas fa-lg fa-folder-open"></i>
      </span>
    </a>

    <a href="/projects/create">
      <span class="icon is-large">
        <i class="fas fa-lg fa-edit"></i>
      </span>
    </a>
  </div>

  <div class="container">
    @yield('content')
  </div>

</body>

</html>
