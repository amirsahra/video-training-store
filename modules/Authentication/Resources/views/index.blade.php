@extends('authentication::layouts.master')

@section('content')
    <livewire:authentication::auth :token="$token ?? ''">
@endsection
