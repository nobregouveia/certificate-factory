<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gerador de Certificados</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('../assets/css/material-dashboard.min.css') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">

    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="#" target="_blank">
                <img src="{{ asset('../assets/img/logo2.png') }}" class="navbar-brand-img h-100"
                    alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Gerador de Certificado</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ url('/') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Certificado</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-12 col-md-10 mx-auto">
                    @if ($message = session('success'))
                        <div id="alertSuccess" class="alert alert-success alert-dismissible text-white" role="alert">
                            <span class="text-sm">{{ $message }}</span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body p-3 pb-0">
                            <div class="alert alert-warning alert-dismissible text-white" role="alert">
                                <span class="text-sm"><b>Atenção, esta ação irá gerar os certificados em massa e
                                        enviar por e-mail aos respectivos alunos!</b></span>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header p-3">
                            <h5 class="mb-0">Emitir Certificado(s)</h5>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <a class="btn bg-gradient-success w-100 mb-0 toast-btn"
                                        href="{{ url('gerar-certificado') }}" type="button"
                                        data-target="successToast">Gerar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>


    <script>
        setTimeout(() => {
            let el = document.getElementById('alertSuccess');
            el.style = "visibility: hidden; opacity: 0; transition: visibility 0s 2s, opacity 2s linear;";
        }, 3000);
    </script>
</body>

</html>
