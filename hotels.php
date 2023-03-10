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

    $filteredHotels = $hotels;

    if (isset($_GET['parking'])) {
        $filteredHotels = array_filter($filteredHotels, function($hotel) {
            return $hotel['parking'] == ($_GET['parking'] == '1');
        });
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOTEL</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container">
      <h1 class="text-danger">Ecco gli hotel</h1>
        <form class="form-inline" method="get" action="">
            <div class="form-group mx-sm-3 mb-2">
                <label for="parking">Parcheggio disponibile</label>
                <select name="parking" id="parking" class="form-control">
                    <option value="">Tutti gli hotel</option>
                    <option value="1" <?php if (isset($_GET['parking']) && $_GET['parking'] == 1) ; ?>>Con parcheggio</option>
                    <option value="0" <?php if (isset($_GET['parking']) && $_GET['parking'] == 0) ; ?>>Senza parcheggio</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Filtra</button>
        </form>


      <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Valutazione</th>
                <th>Distanza dal centro (km)</th>
                <th>Parcheggio disponibile</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filteredHotels as $hotel) { ?>
            <tr>
                <td><?php echo $hotel['name']; ?></td>
                <td><?php echo $hotel['description']; ?></td>
                <td><?php echo $hotel['vote']; ?>/5</td>
                <td><?php echo $hotel['distance_to_center']; ?></td>
                <td><?php echo ($hotel['parking'] ? 'Sì' : 'No'); ?></td>
            </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
