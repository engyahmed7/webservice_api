# Weather API Application

This is a simple web application that allows users to check the weather of Egyptian cities using the OpenWeatherMap API. Users can select a city from the dropdown menu, submit the form, and view the current weather status of the selected city.

## Features

- Select a city from the dropdown menu.
- Submit the form to view the weather status of the selected city.
- Display weather information including temperature, humidity, wind speed, weather description, date, and time.
- Uses Bootstrap for styling.

## Requirements

- PHP version 7.0 or higher
- Composer for autoloading classes
- OpenWeatherMap API key (sign up for free at [OpenWeatherMap](https://openweathermap.org/) and get your API key)

## Installation

1. Clone the repository to your local machine:

```
git clone https://github.com/engyahmed7/webservice_api
```

2. Install dependencies using Composer:

```
composer install
```

3. Set up your OpenWeatherMap API key:

   - Rename the `config.example.php` file to `config.php`.
   - Replace `YOUR_API_KEY` with your actual OpenWeatherMap API key in the `config.php` file.

## Usage

1. Start the PHP built-in server:

```
php -S localhost:8000
```

2. Open your web browser and navigate to `http://localhost:8000`.

3. Select a city from the dropdown menu and click on the "Submit" button.

4. View the weather status of the selected city.

## Class Structure

The application consists of the following classes:

- `Weather`: Implements the `Weather_Interface` and provides methods to interact with the OpenWeatherMap API.
- `Weather_Interface`: Defines the interface for interacting with weather data.
- `autoload.php`: Autoloader function to dynamically load classes.
- `Model` directory: Contains additional classes used in the application.

## Live Demo

Check out the live demo [here](https://engyahmed7.github.io/webservice_api/).