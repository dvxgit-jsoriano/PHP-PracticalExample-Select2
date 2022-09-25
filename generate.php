<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Data</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <button id="generate">Generate Data</button>

    <script>
        $(document).ready(function() {
            $("#generate").click(function() {
                $.ajax({
                    type: "GET",
                    url: "generate-data.php",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>
</body>

</html>