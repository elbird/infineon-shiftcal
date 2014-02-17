<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Infineon Schichtkalender</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.print.css" media="print">
        <style>
            body {
                padding-top: 50px;
            }
            .starter-template {
                padding: 40px 15px;
                text-align: center;
            }
            .work-day-event {
                background-color: orange;
                border-color: orange;
                    
            }
            .free-day-event {
                background-color: blue;
                border-color: blue;
            }
            .fc-widget-header, .fc-widget-content {
                border-color: #333;
            }
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Infineon Schichtkalender</a>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="starter-template">
                <h1>Infineon Schichtkalender</h1>

                <div id="calendar">
                    <div id="loadCal" class="alert alert-info">Kalender wird geladen...</div>
                </div>
                <div id="about">
                    Schichtkalender für die Infineon-Schicht Nummer 2, zeigt die Arbeitstage, freien Tage und Feiertage an!
                </div>
                <div id="about">
                    Copyright: <a href="mailto:webmaster@elbird.at">Sebastian Vogel</a>
                </div>
            </div>

        </div><!-- /.container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/gcal.js"></script>
        <script>
            $(document).ready(function() {
                $('#calendar').fullCalendar({
                    eventSources: [
                        {
                            url: "http://www.google.com/calendar/feeds/de.austrian%23holiday%40group.v.calendar.google.com/public/basic",
                            backgroundColor: "red",
                            borderColor: "red"
                        },
                        {
                            url: "./jsonFeed.php",
                            cache: true
                        }
                    ],
                    firstDay: 1,
                    header: {
                        left: 'title',
                        center: '',
                        right: 'today prev,next'
                    },
                    monthNames: ['Jänner', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'November', 'Dezember'],
                    monthNamesShort: ['Jan.', 'Feb.', 'Mär.', 'Apr.', 'Mai', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Nov.', 'Dez.'],
                    dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
                    dayNamesShort: ['So', 'Mo.', 'Di.', 'Mi.', 'Do.', 'Fr.', 'Sa.'],
                    buttonText: {
                        today: 'heute',
                        month: 'Monat',
                        week: 'Woche',
                        day: 'Tag'
                    },
                    loading: function (isLoading) {
                        if(isLoading) {
                            $('#loadCal').show();
                        } else {
                            $('#loadCal').hide();
                        }
                        
                    }
                });
            });
        </script>
    </body>
</html>
