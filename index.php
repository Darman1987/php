<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendario de Eventos</title>

  <link href="fullcalendar-4.3.1/packages/core/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/daygrid/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/timegrid/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/list/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/bootstrap/main.css" rel="stylesheet">


  <script src='fullcalendar-4.3.1/packages/core/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/daygrid/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/timegrid/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/interaction/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/list/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/core/locales/es.js'></script>
  <script src='fullcalendar-4.3.1/packages/bootstrap/main.js'></script>
</head>

<body>
  <div id="Calendario1" style="border: 1px solid #000;padding:2px"></div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {

      let calendario1 = new FullCalendar.Calendar(document.getElementById('Calendario1'), {
        plugins: ['dayGrid'],
        events: [{
            title: 'Calistenia',
            start: '2019-10-07 09:15:00',
            end: '2019-10-07 10:15:00',
            textColor: '#ffffff',
            backgroundColor: '#94ceca'
          },
          {
            title: 'Clase de pilates',
            start: '2019-10-07 11:00:00',
            end: '2019-10-07 11:50:00',
            textColor: '#ffffff',
            backgroundColor: '#14868c'
          }
        ]
      });
      calendario1.render();
    });
  </script>

</body>

</html>