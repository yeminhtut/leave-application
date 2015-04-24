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
        <a class="navbar-brand" href="{{ URL::to('contacts') }}">Contact Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('contacts') }}">View All Contacts</a></li>
        <li><a href="{{ URL::to('contacts/create') }}">Create a Contact</a>
    </ul>
</nav>

<h1>All the Articles</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Phone Number</td>
            <td>Created Date</td>            
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($contacts as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->ph_number }}</td>
            <td>{{ $value->created_at }}</td>
            

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'contacts/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Contact', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('articles/' . $value->id) }}">Show this Contact</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('articles/' . $value->id . '/edit') }}">Edit this Contact</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>