@extends('layouts.master')

@section('title')
    - {{ __('label.bet_transactions')}}
@endsection

@section('content')
    @livewire("bet-transaction")
@endsection