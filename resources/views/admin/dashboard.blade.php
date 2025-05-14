@extends('layouts.app')


@section('content')
<div class="card">
  <div class="card-body">
    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="alert alert-secondary" role="alert">
          Hallo {{ Auth::user()->name }}, Selamat Datang Di Website PPDB Online
        </div>
        @if (session('success'))
        <div
          style="padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; margin-bottom: 15px;">
          {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div
          style="padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; margin-bottom: 15px;">
          {{ session('error') }}
        </div>
        @endif
        @if ($errors->any())
        <div
          style="padding: 10px; background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; margin-bottom: 15px;">
          <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection