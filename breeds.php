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
                <h1 class="display-5 mt-4 mb-4">Breeds</h1>
            </div>
        </div>
        <?php 
            $connect = mysqli_connect('localhost', 'root', 'root', 'Cat_Adoption');
            $query = 'SELECT breed_id, breed_name, number_of_cats FROM Breeds';

            $Breeds = mysqli_query($connect, $query);

            if(mysqli_connect_error()){
                die("Connection error: " . mysqli_connect_error());
            }

        ?>

        <div class="container">
            <div class="row">
            
            <?php
            foreach($Breeds as $Breeds){

                // if($AvailableCats['cat_availability'] == 'Not Available'){
                //     $bgClass = 'bg-danger';
                // }
                // else {
                //     $bgClass = 'bg-success';
                // }

                echo '<div class="col-md-3">
                    <div class="card-body">
                        <div>
                        <h5 class="card-title">'.$Breeds['breed_name'].'</h5>
                        </div>
                        Breed ID: '.$Breeds['breed_id'].'
                        <br>
                        Number of Cats: '.$Breeds['number_of_cats'].'
                    </div>
                    </div>';
            }
            ?>
            

            </div>
        </div>

    </div>
</body>
</html>