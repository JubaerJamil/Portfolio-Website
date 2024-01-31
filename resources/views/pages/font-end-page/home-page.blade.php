@extends('layout.font-end-layout.master')
@section('content')
    @include('components.font-end.home-page.about')
    {{-- @include('components.font-end.facts') --}}
    @include('components.font-end.home-page.skills')
    @include('components.font-end.home-page.resume')
    @include('components.font-end.home-page.portfolio')
    @include('components.font-end.home-page.services')
    @include('components.font-end.home-page.testimonials')
    @include('components.font-end.home-page.contact')
@endsection
