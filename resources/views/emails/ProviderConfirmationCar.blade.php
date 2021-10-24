@if($provider->profile->language == 'EN')
@component('mail::message')
# Introduction

Eil-Baz to ensure that the driver will participate in your car
<div>The driver's name is: {{$provider->first_name}} {{$provider->last_name}}</div>
@component('mail::button', ['url' => url('/provider/confirm/car/'. $provider_car->id . '/'. $provider->id. '/'. $car->id)])
    Please confirm that the driver is working on your car
@endcomponent

@component('mail::button', ['url' => url('/provider/confirm/car_not/'. $provider_car->id . '/'. $provider->id. '/'. $car->id)])
    Please confirm that the driver is  will not work on your car
@endcomponent

<p>Your reset code car is : {{$car->car_code}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
@else   {{--   if($provider_car->profile->language == 'AR')--}}
@component('mail::message')
# Introduction
يرجى التاكيد ان السائق يعمل على السياره الخاصه بك
<div>{{$provider->first_name}} {{$provider->last_name}} .اسم السائق</div>

@component('mail::button', ['url' => url('/provider/confirm/car/'. $provider_car->id . '/'. $provider->id. '/'. $car->id)])
    يرجى التاكيد ان السائق لا يعمل على السياره الخاصه بك
@endcomponent

@component('mail::button', ['url' => url('/provider/confirm/car_not/'. $provider_car->id . '/'. $provider->id. '/'. $car->id)])
لن يشارك فى السياره الخاصه بك
@endcomponent

<p>كود السياره الخاصه بك : {{$car->car_code}}</p>

شكرا , <br>
{{ config('app.name') }}
@endcomponent
@endif
