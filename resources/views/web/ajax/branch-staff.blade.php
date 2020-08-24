@foreach($branchStaffs as $headOffice)
    <div class="col-sm-3">
        <div class="nfc-staffs__box">
            <img src="{{$headOffice->getImage()}}" alt="">
            <h5>{{$headOffice->getName($locale)}}</h5>
            <p>{{$headOffice->getOffice($locale)}}</p>
            <p>{{$headOffice->getDesignation($locale)}}</p>
            <p>{{$headOffice->contact_email}}</p>
            <span><i class="fa fa-phone"></i> {{$headOffice->contact_phone_number}}</span>
        </div>
    </div>
@endforeach