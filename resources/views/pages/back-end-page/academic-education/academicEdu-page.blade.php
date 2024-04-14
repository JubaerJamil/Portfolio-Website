@extends('layout.back-end-layout.app')
@section('content')
    @include('components.back-end.academic-education.academicEdu-list')
    @include('components.back-end.academic-education.academicEdu-create')
    @include('components.back-end.academic-education.academicEdu-update')
    @include('components.back-end.academic-education.academicEdu-delete')
@endsection
