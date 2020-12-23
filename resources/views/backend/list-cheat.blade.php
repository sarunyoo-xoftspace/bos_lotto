@extends('layouts.master')

@section('title')
    - {{ __('ตรวจสอบโพย')}}
@endsection

@section('content')
    @livewire("list-cheat")
@endsection