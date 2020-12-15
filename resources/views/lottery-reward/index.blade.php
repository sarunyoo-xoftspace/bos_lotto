@extends('layouts.master')

@section('title')
    - {{ __('label.lottery_reward') }}
@endsection

@section('content')
    @livewire('lottery-reward')
@endsection
