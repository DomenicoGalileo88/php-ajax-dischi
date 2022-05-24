<?php
include __DIR__ . '/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <title>Php dischi</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header>
        <div class="logo">
            <img width="40" src="./assets/img/logo.png" alt="Spotify logo">
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row row-cols-5 gy-3">
                <?php foreach ($discs as $disc) : ?>
                    <div class="col">
                        <div class="card">
                            <img src='<?php echo $disc['poster'] ?>' alt="">
                            <div class="card-body">
                                <h6 class="card_title text-uppercase">
                                    <?php echo $disc['title'] ?>
                                </h6>
                                <p class="card-text m-0">
                                    <?php echo $disc['author'] ?>
                                </p>
                                <small class="small_text">
                                    <?php echo $disc['year'] ?>
                                </small>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <?php endforeach; ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </main>



</body>

</html>