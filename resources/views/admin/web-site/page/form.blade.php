@if(isset($model))
    {{ Form::model($model, ['url' => route($commonRoute.'.update', $model->id), 'method' => 'PUT','files' => true]) }}
@else
    {{ Form::open(['url' => route($commonRoute.'.store'), 'method' => 'post', 'files' => true]) }}
@endif
<ul class="nav nav-tabs" role="tablist">
    <li class="active">
        <a href="#tab1English" role="tab" data-toggle="tab">English</a>
    </li>
    <li>
        <a href="#tab1Nepali" role="tab" data-toggle="tab">Nepali</a>
    </li>


</ul>
<div class="tab-content">
    <div class="tab-pane active" id="tab1English">
        <div class="row column-seperation">
<div class="grid simple ">
    <div class="grid-title">
        <h4> Info</h4>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
        </div>
    </div>
    <div class="grid-body ">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('title', 'Name:', ['class' => 'form-label']) !!}
                    {!! Form::text('title', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('title', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>


            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('slug', 'Slug:', ['class' => 'form-label']) !!}
                    {!! Form::text('slug', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('slug', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('content', 'Content:', ['class' => 'form-label']) !!}
                    {!! Form::textarea('content',null, ['class' => 'form-control ckeditor','id'=>'text-editor','required']) !!}
                    {!! $errors->first('content', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('excerpt', 'Excerpt:', ['class' => 'form-label']) !!}
                    {!! Form::text('excerpt', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('excerpt', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('type', 'type:', ['class' => 'form-label']) !!}
                    {!! Form::select('type',array('pages' => 'pages') ,null, ['class' => 'form-control']) !!}
                    {!! $errors->first('type', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">

            <div class="form-group">
                {{ Form::label('template',' Template') }}
                <select name="template_page" id="template_page" class="form-control" onload="templateclick()">
                    <option value=""></option>
                    @foreach($files_directory as $file_directory)

                            <option id="{{$file_directory}}" value="{{$file_directory}}" {{isset($model->template_page) && $file_directory===$model->template_page?'selected':''}}>{{$file_directory}}</option>
                            <!--                                    <option id="template" value="template">template</option>-->
                    @endforeach

                </select>
            </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('Sub type', 'Sub type:', ['class' => 'form-label']) !!}
                    {!! Form::text('meta_data',null, ['class' => 'form-control']) !!}
                    {!! $errors->first('type', '<div class="text-danger">:message</div>') !!}
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
                        <img src="{{url(isset($model)?$model->getPostImage():imageNotFound())}}" height="250"
                             id="post_pic_img">

                    @else
                        <img src="{{isset($model)?$model->getPostImage():imageNotFound()}}" height="250"
                             id="post_pic_img">
                    @endif
                </div>

                <div class="form-group col-md-12 col-lg-12">
                    {!! Form::label('slider', 'Image:') !!}
                    <small>Size: 1600*622 px</small>
                    <input type="file" id="post_pic" name="post_pic_image"
                           onclick="anyCommonFileUploader('post_pic')">
                    <small id="slider_help_text" class="help-block"></small>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                         aria-valuemax="100"
                         aria-valuenow="0">
                        <div id="post_pic_progress" class="progress-bar progress-bar-success"
                             style="width: 0%">
                        </div>
                    </div>
                    <input type="hidden" id="post_pic_path" name="post_pic" class="form-control"
                           value="{{isset($model)?$model->image_id:''}}"/>
                    {!! $errors->first('image', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>


        </div>
    </div>
    <div class="grid simple ">
        <div class="grid-title">
            <h4>Icon Image</h4>
            <div class="tools">
                <a href="javascript:;" class="collapse"></a>
            </div>
        </div>

        <div class="grid-body ">
            <div class="row">


                <div class="col-md-12 col-lg-12">
                    @if(isset($model))
                        <img src="{{url(isset($model)?$model->getLogoImage():imageNotFound())}}" height="250"
                             id="logo_image_img">

                    @else
                        <img src="{{isset($model)?$model->getLogoImage():imageNotFound()}}" height="250"
                             id="logo_image_img">
                    @endif
                </div>

                <div class="form-group col-md-12 col-lg-12">
                    {!! Form::label('slider', 'Logo Image:') !!}
                    <small>Size: 60*60 px</small>
                    <input type="file" id="logo_image" name="logo_image_image"
                           onclick="anyFileUploader('logo_image')">
                    <small id="slider_help_text" class="help-block"></small>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                         aria-valuemax="100"
                         aria-valuenow="0">
                        <div id="logo_image_progress" class="progress-bar progress-bar-success"
                             style="width: 0%">
                        </div>
                    </div>
                    <input type="hidden" id="logo_image_path" name="logo_image" class="form-control"
                           value="{{isset($model)?$model->logo_image:''}}"/>
                    {!! $errors->first('logo_image', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>


        </div>
    </div>
</div>
        </div>
    </div>
    <div class="tab-pane" id="tab1Nepali">
        <div class="row">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4>Post Info</h4>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                    </div>
                </div>
                <div class="grid-body ">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                {!! Form::label('nepali_title', 'शीर्षक:', ['class' => 'form-label']) !!}
                                {!! Form::text('nepali_title', null, ['class' => 'form-control','required']) !!}
                                {!! $errors->first('nepali_title', '<div class="text-danger">:message</div>') !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('nepali_excerpt', 'अंश:', ['class' => 'form-label']) !!}
                                {!! Form::textarea('nepali_excerpt',null, ['class' => 'form-control']) !!}
                                {!! $errors->first('nepali_excerpt', '<div class="text-danger">:message</div>') !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('nepali_content', 'सामग्री:', ['class' => 'form-label']) !!}
                                {!! Form::textarea('nepali_content',null, ['class' => 'form-control ckeditor','id'=>'ckeditor','required']) !!}
                                {!! $errors->first('nepali_content', '<div class="text-danger">:message</div>') !!}
                            </div>
                        </div>

                    </div>

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


@push('scripts')
    @include('admin.partials.common.file-upload');
        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.config.allowedContent = true

        </script>
@endpush
