<!-- app/views/nerds/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
    </div>
     <ul class="nav navbar-nav">
        <?php 
            if (Auth::check()){?>
                <li><a href="{{ URL::to('logout') }}">Logout</a>
        <?php  }  ?>
        
    </ul>
</nav>

<?php echo $leaves->annual_leave; ?>

</div>
</body>
</html>