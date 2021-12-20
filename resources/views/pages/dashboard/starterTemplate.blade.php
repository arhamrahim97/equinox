@extends('templates/dashboard')

@section('title')
{{__('pages/dashboard/starterTemplate.title')}}
@endsection

@section('subTitle')
{{__('pages/dashboard/starterTemplate.subTitle')}}
@endsection


@push('style')

@endpush

@section('content')
<h1>{{__('pages/dashboard/starterTemplate.content')}}</h1>
@endsection

@push('script')

@endpush
