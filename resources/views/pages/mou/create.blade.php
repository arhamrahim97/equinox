@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/mou/create.title')}}
@endsection

@section('title')
{{__('pages/mou/create.title')}}
@endsection

@section('subTitle')
{{__('pages/mou/create.subTitle')}}
@endsection

@push('style')

@endpush

@section('content')
<section>    
    <div class="row mb-3">
        {{-- <div class="col-12">
            @component('components.buttons.add')
                @slot('href')
                    /mou/create
                @endslot
            @endcomponent
        </div> --}}
    </div>
       
</section>

@endsection

@push('script')

@endpush
