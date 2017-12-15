<?php

class WeatherController extends Controller{

        public $result;
	
	public function index(){

        $this->set('result',false);

	}

        public function weather() {

        $xml = simplexml_load_file('http://api.worldweatheronline.com/premium/v1/weather.ashx?q='.$_POST['zip'].'&format=xml&num_of_days=2&key=c476a96706f34b91a9f170449170911');
        echo '<br><div>Weather information for address: '.$xml->request->query.'<div>';
        echo '<div>Currently it is: '.$xml->current_condition->temp_C.' celcius</div>';
        echo '<div>Currently it is: '.$xml->current_condition->temp_F.' fahrenheit</div>';
        echo "<div>Today's minimum is: ".$xml->weather->mintempC.' celcius</div>';
        echo "<div>Today's maximum is: ".$xml->weather->maxtempC.' celcius</div>';
        echo "<div>Today's minimum is: ".$xml->weather->mintempF.' fahrenheit</div>';
        echo "<div>Today's maximum is: ".$xml->weather->maxtempF.' fahrenheit</div>';

        }
}
