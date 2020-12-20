@extends('layouts.master')

@section('title')
    - {{ __('label.check_bet_correct')}}
@endsection

@section('content')
    @livewire('check-bet-correct')
@endsection
