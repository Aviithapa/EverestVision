@if(isset($model))
    {{ Form::model($model, ['url' => route($common_route.'.update', $model->id), 'method' => 'PUT','files' => true]) }}
@else
    {{ Form::open(['url' => route($common_route.'.store'), 'method' => 'post', 'files' => true]) }}
@endif

<div class="grid simple ">
    <div class="grid-title">
        <h4>Menu</h4>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
        </div>
    </div>
    <div class="grid-body ">

        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('name', 'Name:', ['class' => 'form-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('slug', 'Slug:', ['class' => 'form-label']) !!}
                    {!! Form::text('slug', null, ['class' => 'form-control','required','unique']) !!}
                    {!! $errors->first('slug', '<div class="text-danger">:message</div>') !!}
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('display_order', 'Display Order:', ['class' => 'form-label']) !!}
                    {!! Form::number('display_order',null, ['class' => 'form-control','required'=>'required']) !!}
                    {!! $errors->first('display_order', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('url', 'Url:', ['class' => 'form-label']) !!}
                    {!! Form::textarea('url',null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('url', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('excerpt', 'Excerpt:', ['class' => 'form-label']) !!}
                    {!! Form::textarea('excerpt',null, ['class' => 'form-control']) !!}
                    {!! $errors->first('excerpt', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('content', 'Content:', ['class' => 'form-label']) !!}
                    {!! Form::textarea('content',null, ['class' => 'form-control text-editor','id'=>'text-editor']) !!}
                    {!! $errors->first('content', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>

    </div>
</div>

    <div class="grid simple ">
        <div class="grid-title">
            <h4>Image</h4>
            <div class="tools">
                <a href="javascript:;" class="collapse"></a>
            </div>
        </div>

        <div class="grid-body ">
            <div class="row">


                <div class="col-md-12 col-lg-12">

                    @if(isset($model))
                        <img src="{{url(isset($model)?$model->getProgramImage():imageNotFound())}}" height="250"
                             id="program_pic_img">

                    @else
                        <img src="{{isset($model)?$model->getProgramImage():imageNotFound()}}" height="250"
                             id="program_pic_img">
                    @endif
                </div>
                <div class="form-group col-md-12 col-lg-12">
                    {!! Form::label('slider', 'Image:') !!}
                    <small>Size: 1600*622 px</small>
                    <input type="file" id="program_pic" name="program_pic_image"
                           onclick="anyFileUploader('program_pic')">
                    <small id="slider_help_text" class="help-block"></small>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                         aria-valuemax="100"
                         aria-valuenow="0">
                        <div id="program_pic_progress" class="progress-bar progress-bar-success"
                             style="width: 0%">
                        </div>
                    </div>
                    <input type="hidden" id="program_pic_path" name="program_pic" class="form-control"
                           value="{{isset($model)?$model->image:''}}"/>
                    {!! $errors->first('image', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary"/>
                <a href="{{URL::previous()}}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>

    {{ Form::close() }}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="render-view"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    @push('scripts')
        <script>
            var i = 0;
            {{--var i ={!!$i !!};--}}
            {{--var y ={!! $y !!};--}}
            {{--var z ={!! $z  !!};--}}
        </script>
        @include('admin.partials.common.common_js   ');
        @include('admin.partials.common.file-upload');

        <script>
            toggleFeature('is_feature', $('[name=is_feature]').val());
        </script>

{{--<script>--}}
{{--var fuel=$('[name=fuel_type]').val()--}}
{{--fuelType(fuel);--}}
{{--$('[name=fuel_type]').click(function(){--}}
{{--fuelType($(this).val())--}}
{{--})--}}
{{--function fuelType(fuelType){--}}
{{--console.log(fuelType)--}}
{{--if(fuelType ==='Petrol' || fuelType=== 'Diesel'){--}}
{{--$('.liq_fuel').show()--}}
{{--$('.electric').hide()--}}
{{--}else if(fuelType==='Electric'){--}}
{{--$('.liq_fuel').hide()--}}
{{--$('.electric').show()--}}
{{--}else{--}}
{{--$('.liq_fuel').hide()--}}
{{--$('.electric').hide()--}}
{{--}--}}
{{--}--}}

{{--$('.add_colour_images').click(function (e) {--}}
{{--var colour_id = $(this).attr('data-id');--}}
{{--console.log(colour_id);--}}
{{--$.ajax({--}}
{{--method: "GET",--}}
{{--data:{--}}
{{--'colour_id':colour_id--}}
{{--},--}}
{{--url: "{{route('dashboard.vehicles.variants.available-colours.images')}}",--}}
{{--success:function(result){--}}
{{--$('.render-view').html(result.data.html);--}}
{{--}--}}

{{--})--}}
{{--$('#myModal').modal('show');--}}
{{--})--}}

{{--</script>--}}
@endpush
