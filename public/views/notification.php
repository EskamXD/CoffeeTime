<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'public/views/top-arrow.php'; ?>
    <?php include 'public/views/navbar.php'; ?>

    <main class="contenf-flex screen-height">
        <div class="content-column">
            <h1>
                <?php 
                    if(isset($messages)) {
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
            </h1>
        </div>
    </main>

    <?php include 'public/views/footer.php'; ?>
</body>
</html>