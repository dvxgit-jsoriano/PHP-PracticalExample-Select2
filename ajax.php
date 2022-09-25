<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Select2 Pagination</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">PHP-Select2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php">Basics</a>
                    <a class="nav-link active" aria-current="page" href="ajax.php">AJAX</a>
                    <a class="nav-link" href="pagination.php">Pagination</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="container mt-4 p-4 border">
        <h4>Select2</h4>

        <div class="card">
            <div class="card-header">
                Ajax from Sample JSON file
            </div>
            <div class="card-body">
                <select name="ajax" id="ajax" class="form-select">
                    <!-- data will come from ajax -->
                </select>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Ajax from Sample Data Response
            </div>
            <div class="card-body">
                <select name="ajax2" id="ajax2" class="form-select">
                    <!-- data will come from ajax -->
                </select>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Ajax from Sample Data with Paginate and ProcessResults
            </div>
            <div class="card-body">
                <select name="ajax3" id="ajax3" class="form-select">
                    <!-- data will come from ajax -->
                </select>
            </div>
        </div>

    </section>

    <script>
        $(document).ready(function() {
            $('#ajax').select2({
                ajax: {
                    url: "sample-data.json",
                    dataType: "json",
                    delay: 250,
                }
            });

            $('#ajax2').select2({
                ajax: {
                    url: "generate-data.php",
                    dataType: "json",
                    delay: 250,
                    /* processResults: function(data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: data.items
                        };
                    } */
                }
            });

            $('#ajax3').select2({
                ajax: {
                    url: "generate-process.php",
                    dataType: "json",
                    delay: 250,
                    data: function(params) {
                        var query = {
                            search: params.term,
                            page: params.page || 1
                        }
                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    },
                    processResults: function(data, params) {
                        console.log(data);
                        console.log(params);
                        params.page = params.page || 1;

                        return {
                            results: data,
                            pagination: {
                                more: (params.page * 10) < data.count_filtered
                            }
                        };
                    }
                }
            });
        });
    </script>

</body>

</html>