@extends('layouts.master')

@section('title')
    - {{ __('label.lottery_bet')}}
@endsection

@section('content')

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-8 col-md-8 mb-6">
            @livewire('lottery-bet')
        </div>
        <div class="col-xl-4 col-md-4 mb-6">
            @livewire('list-bet-number')
        </div>

    </div>


@endsection
