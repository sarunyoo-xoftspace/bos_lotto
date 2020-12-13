@extends('layouts.master')


@section('title')
    - {{ __('label.price_setups_title') }}
@endsection

@section('content')
    @livewire("price-setups")
@endsection
