@extends('templates/dashboard')

@section('title')
{{__('pages/mou/starterTemplate.title')}}
@endsection

@section('subTitle')
MOU
@endsection

@push('style')

@endpush

@section('content')
<h1>{{__('pages/mou/starterTemplate.content')}}</h1>
@endsection

@push('script')

@endpush
