<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendarioMVC</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
   
    <link rel="stylesheet" href="/RoomSync/public/js/fullcalendar/main.min.css">
</head>

<body>

    <div class="container py-5">
    <?php echo Sessao::mensagem('reuniao'); ?>
        <div class="calendarManager"></div>
    </div>
    <script src="/RoomSync/public/js/fullcalendar/main.min.js"></script>
    <script>
    <?php include_once '../public/js/mainjs.php'?>
    </script>
</body>

</html>