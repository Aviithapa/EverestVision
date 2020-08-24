@if($selectedType =='introduction')
<h3>Indroduction</h3>
@if(isset($introduction))
{!! html_entity_decode($introduction->getContent($locale)) !!}
    @endif
@elseif($selectedType =='sales_stock')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">@lang('tableTitle.s_no')</th>
            <th scope="col">@lang('tableTitle.good')</th>
            <th scope="col">@lang('tableTitle.branch')</th>
            <th scope="col">@lang('tableTitle.stocks')</th>
            <th scope="col">@lang('tableTitle.sales')</th>
            <th scope="col">@lang('tableTitle.quota')</th>
            <th scope="col">@lang('tableTitle.till_date')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salesStocks as $key=>$saleStock)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>@if($locale ==='en')
                 {{$saleStock->good_name}}
            @else
            {{$saleStock->good_nepali_name}}
            @endif</td>
            <td>@if($locale ==='en')
                    {{$saleStock->branch_name}}
                @else
                    {{$saleStock->branch_nepali_name}}
            @endif</td>
            <td>{{$saleStock->stock_price}}</td>
            <td>{{$saleStock->sale_price}}</td>
            <td>{{$saleStock->quota}}</td>
            <td>{{$saleStock->till_date}}</td>
        </tr>
            @endforeach

        </tbody>
    </table>
    @elseif($selectedType ==='transportation')
    <p>Coming Soon</p>
    @elseif($selectedType ==='sales_price')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">@lang('tableTitle.s_no')</th>
            <th scope="col">@lang('tableTitle.good')</th>
            <th scope="col">@lang('tableTitle.branch')</th>
            <th scope="col">@lang('tableTitle.price')</th>
            <th scope="col">@lang('tableTitle.discount')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($goodPrices as $key=>$goodPrice)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>@if($locale ==='en')
                        {{$goodPrice->good_name}}
                    @else
                        {{$goodPrice->good_nepali_name}}
                    @endif</td>
                <td>@if($locale ==='en')
                        {{$goodPrice->branch_name}}
                    @else
                        {{$goodPrice->branch_nepali_name}}
                    @endif</td>
                <td>{{$goodPrice->price}}</td>
                <td>{{$goodPrice->discount}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    @elseif($selectedType ==='purchase')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">@lang('tableTitle.s_no')</th>
            <th scope="col">@lang('tableTitle.good')</th>
            <th scope="col">@lang('tableTitle.branch')</th>
            <th scope="col">@lang('tableTitle.price')</th>
            <th scope="col">@lang('tableTitle.quantity')</th>
            <th scope="col">@lang('tableTitle.quota')</th>
            <th scope="col">@lang('tableTitle.percentage')</th>
            <th scope="col">@lang('tableTitle.till_date')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($purchases as $key=>$purchase)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>@if($locale ==='en')
                        {{$purchase->good_name}}
                    @else
                        {{$purchase->good_nepali_name}}
                    @endif</td>
                <td>@if($locale ==='en')
                        {{$purchase->branch_name}}
                    @else
                        {{$purchase->branch_nepali_name}}
                    @endif</td>
                <td>{{$purchase->price}}</td>
                <td>{{$purchase->quantity}}</td>
                <td>{{$purchase->quota}}</td>
                <td>{{$purchase->percentage}}</td>
                <td>{{$purchase->till_date}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endif
