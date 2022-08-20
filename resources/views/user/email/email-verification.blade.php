@extends('static.email')
@section('content')
    <form action="verification.verify" method="get">
        <button>Verify</button>
    </form>
@endsection