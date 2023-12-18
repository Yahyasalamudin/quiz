<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Quiz App | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- third party css -->
        <link href="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <!-- icons -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="https://coderthemes.com/adminto/layouts/assets/libs/toastr/build/toastr.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="loading" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>
        <div id="wrapper">
            @include('layouts.navbar')

            @include('layouts.sidebar')

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <script>document.write(new Date().getFullYear())</script> &copy;<a href="{{ route('login') }}"> Quiz App</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <div class="rightbar-overlay"></div>

        <!-- Vendor -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

        <!-- knob plugin -->
        <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

        <!--Morris Chart-->
        <script src="{{ asset('assets/libs/morris.js06/morris.min.js') }}"></script>
        <script src="{{ asset('assets/libs/raphael/raphael.min.js') }}"></script>

        <!-- third party js -->
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="https://coderthemes.com/adminto/layouts/assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <!-- third party js ends -->

        <!-- Datatables -->
        <script src="https://coderthemes.com/adminto/layouts/assets/js/pages/datatables.init.js"></script>

       <!-- Toastr js -->
       <script src="https://coderthemes.com/adminto/layouts/assets/libs/toastr/build/toastr.min.js"></script>
       <script src="https://coderthemes.com/adminto/layouts/assets/js/pages/toastr.init.js"></script>

        @if (session('success'))
            <script>
                toastr.success('{{ session('success') }}');
            </script>
        @endif

        @if (session('error'))
            <script>
                toastr.error('{{ session('error') }}');
            </script>
        @endif

        @if ($errors->any())
            <script>
                @foreach ($errors->all() as $error)
                    toastr.('{{ $error }}')
                @endforeach
            </script>
        @endif

        <script>
            $('#datatable').dataTable({
                "language": {
                    "emptyTable": "Tidak ada data",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(ter-filter dari _MAX_ total data)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "loadingRecords": "Memuat...",
                    "processing": "Memproses...",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "Berikutnya",
                        "previous": "Sebelum"
                    },
                    "aria": {
                        "sortAscending": ": aktifkan untuk mengurutkan kolom menaik",
                        "sortDescending": ": aktifkan untuk mengurutkan kolom menurun"
                    }
                }
            })
        </script>

        @stack('js')

        <!-- App js-->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

    </body>
</html>
