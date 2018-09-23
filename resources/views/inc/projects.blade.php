<h1>Your Projects</h1>
@if( count($projects) )
  <p><a href="/project">Create a new project</a></p>
  @foreach( $projects as $project )
    <div class="well">
        <h3>{{$project->title}}</h3>
        <small>Created on {{$project->created_at}}</small>
        <a href="/project/{{$project->id}}" class="btn btn-primary">Edit</a>
        {!! Form::open(['action' => ['ProjectsController@delete', $project->id], 'method' => 'POST', 'style' => 'float:right;']) !!}
          {{Form::hidden('_method', 'DELETE')}}
          {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!}
    </div>
  @endforeach
@else
  <p><a href="/project">Create your first project</a></p>
@endif
