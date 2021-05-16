@extends('layouts.main')
@section('content')
<div class="section text-center">
<h3>{{$course->name_fa}}</h3>
{{$course->description}}
<form action="{{url('/courseusers/store/'.$course->id)}}" class="row" method="post">
@csrf
    <div class="form-group col-6">
        <label for="fnameInput">نام</label>
        <input class="form-control" id="fnameInput" type="text" name="fname" >
    </div>

    <div class="form-group col-6">
        <label for="lnameInput">نام خانوادگی</label>
        <input class="form-control" id="lnameInput" type="text" name="lname" >
    </div>

    <div class="form-group col-6">
        <label for="phoneInput">شماره تماس</label>
        <input class="form-control" id="phoneInput" type="text" name="phone" >
    </div>

    <div class="form-group col-6">
        <label for="emailInput">ایمیل</label>
        <input class="form-control" id="emailInput" type="text" name="email" >
    </div>

    <div class="form-group col-12 text-left">
        <button type="submit" class="btn btn-primary">ثبت نام</button>
    </div>
</form>
</div>
@stop


