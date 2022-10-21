@extends('cms.layout.main')
@section('container')

<main class="content">


    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Galeri</strong> Dashboard</h1>
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
                        <a href="/c/galeri/create" class="btn btn-primary m-2">Add Image</a>
                    </div>

                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th class="d-none d-xl-table-cell">Created At</th>
                                <th class="d-none d-md-table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galeri as $item)
                            <tr>
                                <td>{{ $galeri->firstItem() + $loop->index }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->title }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->created_at }}</td>
                                <td class="d-none d-md-table-cell">
                                    <a href="/c/galeri/{{$item->id}}/edit" class="badge bg-success">
                                        <span data-feather="edit-2"></span>
                                    </a>
                                    <form action="/c/galeri/{{$item->id}}" class="d-inline" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 button-submit"><span data-feather="trash-2"></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $galeri->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection