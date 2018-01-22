<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Invoice</title>
    <style media="screen">
        body {
            font-family: 'Segoe UI','Microsoft Sans Serif',sans-serif;
        }

        /*
            These next two styles are apparently the modern way to clear a float. This allows the logo
            and the word "Invoice" to remain above the From and To sections. Inserting an empty div
            between them with clear:both also works but is bad style.
            Reference:
            http://stackoverflow.com/questions/490184/what-is-the-best-way-to-clear-the-css-style-float
        */
        header:before, header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }

        .invoiceNbr {
            font-size: 20px;
            margin-right: 30px;
            margin-top: 30px;
            float: right;
        }

        .logo {
            float: left;
        }

        .from {
            float: left;
        }

        .to {
            float: right;
        }

        .fromto {
            border-style: solid;
            border-width: 1px;
            border-color: #e8e5e5;
            border-radius: 5px;
            margin: 20px;
            min-width: 200px;
        }

        .fromtocontent {
            margin: 10px;
            margin-right: 15px;
        }

        .panel {
            background-color: #e8e5e5;
            padding: 7px;
        }

        .items {
            clear: both;
            display: table;
            padding: 20px;
        }

        /* Factor out common styles for all of the "col-" classes.*/
        div[class^="col-"] {
            display: table-cell;
            padding: 7px;
        }

        /*for clarity name column styles by the percentage of width */
        .col-1-10 {
            width: 10%;
        }

        .col-1-52 {
            width: 52%;
        }

        .row {
            display: table-row;
            page-break-inside: avoid;
        }

    </style>

    <!-- These styles are exactly like the screen styles except they use points (pt) as units
        of measure instead of pixels (px) -->
    <style media="print">
        body {
            font-family: 'Segoe UI','Microsoft Sans Serif',sans-serif;
        }

        header:before, header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }

        .invoiceNbr {
            font-size: 30pt;
            margin-right: 30pt;
            margin-top: 30pt;
            float: right;
        }

        .logo {
            float: left;
        }

        .from {
            float: left;
        }

        .to {
            float: right;
        }

        .fromto {
            border-style: solid;
            border-width: 1pt;
            border-color: #e8e5e5;
            border-radius: 5pt;
            margin: 20pt;
            min-width: 200pt;
        }

        .fromtocontent {
            margin: 10pt;
            margin-right: 15pt;
        }

        .panel {
            background-color: #e8e5e5;
            padding: 7pt;
        }

        .items {
            clear: both;
            display: table;
            padding: 20pt;
        }

        div[class^="col-"] {
            display: table-cell;
            padding: 7pt;
        }

        .col-1-10 {
            width: 10%;
        }

        .col-1-52 {
            width: 52%;
        }

        .row {
            display: table-row;
            page-break-inside: avoid;
        }
    </style>

</head>
<body>
    <header>
        <div class="logo">
            <img src="{{asset('images/logo_1.png')}}" alt="generic business logo" height="181" width="167" />
        </div>
        <div class="invoiceNbr">
            <b>Asunto: </b>{{$pending->affair}}
            <br>
            <b>Fecha de impresión:</b> {{Date::now()}}
        </div>
    </header>

    <div class="fromto from">
        <div class="panel">DATOS:</div>
        <div class="fromtocontent">
            <span><b>Caso de:</b> {{$pending->owner}}</span><br />
            <span><b>Fecha de creación:</b> {{Date::parse($pending->created_at)->format('l j F Y')}}</span><br />
            <span><b>Estatus: </b>{{$pending->status}}</span><br />
        </div>
    </div>

    <section class="items">

        <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
        <div class="row">
            <div class="col-1-10 panel">
                Fecha de creación
            </div>
            <div class="col-1-52 panel">
                Descripción de actividad
            </div>
            <div class="col-1-10 panel">
                Terminado
            </div>
            <div class="col-1-10 panel">
                Tipo
            </div>
            <div class="col-1-10 panel">
                Responsable
            </div>
        </div>
        @foreach ($tracings as $element)
          <div class="row">
              <div class="col-1-10">
                  {{Date::parse($element->created_at)->format('l j F Y')}}
              </div>
              <div class="col-1-52">
                  {!!$element->body!!}
              </div>
              <div class="col-1-10">
                  {{$element->fulfilled}}
              </div>
              <div class="col-1-10">
                  {{$element->type}}
              </div>
              <div class="col-1-10">
                  {{$element->people}}
              </div>
          </div>
        @endforeach
    </section>
</body>
</html>
