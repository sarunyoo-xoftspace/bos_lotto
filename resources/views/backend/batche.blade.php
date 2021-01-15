@extends('layouts.master')

@section('title')
    - {{ __('label.batche')}}
@endsection

@section('content')
    
    @livewire("batche")

@endsection