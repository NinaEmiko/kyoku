@extends('layouts.app')

@section('content')


@php
if( $project !== null ) {
  $project_id = $project->id;
} else {
  $project_id = '';
}
@endphp

  {!! Form::open(['action' => ['ProjectsController@save', $project_id], 'method' => 'POST']) !!}
    @php
    $titleStyle = 'border-width: 0 0 1px 0; border-color: black; font-size: 2rem; background: transparent;';
    $titleAttributes = [ 'style' => $titleStyle, 'class' => 'form-control'];
    if( $project !== null ) {
      $titleValue = $project->title;
    } else {
      $titleAttributes['placeholder'] = 'Enter Project Title';
      $titleValue = '';
    }
    @endphp
    <div class="form-group">
      {{Form::text('title', $titleValue, $titleAttributes)}}
    </div>
    <div class="form-group">
      {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
    </div>
  {!! Form::close() !!}

@endsection
