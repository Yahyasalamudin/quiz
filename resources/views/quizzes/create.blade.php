@extends('layouts.app')
@section('title', 'Quiz')
@section('content')
    <div id="app">
        <quiz-create :user="{{ Auth::user() }}" />
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
@endsection
