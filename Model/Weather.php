<?php

class Weather implements Weather_Interface
{

    //put your code here
    private $url;

    public function __construct()
    {
        $this->url = __WEATHER_URL;

    }

    public function get_cities()
    {
        $cities = file_get_contents(__CITIES_FILE);
        return json_decode($cities, true);

    }

    public function get_weather($cityId)
    {
        $url = str_replace("{{cityid}}", $cityId, $this->url);
        $url = str_replace("{{apikey}}", __API_KEY, $url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output, true);
    }

    public function get_current_time()
    {
        $Date_Time = [];
        $date = new DateTime();
        $formatted_date = $date->format('jS M, Y');

        $day_name = $date->format('l');
        $hour = $date->format('h');
        $minute = $date->format('i');
        $am_pm = $date->format('a');

        if ($hour == 0) {
            $hour = 12;
        } elseif ($hour > 12) {
            $hour -= 12;
        }

        $formatted_time = "$day_name $hour:$minute $am_pm";

        array_push($Date_Time, $formatted_date);
        array_push($Date_Time, $formatted_time);

        return $Date_Time;
    }


}
