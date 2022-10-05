@extends('cms.layout.main')
@section('container')

<main class="content">


    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>News</strong> Dashboard</h1>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    @if(session()->has('success'))
                    < <div class="row p-3 rounded" style="background-color:#cbf5d9 ;">
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
                    <a href="/c/news/create" class="btn btn-primary m-2">Create news</a>
                </div>

                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-xl-table-cell">Start Date</th>
                            <th class="d-none d-xl-table-cell">End Date</th>
                            <th>Status</th>
                            <th class="d-none d-md-table-cell">Assignee</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">{{ $item->title }}</td>
                            <td class="d-none d-xl-table-cell">31/06/2021</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
</main>

@endsection