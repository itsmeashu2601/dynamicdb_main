<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        var baseUrl = "<?php echo site_url(); ?>";
    </script>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card p-4 shadow">
            <h2 class="text-center mb-5">Database Setup</h2>

            <form id="databaseForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="userName" class="form-label">Enter User Name</label>
                            <input type="text" class="form-control" id="userName" placeholder="User Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Enter Password</label>
                            <input type="password" class="form-control" id="userPassword" placeholder="Password">
                        </div>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="databaseName" class="form-label">Enter Database Name</label>
                    <input type="text" class="form-control" id="databaseName" aria-describedby="databaseHelp" placeholder="Database Name">
                </div>
                <button id="createDbButton" type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>