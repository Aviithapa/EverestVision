@if(!isset($empty))

    @if($selectedFieldType=='branch')
<option value="">@lang('title.select') @lang('title.branch')</option>

@elseif($selectedFieldType==='district')
    <option value="">@lang('title.select') @lang('title.district')</option>
    @endif
@foreach($datas as $data)
    <option value="{{$data->id}}">{{$data->getName($locale)}}</option>
@endforeach
    @else
    @if($selectedFieldType!=='branch')
        <option value="">@lang('title.select') @lang('title.branch')</option>

    @elseif($selectedFieldType!=='district')
        <option value="">@lang('title.select') @lang('title.district')</option>
    @endif
    @endif
