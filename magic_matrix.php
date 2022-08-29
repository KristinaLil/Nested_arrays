<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        .nav-link {
            color: #ffbb33;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="magic_matrix.php">Magic Matrix</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ads.php">Ads</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create your own Magic Matrix: </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="data" class="form-label"></label>
                                <textarea name="data" id="data" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-success">Let's check!</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Magic or no magic?</div>
                    <div class="card-body">
                        <?php

                        if (isset($_POST['data'])) {
                            $dataS = $_POST['data'];
                            $dataSR = explode("\n", $dataS);
                            $data = [];

                            foreach ($dataSR as $key => $value) {
                                $data[] = explode(" ", $value);
                            }

                            $diag1 = 0;
                            $diag2 = 0;
                            $num = count($data);
                            $answer = null;

                            for ($i = 0; $i < $num; $i++) {
                                $diag1 = $diag1 + $data[$i][$i];
                                $diag2 = $diag2 + $data[$i][$num - $i - 1];
                            }

                            if ($diag1 != $diag2) {
                                echo "No magic!";
                            }

                            for ($i = 0; $i < $num; $i++) {
                                $rowSum = 0;
                                $colSum = 0;

                                for ($j = 0; $j < $num; $j++) {
                                    $rowSum += $data[$i][$j];
                                    $colSum += $data[$j][$i];
                                }

                                if (
                                    $rowSum != $colSum ||
                                    $rowSum != $diag1 ||
                                    $rowSum != $diag2 ||
                                    $colSum != $diag1 ||
                                    $colSum != $diag1
                                ) {
                                    $answer = 0;
                                }
                            }

                            if ($answer === 0) {
                                echo "<b>Sorry, no magic matrix here!</b>";
                            } else {
                                echo "<b>Congratulations! You just have made your own Magic MATRIX!</b>";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>