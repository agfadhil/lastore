<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="page-header-fixed">

    <div style="margin-top: 2%;"></div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if (Session::has('message'))
            <div class="alert alert-info alert-dismissible">
                <p>{{ Session::get('message') }}</p>
            </div>
            @endif
            @if ($errors->count() > 0)
            <div class="alert alert-danger alert-dismissible">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    <div class="container-fluid">
        @yield('content')
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('partials.javascripts')
    @yield('extra-javascripts')

</body>
</html>