@extends('layout.back-end-layout.app')
@section('content')
    @include('components.back-end.pro-education.pro-edu-list')
    @include('components.back-end.pro-education.pro-edu-create')
    @include('components.back-end.pro-education.pro-edu-update')
    @include('components.back-end.pro-education.pro-edu-delete')
@endsection
