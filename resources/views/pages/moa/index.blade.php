@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/moa/index.title')}}
@endsection

@section('title')
{{__('pages/moa/index.title')}}
@endsection

@section('subTitle')
{{__('pages/moa/index.subTitle')}}
@endsection

@push('style')

@endpush

@section('content')
<section>    
    <div class="row mb-3">
        <div class="col-12">
            @component('components.buttons.add')
                @slot('href')
                    /moa/create
                @endslot
            @endcomponent
        </div>
    </div>   
</section>

@endsection

@push('script')

@endpush
