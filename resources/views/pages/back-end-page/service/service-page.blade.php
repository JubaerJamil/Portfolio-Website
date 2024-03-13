@extends('layout.back-end-layout.app')
@section('content')
    @include('components.back-end.service.service-list')
    @include('components.back-end.service.service-create')
    @include('components.back-end.service.service-delete')
    @include('components.back-end.service.service-update')
@endsection
