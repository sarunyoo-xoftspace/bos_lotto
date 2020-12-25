@extends('layouts.master')

@section('title')
    หน้าแรก
@endsection

@section('content')
    @livewire('dashboard')
    <br>
    @livewire('clear-transaction')
@endsection
