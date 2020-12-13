@extends('layouts.master')

@section('title')
    - {{ __('label.number_limit_title') }}
@endsection

@section('content')
    @livewire('number-limit')
@endsection

