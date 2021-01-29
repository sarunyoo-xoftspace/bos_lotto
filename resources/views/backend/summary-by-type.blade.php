@extends('layouts.master')

@section('title')
    - {{ __('สรุปหวยรายประเภท') }}
@endsection

@section('content')

    @livewire("summary-by-type")

@endsection
