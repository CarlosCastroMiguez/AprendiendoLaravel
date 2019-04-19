@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="fullcalendar/packages/core/main.css" />
<link rel="stylesheet" href="fullcalendar/packages/daygrid/main.css" />
<link rel="stylesheet" href="fullcalendar/packages/timegrid/main.css" />
<link rel="stylesheet" href="fullcalendar/packages/list/main.css" />


<script src="/fullcalendar/packages/core/main.js"></script>
<script src="/fullcalendar/packages/core/locales/es.js"></script>

<script src="/fullcalendar/packages/timegrid/main.js"></script>
<script src="/fullcalendar/packages/daygrid/main.js"></script>
<script src="/fullcalendar/packages/list/main.js"></script>

<script src="/fullcalendar/packages/resource-common/main.js"></script>
<script src="/fullcalendar/packages/resource-timegrid/main.js"></script>
<script src="/fullcalendar/packages/resource-daygrid/main.js"></script>

<div class="card border-primary mb-3">
    <div class="card-header">Bienvenido - Sistema de gestión de la ocupación del Hospital Simulado de la UEM</div>

    <div class="card-body">

        <div id="calendar"></div>

    </div>
</div>

@endsection

@section ('scripts')

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
            locale: 'es',
            plugins: ['resourceTimeGrid', 'list'],
            timeZone: 'local',
            defaultView: 'resourceTimeGridDay',
            views: {
                listDay: {
                    buttonText: 'Lista'
                },
                resourceTimeGridDay: {
                    buttonText: 'Día'
                },
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'resourceTimeGridDay,listDay'
            },

            resources: [{
                    id: 'a',
                    title: 'Room A'
                },
                {
                    id: 'b',
                    title: 'Room B'
                },
                {
                    id: 'c',
                    title: 'Room C'
                },
                {
                    id: 'd',
                    title: 'Room D'
                }
            ],
            weekends: false,
            
        });
        

        calendar.render();
    });

</script>



@endsection
