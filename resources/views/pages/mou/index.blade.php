@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/mou/index.title')}}
@endsection

@section('title')
{{__('pages/mou/index.title')}}
@endsection

@section('subTitle')
{{__('pages/mou/index.subTitle')}}
@endsection

@push('style')

@endpush

@section('content')
<section>    
    <div class="row mb-3">
        <div class="col-12">
            @component('components.buttons.add')
                @slot('href')
                    /mou/create
                @endslot
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Table heading</th>
                            <th>Table heading</th>
                            <th>Table heading</th>
                            <th>Table heading</th>
                            <th>Table heading</th>
                            <th>Table heading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                        </tr>         
                        <tr>
                            <th scope="row">1</th>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                        </tr>                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
</section>

@endsection

@push('script')
    
@endpush
