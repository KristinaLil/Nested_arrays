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
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">Ads List</div>
                    <div class="card-body">
                        <?php include "data.php"; ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Info</th>
                                    <th>Cost (EUR)</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($skelbimai as $ad) { ?>
                                    <tr>
                                        <td><?= $ad['id'] ?></td>
                                        <td><?= $ad['text'] ?></td>
                                        <td><?= $ad['cost'] ?></td>
                                        <td>
                                            <?php

                                            if ($ad['onPay'] > 0) {
                                                echo date("Y m d, H:i", $ad['onPay']);
                                            } else {
                                                echo "Not paid";
                                            }

                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">Result</div>
                    <div class="card-body">
                        <?php

                        include "data.php";

                        $paidAds = 0;
                        $costSum = 0;
                        $unpaidSum = 0;

                        foreach ($skelbimai as $ad) {
                            if ($ad['onPay'] != 0) {
                                $paidAds++;
                            }
                        }

                        foreach ($skelbimai as $ad) {
                            if ($ad['onPay'] != 0) {
                                $costSum += $ad['cost'];
                            }
                        }

                        foreach ($skelbimai as $ad) {
                            if ($ad['onPay'] == 0) {
                                $unpaidSum += $ad['cost'];
                            }
                        }

                        echo "Total number of ads: <b>" . count($skelbimai) . "</b> .<hr>";
                        echo "Total number of paid ads: <b>" . $paidAds . "</b> .<hr>";
                        echo "Total cost of paid ads: <b>" . $costSum . "</b> EUR .<hr>";
                        echo "Total cost of unpaid ads: <b>" . $unpaidSum . "</b> EUR .<hr>";

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>