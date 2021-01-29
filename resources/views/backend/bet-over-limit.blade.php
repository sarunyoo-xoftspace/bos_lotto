@extends('layouts.master')

@section('title')
    - {{ __('รายการโพยเกินกำหนด') }}
@endsection

@section('content')

    @livewire("bet-over-limit")

@endsection
