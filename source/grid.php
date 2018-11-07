<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        #grid{
            display: grid;
            grid-template-columns: repeat(10, 10%);
            grid-template-rows: repeat(10, 10%);
            min
        }
    </style>
</head>
<body>
    <div id="grid">

    </div>
</body>
<script>
    $(document).ready(function(){
        $("body").width($(window).width());
        $("body").height($(window).height());
        $("#grid").height($(window).height());
    });

</script>
</html>