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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('pages/mou/create.card-title')}}
                    </div>
                    <div class="card-category">{{__('pages/mou/create.card-category')}}</div>                    
                </div>
                @component('components/forms/mou_moa_ia')
                    @slot('form_method')
                        POST                    
                    @endslot
                    @slot('form_id')
                        form_mou
                    @endslot                    
                    @slot('form_action')
                        /mou
                    @endslot
                    @slot('document_category')
                        MOU
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>           
</section>

@endsection

@push('script')   
@endpush
