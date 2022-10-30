@extends('cms.layout.main')
@section('container')

<main class="content">


    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Kategori</strong> Dashboard</h1>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    @if(session()->has('success'))
                    <div class="row p-3 rounded" style="background-color:#cbf5d9 ;">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- <div class="row p-3 rounded" style="background-color:#f5cbd0 ;">
                    A simple primary alert—check it out!
                </div> -->
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <a href="/c/kategori/create" class="btn btn-primary m-2">Create kategori</a>
                    </div>

                    <div class="card-body">
                        <table id="myTable" class="display" style="width: 100%;margin-top:15px">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th class="d-none d-xl-table-cell">Created At</th>
                                    <th class="d-none d-md-table-cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            "autoWidth": false,
            ajax: "{!! route('kategori.index') !!}",
            order: [
                [1, 'asc']
            ],
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    className: "d-none d-md-table-cell",
                    orderable: false,
                    searchable: false
                }
            ],
            drawCallback: function(settings) {
                feather.replace()
            }
        });

        $('#myTable').on('click', 'button', function(e) {
            e.preventDefault();
            var form = $(this).parents('form')
            Swal.fire({
                title: 'Do you want to delete this item?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    // return true
                    form.submit()
                    // Swal.fire('Saved!', '', 'success')
                }
            })
        });

        $.fn.dataTable.ext.errMode = 'none';

        $('#myTable')
            .on('error.dt', function(e, settings, techNote, message) {
                window.location.reload()
            })
            .DataTable();
    });
</script>
@endsection