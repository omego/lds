@extends('layouts.presentation')

@section('title', $channel->name . " | " . trans('ds.channel'))

@section('content')

	<script>
	function clock(){

	//Save the times in variables

	var today = new Date();

	var hours = today.getHours();
	var minutes = today.getMinutes();
	var seconds = today.getSeconds();


	//Set the AM or PM time

	if (hours >= 12){
	  meridiem = " PM";
	}
	else {
	  meridiem = " AM";
	}


	//convert hours to 12 hour format and put 0 in front
	if (hours>12){
		hours = hours - 12;
	}
	else if (hours===0){
		hours = 12;
	}

	//Put 0 in front of single digit minutes and seconds

	if (minutes<10){
		minutes = "0" + minutes;
	}
	else {
		minutes = minutes;
	}

	if (seconds<10){
		seconds = "0" + seconds;
	}
	else {
		seconds = seconds;
	}


	document.getElementById("clock-text").innerHTML = (hours + ":" + minutes + ":" + seconds + meridiem);

	}


	setInterval('clock()', 1000);


	/**
 * Show Me The Weather, constructor.
 */
function ShowMeTheWeather(options) {
    this.options = {
        location: options.location || '',
        woeid: options.woeid || '',
        unit: options.unit || 'c',
        success: options.success || function(){},
        error: options.error || function(){}
    };
    this.query = 'select * from weather.forecast where woeid';

    if (this.options.location) {
        this.query += ' in (select woeid from geo.placefinder where text="'+this.options.location+'" and gflags="R" limit 1) and u="'+this.options.unit+'"';
    } else if (this.options.woeid) {
        this.query += '='+this.options.woeid+' and u="'+this.options.unit+'"';
    } else {
        this.options.error({
            message: 'No weather information could be retrieved. Please provide a location.'
        });
    }
}

/**
 * Fetches data using JSONP from the Yahoo! query API.
 */
ShowMeTheWeather.prototype.fetch = function(callback) {
    var script = document.createElement('script'),
        uid = 'smtw' + new Date().getTime(),
        encodedQuery = encodeURIComponent(this.query.toLowerCase());

    ShowMeTheWeather[uid] = function(data) {
        delete ShowMeTheWeather[uid];
        document.body.removeChild(script);
        callback(data);
    };

    script.src = 'https://query.yahooapis.com/v1/public/yql?q='
        + encodedQuery + '&format=json&callback=ShowMeTheWeather.' + uid;
    document.body.appendChild(script);
};

/**
 * Get weather information.
 */
ShowMeTheWeather.prototype.now = function() {
    var instance = this;
    this.fetch(function(data) {
        if (data !== null && data.query !== null && data.query.results !== null || data.query.results.channel.description !== 'Yahoo! Weather Error') {
            var result = data.query.results.channel,
                weather = {};

            // I´ve choosen to expose only the data needed.
            // There´s a lot of more data to play with here =)
            weather.temp = result.item.condition.temp;
            weather.code = result.item.condition.code;
            weather.city = result.location.city;
            weather.units = {
                temp: result.units.temperature,
                distance: result.units.distance,
                pressure: result.units.pressure,
                speed: result.units.speed
            };

            instance.options.success(weather);
        } else {
            this.options.error({
                message: 'Error retrieving the latest weather information.'
            });
        }
    });
};

// This is how to use the widget above on your page
var smtw = new ShowMeTheWeather({
    woeid: '906057',
    success: function(weather) {
        var html = '<h2><i class="icon-'+weather.code+'"></i><br>30&deg;'+weather.units.temp+'</h2>';
            html += '<p>Jeddah</p>';
        document.getElementById('smtw').innerHTML = html;
    },
    error: function(error) {
        div.innerHTML = '<p>'+error.message+'</p>';
    }
}).now();
	</script>

	<div class="container-fluid">
		<div class="row mt-3">
			<div class="col-md-3">
			<div class="row">
				<div class="col-12">
					<img class="img-fluid" src="http://comj.ksau-hs.edu.sa/wp-content/uploads/2018/04/ksau-hs.png" >
				</div>
				<div class="col">
					<div class="card text-white bg-secondary mb-3 card-222" style="background-color: #fba417;
background-image: linear-gradient(225deg, #fba417 0%, #e84d76 74%);
">
					  <div class="card-body">
							<div id="clock">
								<p id="clock-text"></p>
							</div>
					  </div>
					</div>
				</div>
				</div>
				<div class="row">
				<div class="col">
					<div class="card text-white bg-info mb-3 card-222" style="background-color: #08AEEA;
background-image: linear-gradient(0deg, #08AEEA 0%, #2AF598 100%);
">
						<div class="card-body">

							<div id="smtw"></div>

						</div>
					</div>
				</div>
				</div>
			</div>
			<div class="col-md-9">
			{{-- <img class="img-content" src="http://comj.ksau-hs.edu.sa/wp-content/uploads/2018/11/12-13-Nov18-1.jpg" > --}}
			@if (count($channel->publishedSlides()) > 0)
				<div class="sliderx" data-slick='{"autoplaySpeed":{{ Setting::get('slider_display_duration', 3000) }},"speed":{{ Setting::get('slider_transition_duration', 500) }}}'>
					@foreach ($channel->publishedSlides()->sortByDesc('updated_at') as $slide)
						@include('frontend.single_slide')
					@endforeach
				</div>
			@else
				<div class="no-slides">
					<p>@lang('ds.no_slides_in_this_channel')</p>
				</div>
			@endif
			</div>
	</div>

	</div>

@endsection

@section('script')
    $(document).ready(function(){
        $('.sliderx').slick({
			autoplay: true,
			arrows: false,
			fade: true,
			pauseOnFocus: false,
			pauseOnHover: false
        });
    });
@endsection
