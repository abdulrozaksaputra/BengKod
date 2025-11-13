@extends('layouts.app')

@section('content')
<div>
  <h1>Pasien Dashboard</h1>
  <p>Selamat datang, {{ Auth::user()->nama ?? Auth::user()->email }} (role: {{ Auth::user()->role }})</p>
</div>
@endsection
