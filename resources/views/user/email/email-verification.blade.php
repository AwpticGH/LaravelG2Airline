@extends('static.email')
@section('content')
    <form action="{{ route('verification.verify') }}" method="get">
        <input type="hidden" name="id" value={{ auth()->user()->id }}>

        @csrf
        <button>Verify</button>
    </form>
@endsection
