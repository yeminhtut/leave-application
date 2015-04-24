<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('projects') }}">Projects</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('projects') }}">View All Projects</a></li>
        <li><a href="{{ URL::to('projects/create') }}">Create a Project</a>
    </ul>
</nav>

<h1>All the Projects</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Project Name</td>
            <td>Created Date</td>            
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($projects as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->created_at }}</td>
            

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'projects/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Project', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('projects/' . $value->id) }}">Show this Project</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('projects/' . $value->id . '/edit') }}">Edit this Project</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>