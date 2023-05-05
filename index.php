<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filtered_hotels = $hotels;

    if (isset($_GET["parking"]) && $_GET["parking"] === "1"){
        $parking = $_GET["parking"];
        $temp_hotels = [];

        foreach($filtered_hotels as $hotel){
            if($hotel["parking"]){
                $temp_hotels[] = $hotel;
            }
        }

        $filtered_hotels = $temp_hotels;
    };

    if(isset($_GET["vote"]) && $_GET["vote"] !== ""){
        $temp_hotels = [];
        foreach($filtered_hotels as $hotel){
            if($hotel["vote"] >= $_GET["vote"]){
                $temp_hotels[] = $hotel;
            }
        }
        $filtered_hotels = $temp_hotels;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="GET">
    <label for="parking">Parcheggio</label>
    <select name="parking" id="parking">
        <option value="">All</option>
        <option value="1">With parking</option>
    </select>
    <button type="submit" class="btn btn-primary">Filtra</button>
    <div>
        <label for="vote">Voto</label>
        <input type="number" id="vote" name="vote" max="5" min="0">
        <button type="submit" class="btn btn-primary">Filtra</button>
    </div>
</form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Parking</th>
      <th scope="col">Vote</th>
      <th scope="col">Distance to center</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($filtered_hotels); $i++){
        $cur_hotel = $filtered_hotels[$i]; ?>
        <?php
         echo "<tr><td>{$cur_hotel['name']}</td> <td>{$cur_hotel['description']}</td> <td>{$cur_hotel['parking']}</td> <td>{$cur_hotel['vote']}</td> <td>{$cur_hotel['distance_to_center']}</td></tr>";
        ?>
        <?php } ?>
    </table>



</body>
</html>