<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('assets/c/img/icons/icon-48x48.png') }}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />



    <title>Reliance Admin Panel</title>

    <link href="{{ asset('assets/c/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/c/css/trix.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/c/css/custom.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{asset('assets/c/js/trix.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/c/js/attachments.js')}}"></script>
    <script></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none
        }
        .sidebar-link i, .sidebar-link svg, a.sidebar-link i, a.sidebar-link svg{
            color:#333;
        }
        .sidebar-item.active .sidebar-link:hover, .sidebar-item.active>.sidebar-link{
            color:#333;
        }
        .sidebar-item.active .sidebar-link:hover i, .sidebar-item.active .sidebar-link:hover svg, .sidebar-item.active>.sidebar-link i, .sidebar-item.active>.sidebar-link svg{
            color:#333;
        }
        .sidebar-link, a.sidebar-link{
            background:#ddd;
            color:#333;
        }
        .sidebar-header{
            color:#333;
        }
        .sidebar-link:hover, .sidebar-link:hover i, .sidebar-link:hover svg{
            color:#333;
        }
        .sidebar-link:hover{
            background:#ddd
        }
    </style>

</head>

<body>
    <div class="wrapper">

        @include('cms.layout.sidebar')

        <div class="main">
            @include('cms.layout.navbar')

            @yield('container')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="#" target="_blank"><strong>Reliance</strong></a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script src="{{ asset('assets/c/js/app.js') }}"></script>
    <script src="{{ asset('assets/c/js/custom.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <script src='https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js'></script>


    <script>
        var CKeditorUploadURL = "{{ route('ckeditor_upload', ['_token' => csrf_token() ]) }}"
        ClassicEditor
            .create(document.querySelector('#editor'), {
                extraPlugins: [MyCustomUploadAdapterPlugin],
                image: {
                    toolbar: ['toggleImageCaption', 'imageTextAlternative', {
                        // Grouping the buttons for the regular
                        // picture-like image styling into one drop-down.
                        name: 'imageStyle:pictures',
                        items: ['imageStyle:inline', 'imageStyle:side', 'imageStyle:alignLeft'],
                        defaultItem: 'imageStyle:alignLeft'
                    }],
                },
                mediaEmbed: {
                    previewsInData: true
                }
            })
            .catch(error => {
                console.error(error);
            });

        $(function() {
            $('.multi-tag').on('change', function(event) {

                var $element = $(event.target);
                var $container = $element.closest('.example');

                if (!$element.data('tagsinput'))
                    return;

                var val = $element.val();
                if (val === null)
                    val = "null";
                var items = $element.tagsinput('items');

                $('code', $('pre.val', $container)).html(($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\""));
                $('code', $('pre.items', $container)).html(JSON.stringify($element.tagsinput('items')));


            }).trigger('change');
        });
    </script>
    @yield('script')
</body>

</html>