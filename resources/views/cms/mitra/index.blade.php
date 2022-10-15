@extends('cms.layout.main')
@section('container')

<main class="content">


    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Mitra</strong> Dashboard</h1>
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
                        <a href="/c/mitra/create" class="btn btn-primary m-2">Add Mitra</a>
                    </div>

                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="d-none d-xl-table-cell">Created At</th>
                                <th>Status</th>
                                <th class="d-none d-md-table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mitra as $item)
                            <tr>
                                <td>{{ $mitra->firstItem() + $loop->index }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->name }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->created_at }}</td>
                                <td><span class="badge bg-success">Publish</span></td>
                                <td class="d-none d-md-table-cell">
                                    <a href="/c/mitra/{{$item->id}}" class="badge bg-primary">
                                        <span data-feather="eye"></span>
                                    </a>
                                    <a href="/c/mitra/{{$item->id}}/edit" class="badge bg-success">
                                        <span data-feather="edit-2"></span>
                                    </a>
                                    <form action="/c/mitra/{{$item->id}}" class="d-inline" method="post">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('Are you sure?')" class="badge bg-danger border-0"><span data-feather="trash-2"></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $mitra->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection