@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
        <example-component :user="{{ auth()->user() }}"></example-component>
    </div>
</div>
@endsection
