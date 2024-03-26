@extends('layout.back-end-layout.app')

@section('content')
    @include('components.back-end.skill.skill-list')
    @include('components.back-end.skill.skill-create')
    @include('components.back-end.skill.skill-delete')
    @include('components.back-end.skill.skill-update')
@endsection
