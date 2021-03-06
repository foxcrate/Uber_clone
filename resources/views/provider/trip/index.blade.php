@extends('provider.layout.app')

@section('content')
<div class="pro-dashboard-head">
        <div class="container">
            <a href="{{url('provider/earnings')}}" class="pro-head-link">@lang('user.Payment Statements')</a>
            <a href="{{url('provider/upcoming')}}" class="pro-head-link">@lang('user.Upcoming')</a>
            <a href="{{url('provider/new_car')}}" class="pro-head-link ">@lang('user.New Car')</a>
            <a href="{{url('provider/trips')}}" class="pro-head-link active">@lang('user.my_trips')</a>

        </div>
    </div>
    <div class="pro-dashboard-content ">
        <div class="container">
            <div style="padding: 30px;" >
                <div class="row no-margin">
                <div class="dash-content">
                    <div class="row no-margin">
                        <div class="col-md-12">
                            <h4 class="page-title">@lang('user.my_trips')</h4>
                        </div>
                    </div>

                        <div class="row no-margin ride-detail">
                            <div class="col-md-12">
                            @if($trips->count() > 0)
                                <table class="table table-condensed" style="border-collapse:collapse">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>@lang('user.trip_id')</th>
                                            <th>@lang('user.booking_id')</th>
                                            <th>@lang('user.date')</th>
                                            <th>@lang('user.profile.name')</th>
                                            <th>@lang('user.amount')</th>
                                            <th>@lang('user.type')</th>
                                            <th>@lang('user.payment')</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($trips as $trip)

                                        <tr data-toggle="collapse" data-target="#trip_{{$trip->id}}" class="accordion-toggle collapsed">
                                            <td><span class="arrow-icon fa fa-chevron-right"></span></td>

                                            {{-- <td>{{ $trip->booking_id }}</td> --}}
                                            @if($trip->id)
                                                <td>{{ $trip->id }}</td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            @if($trip->payment)
                                                <td>{{ $trip->payment->id }}</td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            @if($trip->payment)
                                                <td>{{date('d-m-Y',strtotime($trip->created_at))}}</td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            @if($trip->provider)
                                                <td>{{base64_decode($trip->user['first_name'])}} {{base64_decode($trip->user['last_name'])}}</td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            @if($trip->payment)
                                                <td>{{currency($trip->payment->total)}}</td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            @if($trip->service_type)
                                                <td>{{$trip->service_type->name}}</td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            {{-- @lang('user.paid_via') --}}
                                            <td>{{$trip->payment_mode}}</td>
                                        </tr>
                                        <tr class="hiddenRow">
                                            <td colspan="12">
                                                <div class="accordian-body collapse row" id="trip_{{$trip->id}}">
                                                    <div class="col-md-6">
                                                        <div class="my-trip-left">
                                                        <?php
                                                    $map_icon = asset('asset/img/marker-start.png');
                                                    $static_map = "https://maps.googleapis.com/maps/api/staticmap?autoscale=1&size=600x450&maptype=terrain&format=png&visual_refresh=true&markers=icon:".$map_icon."%7C".$trip->s_latitude.",".$trip->s_longitude."&markers=icon:".$map_icon."%7C".$trip->d_latitude.",".$trip->d_longitude."&path=color:0x191919|weight:8|enc:".$trip->route_key."&key=".env('GOOGLE_MAP_KEY'); ?>
                                                            <div class="map-static">
                                                                <img src="{{$static_map}}" height="280px;">
                                                            </div>
                                                            <div class="from-to row no-margin">
                                                                <div class="from">
                                                                    <h5>@lang('user.from')</h5>
                                                                    <h6>{{date('H:i A - d-m-y', strtotime($trip->started_at))}}</h6>
                                                                    <p>{{ base64_decode($trip->s_address_ar) }}</p>
                                                                </div>
                                                                <div class="to">
                                                                    <h5>@lang('user.to')</h5>
                                                                    <h6>{{date('H:i A - d-m-y', strtotime($trip->finished_at))}}</h6>
                                                                    <p>{{ base64_decode($trip->d_address_ar) }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="mytrip-right">

                                                            <div class="fare-break">

                                                                <h4 class="text-center">
                                                                <strong>
                                                                    @lang('user.fare_breakdown')
                                                                </strong>
                                                                </h4>
                                                                <h4> <strong> @if($trip->service_type)
                                                                        {{$trip->service_type->name}}
                                                                    @endif</strong></h4>

                                                                <h5>@lang('user.base_price') <span>
                                                                @if($trip->payment)
                                                                    {{currency($trip->payment->fixed)}}
                                                                @endif
                                                                </span></h5>
                                                                <h5><strong>@lang('user.tax_price') </strong><span><strong>
                                                                @if($trip->payment)
                                                                {{currency($trip->payment->tax)}}
                                                                @endif
                                                                </strong></span></h5>
                                                                <h5 class="big"><strong>@lang('user.charged') - {{$trip->payment_mode}} </strong><span><strong>
                                                                @if($trip->payment)
                                                                {{currency($trip->payment->total)}}
                                                                @endif
                                                                </strong></span></h5>

                                                            </div>

                                                            <div class="trip-user">
                                                                <div class="pro-img">
                                                                    <img style="width: 100%;height: 100%;border-radius: 50%;" src="{{asset($trip->user['picture'])}}">
                                                                </div>


                                                                <div class="user-right">
                                                                    @if($trip->provider)

                                                                        <h5>{{base64_decode($trip->user['first_name'])}} {{base64_decode($trip->user['last_name'])}}</h5>
                                                                    @else
                                                                    <h5>- </h5>
                                                                    @endif
                                                                    @if($trip->rating)
                                                                    <div class="rating-outer">
                                                                        <input type="hidden" class="rating" value="{{$trip->rating->user_rated}}" />

                                                                    </div>
                                                                    <p>{{$trip->rating->user_comment}}</p>
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <hr>
                                    <p style="text-align: center;">No trips Available</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
