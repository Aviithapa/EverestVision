@if(isset($model))
    {{ Form::model($model, ['url' => route('dashboard.sliders.update', $model->id), 'method' => 'PUT','files' => true]) }}
@else
    {{ Form::open(['url' => route('dashboard.sliders.store'), 'method' => 'post', 'files' => true]) }}
@endif

<div class="grid simple ">
    <div class="grid-title">
        <h4>Gallery Info</h4>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
        </div>
    </div>
    <div class="grid-body ">

        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('title', 'Title:', ['class' => 'form-label']) !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<div class="text-danger">:message</div>') !!}
                </div>

            </div>

            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('slug', 'Slug:', ['class' => 'form-label']) !!}
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('slug', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('link', 'Youtube Link:', ['class' => 'form-label']) !!}
                    {!! Form::text('link', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('link', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>


        </div>

    </div>
</div>

<div class="grid simple ">
    <div class="grid-title">
        <h4>Gallery Image</h4>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
        </div>
    </div>
    <div class="grid-body ">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('type', 'Sub Type:', ['class' => 'form-label']) !!}
                    {!! Form::select('type',getGalleryType() ,null, ['class' => 'form-control']) !!}
                    {!! $errors->first('type', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('type', 'Sub Type:', ['class' => 'form-label']) !!}
                    {!! Form::select('meta_data',getSliderType() ,null, ['class' => 'form-control']) !!}
                    {!! $errors->first('meta_data', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('type', 'Category:', ['class' => 'form-label']) !!}
                    {!! Form::select('template_data',$category->pluck('title','id'),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('template_data', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('style', 'Style:', ['class' => 'form-label']) !!}
                    {!! Form::select('style',getStyle(),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('style', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                @if(isset($model))
                    @if($model->meta_data == 'image')
                        <img src="{{isset($model)?$model->getGalleryFile():imageNotFound()}}" height = "250" id="gallery_img">
                    @elseif($model->meta_data=='video')
                        <video width="320" height="240" controls>
                            <source src="{{$model->getGalleryFile()}}" type="video/mp4">
                        </video>
                        @else
                        <audio controls>
                            <source src="{{$model->getGalleryFile()}}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    @endif
                @else
                    <img src="{{isset($model)?$model->getGalleryFile():imageNotFound()}}" height = "250" id="gallery_img">
                @endif
            </div>

            <div class="form-group col-md-12 col-lg-12">
                {!! Form::label('slider', 'Image:') !!}
                <small>Size: 1600*622 px</small>
                <input type="file" id="gallery" name="gallery_image" onclick="anyCommonFileUploader('gallery')">
                <small id="slider_help_text" class="help-block"></small>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                     aria-valuemax="100"
                     aria-valuenow="0">
                    <div id="gallery_progress" class="progress-bar progress-bar-success"
                         style="width: 0%">
                    </div>
                </div>
                <input  type="hidden" id="gallery_path" name="gallery" class="form-control"
                        value="{{isset($model)?$model->image_id:''}}"/>
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


@push('scripts')
    @include('admin.partials.common.file-upload');
@endpush
