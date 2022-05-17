<?php include 'dbConfig.php'; ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <!-- CSS only -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class='container mt-4'>
        <div class='row'>
            <div class='col-3  mt-4'>
                <?php include 'left.php'; ?>
            </div>
            <div class='col-9'>
                <div class='row'>
                    <?php
                    if (isset($_GET['find'])) {
                        $search = $_GET['search'];
                        $calling = mysqli_query($connect, "select * from books where isbn='$search' OR author LIKE '%$search%'");
                    } elseif (isset($_GET['cat_id'])) {
                        $cat_id = $_GET['cat_id'];
                        $calling = mysqli_query($connect, "Select * from books where genre_id='$cat_id'");
                    } else {
                        $calling = mysqli_query($connect, 'select * from books');
                    }

                    while ($row = mysqli_fetch_array($calling)) {

                    ?>
                        <div class='col-4'>
                            <div class='card mt-4 border-3'>
                                <img src="admin/images/<?= $row['cover']; ?>" alt="" class='w-100' style='object-fit: cover;height:200px;'>
                                <div class='card-body' style='height:140px;'>
                                    <h5 style="height:50px;"><?= $row['title']; ?></h5>
                                    <hr>
                                    <h6 class='h6 text-primary'>₹<?= $row['discount_price']; ?><del class='fs-6 ms-2 text-secondary'><?= $row['price']; ?>
                                        </del> <a href="view.php?book_id=<?= $row['id']; ?>" class='btn btn-success btn-sm ms-2 '>know more</a></h6>

                                </div>

                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>