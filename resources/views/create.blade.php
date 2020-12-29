@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
        <create-form :hours="{{  json_encode($hours) }}"></create-form>
    </div>
</div>
@endsection