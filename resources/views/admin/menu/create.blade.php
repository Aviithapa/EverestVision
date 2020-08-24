@extends('admin.layout.app')

@section('content')
    @include('admin.partials.common.page-title', ['page_title' => 'Create New '.$common_name])
    <div>
        <div class="row-fluid">
            <div class="span12">
                @include($common_view.'form')
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush