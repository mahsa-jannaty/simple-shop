@extends('layouts.main')
@section('content')
<div class="section text-right">
<h4>اطلاعات دوره</h4>
<strong>نام دوره: </strong> {{$courseUser->course->name_fa}} <br>
<strong>توضیحات دوره: </strong> {{$courseUser->course->description}} <br>

<hr>
<h4>اطلاعات کاربر</h4>
<strong>نام: </strong> {{$courseUser->user->fname}} <br>
<strong>نام خانوادگی: </strong> {{$courseUser->user->lname}} <br>
<strong>شماره تماس: </strong> {{$courseUser->user->phone}} <br>
<strong>ایمیل: </strong> {{$courseUser->user->email}} <br>



<form action="{{url('/transactions/store/'.$courseUser->id)}}" method="POST" class="row">
@csrf
<div class="col-4"></div>
<div class="form-group col-4">
    <label>کد تخفیف</label>
    <input type="text" name="discountCode" class="form-control discountInput">
    <span class="btn btn-primary float-left checkDiscountBtn">بررسی</span>
</div>
<div class="form-group col-4 text-left">
    <button class="btn btn-primary" type="submit">تایید و پرداخت</button> 
</div>
</form>
</div>
@stop

@section('scripts')
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
    }
});
$('.checkDiscountBtn').click(function() {
    var code = $('.discountInput').val();
    
    $.ajax({
        type:'POST',
        url:'/discounts/check/' + code,
        success:function(data) {
            console.log(data.percent);
                // {
                    // alert('its okay');
                // }
        }
    });
})
</script>

@stop