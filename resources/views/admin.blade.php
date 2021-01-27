@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
        <admin-panel :languages="{{  $languages }}" :rooms="{{  $rooms }}" :permissions="{{  $permissions }}" :users="{{ json_encode($users) }}"></admin-panel>
    </div>
</div>
@endsection