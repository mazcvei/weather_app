<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          rel='stylesheet'
          type='text/css'/>

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"
          rel='stylesheet'
          type='text/css'/>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">





<!--    Herramienta de cropado de imagenes-->
    <link href="{{asset('css/croppie.css')}}"
          rel='stylesheet'
          type='text/css'/>
    <script src="{{asset('js/croppie.min.js')}}"></script>

<!--    Estilos propios-->
    <link href="{{asset('css/custom.css')}}"
          rel='stylesheet'
          type='text/css'/>

</head>
