@extends('layouts.master')

@section('title')
    - {{ __('label.lottery_bet')}}
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6 col-md-6 mb-6">
            @livewire('lottery-bet')
        </div>
        <div class="col-xl-6 col-md-6 mb-6">
            @livewire('list-bet-number')
        </div>
    </div>
@endsection
