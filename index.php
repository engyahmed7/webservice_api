<?php
require_once 'autoload.php';
require_once 'config.php';
ini_set('memory_limit', '-1');
$weather = new Weather();
$egyption_cities = $weather->get_cities();
if (isset($_POST["submit"])) {
    $cityId = $_POST["city"];
    $weather_data = $weather->get_weather($cityId);
    $current_time_date = $weather->get_current_time();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"
        defer></script>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="index.php" method="post">
                    <div class="form-group
                    ">
                        <label for="city">Select City</label>
                        <select class="form-control" name="city" id="city">
                            <?php
                            foreach ($egyption_cities as $city) {
                                if ($city["country"] == "EG") {
                                    echo "<option value='" . $city["id"] . "'>" . $city["name"] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>

        <?php if (isset($weather_data)) { ?>
            <div class="card text-start mt-5 w-50 d-block m-auto">
                <h4 class="card-header">
                    <?= $weather_data["name"] . " Weather Status"; ?>
                </h4>
                <img class="card-img-top w-25 d-block m-auto" src=<?= "http://openweathermap.org/img/w/" . $weather_data["weather"][0]["icon"] . ".png"; ?> alt="Title" />
                <div class="card-body">
                    <p class="card-text text-center">
                        <strong>
                            <?= $weather_data["weather"][0]['description']; ?>
                        </strong>
                    </p>
                    <p class="card-text">
                        <strong>Temperature:</strong>
                        <?= $weather_data["main"]["temp"] . "°C"; ?>
                    </p>
                    <p class="card-text">
                        <strong>
                            Humidity:
                        </strong>
                        <?= $weather_data["main"]['humidity']; ?>
                    </p>
                    <p class="card-text">
                        <strong>
                            Wind speed:
                        </strong>
                        <?= $weather_data["wind"]['speed'] . "m/s"; ?>
                    </p>

                    <p class="card-text">
                        <strong>
                            Date:
                        </strong>
                        <?=
                            $current_time_date[0];
                        ?>
                    </p>
                    <p class="card-text">
                        <strong>
                            Time:
                        </strong>
                        <?=
                            $current_time_date[1];
                        ?>
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>