@extends('layouts.master')

@section('title')
    - {{ __('รับผิดชอบจ่าย')}}
@endsection

@section('content')

    @livewire("payment-limit")
    
@endsection