<div class="col-sm-12 nfc-glev nfc-notice">
    <h4>Today's Goods Price</h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Goods</th>
            <th scope="col">Price(Rs.)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($goodPrices as $goodprice)
            <tr>
                <td scope="row">{{$goodprice->getName($locale)}} </td>
                <td>{{$goodprice->price}}/Kg ({{$goodprice->discount}}% dis)</td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>
@if($goodPrices->total() >0)
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item {{$goodPrices->previousPageUrl()===null?"disabled":"branch_paginate"}}" data-page="{{$goodPrices->currentPage()-1}}">
                <a class="page-link" tabindex="-1" >Previous</a>
            </li>
            @for($i=1;$i<=ceil($goodPrices->total()/$goodPrices->perPage());$i++)

                <li class="page-item {{$i===$goodPrices->currentPage()?'active':''}} branch_paginate" data-id="{{$i}}"><a class="page-link"  href="#">{{$i}}</a></li>
                {{--                        <li class="page-item active">--}}
                {{--                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>--}}
                {{--                        </li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
            @endfor

            <li class="page-item  {{$goodPrices->nextPageUrl()===null?"disabled":"branch_paginate"}}"  data-id="{{$goodPrices->currentPage()+1}}">
                <a class="page-link" >Next</a>
            </li>
        </ul>
    </nav>
    <script>
        $('.branch_paginate').click(function () {
            $.ajax({
                url:"{{url('branch_goods/ajax')}}",
                method:"GET",
                data:{
                    branch_id:"{{$branch_id}}",
                    page:$(this).attr('data-id')
                },
                success:function(response){
                    $('.branch-goods').html(response.data)
                }
            })
        })
    </script>
@endif
