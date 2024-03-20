@extends('layout.back-end-layout.app')
@section('content')
        @include('components.back-end.certificate.certificate-list')
        @include('components.back-end.certificate.certificate-upload')
        @include('components.back-end.certificate.certificate-delete')
@endsection
