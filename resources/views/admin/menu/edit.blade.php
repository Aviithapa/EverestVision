@extends('admin.layout.app')

@section('content')
    @include('admin.partials.common.page-title', ['page_title' => 'Edit '.$common_name])
    <div>
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-title">
                        <h4>Fields with * are required.</h4>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="grid-body ">
                        @include($common_view.'form', ['model' => $school])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection