<!DOCTYPE html>
<html>
<head>
    <title>Contact Create</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
    </div>
     <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('contacts') }}">View All Contacts</a></li>
        <li><a href="{{ URL::to('contacts/create') }}">Create a contact</a>
    </ul>
</nav>

<h1>Create a Contact</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'contacts')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('ph_number', 'Ph Number') }}
        {{ Form::text('ph_number', Input::old('ph_number'), array('class' => 'form-control')) }}
    </div>
    
    {{ Form::submit('Create the Contact!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>