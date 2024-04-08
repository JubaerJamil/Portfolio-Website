@extends('layout.back-end-layout.app')
@section('content')
    @include('components.back-end.project.project-list')
    @include('components.back-end.project.project-create')
    @include('components.back-end.project.project-update')
    @include('components.back-end.project.project-delete')
@endsection
