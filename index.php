<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read File EML</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>READ FILE TXT</h1>
            </div>
        </div>
        <div></div>
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post" name="formFiles" id="formFiles" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile01" multiple name="files[]" required accept=".txt">
                            <button class="btn btn-success" id="button-addon2">Procesar</button>
                        </div>
                        <div id="MsgAjax"></div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row" id="files">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="process.js"></script>
</body>
</html>