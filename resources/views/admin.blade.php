@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
        <admin-panel :permissions="{{  $permissions }}"></admin-panel>
    </div>
</div>
@endsection