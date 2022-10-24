@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('container')
<style>
    table tr td,
    table tr th {
        background-color: rgba(0, 0, 0, 0) !important;
    }

    .list-group-item.active {
        background: linear-gradient(106deg, rgba(41, 85, 155, 0.5) 10.89%, #29559B 100%);

    }
</style>
<section id="konten" class="pb-5" style="background-color: #e6e6e6;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">

                    <a href="/mitra/klien" class="list-group-item list-group-item-action {{ Request::is('mitra/klien') ? 'active' : '' }}">Klien</a>
                    <a href="/mitra/rekanan" class="list-group-item list-group-item-action {{ Request::is('mitra/rekanan') ? 'active' : '' }}">Rekanan</a>
                </div>
                <div class="mt-5 px-5 py-3 bg-light rounded text-center">
                    <h1 style="color: #FFAA00;font-size: 48px;">{{ $count }}</h1>
                    <h4 style="color: #4D4D4D;font-size: 20px;">Total Rekanan</h4>
                </div>
            </div>
            <div class="col-md-9">
                <table class="table pb-5">
                    <tr>
                        <th>No</th>
                        <th>Nama Klien</th>
                        <th>Tanggal Kerjasama</th>
                    </tr>
                    @foreach($mitra as $item)
                    <tr>
                        <td class="active">{{ $mitra->firstItem() + $loop->index }}</td>
                        <td class="active">{{ $item->name }}</td>
                        <td class="active">{{ $item->tanggal_kerjasama }}</td>
                    </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-end mt-3">
                    {{ $mitra->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection