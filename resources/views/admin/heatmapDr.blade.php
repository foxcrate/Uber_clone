@extends('admin.layout.base')

@section('title', 'Dashboard ')

@section('styles')
	<link rel="stylesheet" href="{{asset('main/vendor/jvectormap/jquery-jvectormap-2.0.3.css')}}">
@endsection

@section('content')

<!--<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>!-->
    <script
      src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap&libraries=visualization&v=weekly"
      defer
    ></script>
    
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 500px;
    margin: 0 20px;
		
      }

      /* Optional: Makes the sample page fill the window. */
      .alert {
    text-align: center;
    font-weight: bold;
    font-size: large;
    border-radius: 0;
    margin-top: 10px;
    border-color: rgba(0,0,0,.125);
}
      #floating-panel {
		    margin: 25px 20px 0;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel  button{
    background-color: white;
    border-color: #b2b2b29e;
    background-image: none;
    color: #0000009e;
    }
    #map1 {
        height: 500px;
    margin: 0 20px;
		
      }

      /* Optional: Makes the sample page fill the window. */
    
/*
      #floating-panel {
        background-color: #fff;
        border: 1px solid #999;
        left: 25%;
        padding: 5px;
        position: absolute;
        top: 10px;
        z-index: 5;
      }*/
    </style>
    <script>
      "use strict";

      // This example requires the Visualization library. Include the libraries=visualization
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=visualization">
      let map, heatmap;

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 10,
          center: {
            lat: 30.0444,
            lng: 31.2357
          },
          
        });
        heatmap = new google.maps.visualization.HeatmapLayer({
          data: getPoints(),
          map: map
        });
      }

      function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
      }

      function changeGradient() {
        const gradient = [
          "rgba(0, 255, 255, 0)",
          "rgba(0, 255, 255, 1)",
          "rgba(0, 191, 255, 1)",
          "rgba(0, 127, 255, 1)",
          "rgba(0, 63, 255, 1)",
          "rgba(0, 0, 255, 1)",
          "rgba(0, 0, 223, 1)",
          "rgba(0, 0, 191, 1)",
          "rgba(0, 0, 159, 1)",
          "rgba(0, 0, 127, 1)",
          "rgba(63, 0, 91, 1)",
          "rgba(127, 0, 63, 1)",
          "rgba(191, 0, 31, 1)",
          "rgba(255, 0, 0, 1)"
        ];
        heatmap.set("gradient", heatmap.get("gradient") ? null : gradient);
      }

      function changeRadius() {
        heatmap.set("radius", heatmap.get("radius") ? null : 20);
      }

      function changeOpacity() {
        heatmap.set("opacity", heatmap.get("opacity") ? null : 0.2);
      } // Heatmap data: 500 Points

      function getPoints() {
        <?php 
          
          
          
          
          
          ?>
        return [
          @if(!empty($Providers))
            @foreach($Providers as $Provider)
              @if($Provider->latitude != null)
                 new google.maps.LatLng({{$Provider->latitude}},{{$Provider->longitude}}),
              @endif
            @endforeach
          @endif
        
         

        ];
      }





      /***************/
    
    </script>
<div class="alert alert-info" role="alert">
      @lang('admin.HotMap View2')
</div>
<div id="floating-panel">
      <button onclick="toggleHeatmap()">@lang('admin.Toggle Heatmap')</button>
      <button onclick="changeGradient()">@lang('admin.Change gradient')</button>
      <button onclick="changeRadius()">@lang('admin.Change radius')</button>
      <button onclick="changeOpacity()">@lang('admin.Change opacity')</button>
    </div>
    <div id="map"></div>
   
    
@endsection

@section('scripts')
	<script type="text/javascript" src="{{asset('main/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('main/vendor/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>

	
@endsection