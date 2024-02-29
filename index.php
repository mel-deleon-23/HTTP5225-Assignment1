<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Adoption</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include('reusables/nav.php') ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-5 mt-4 mb-4">Available Cats</h1>
            </div>
        </div>
        <?php 
            $connect = mysqli_connect('localhost', 'root', 'root', 'Cat_Adoption');
            $query = 'SELECT cat_id, cat_name, breed_id, cat_age, cat_coat_length, 
            cat_color, good_with, cat_availability, cat_imageURL FROM AvailableCats';

            $AvailableCats = mysqli_query($connect, $query);

            if(mysqli_connect_error()){
                die("Connection error: " . mysqli_connect_error());
            }

        ?>

        <div class="container">
            <div class="row">
            
            <?php
            foreach($AvailableCats as $AvailableCats){

                if($AvailableCats['cat_availability'] == 'Not Available'){
                    $bgClass = 'bg-danger';
                }
                else {
                    $bgClass = 'bg-success';
                }

                echo '<div class="col-md-3">
                <div class="card" '.$bgClass.' >
                    <img src=" '.$AvailableCats['cat_imageURL'].' " class="card-img-top" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">'.$AvailableCats['cat_name'].'</h5>
                        Age: '.$AvailableCats['cat_age'].'
                        <br>
                        Breed: '.$AvailableCats['breed_id'].'
                        <br>
                        Coat Length: '.$AvailableCats['cat_coat_length'].'
                        <br>
                        Colour: '.$AvailableCats['cat_color'].'
                        <br>
                        Good With: '.$AvailableCats['good_with'].'
                        <br>
                        Available: '.$AvailableCats['cat_availability'].'
                    </div>
                </div>
                </div>';
            }
            ?>
            

            </div>
        </div>

    </div>
</body>
</html>