@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('title','Produk Individu')
@section('container')
<section id="konten" class="m-5">
    <div class="container">
        <div class="row mb-5 py-5">
            <div class="col-md">
                <h1>{{ $var->produk_individu_sec1->value ?? 'produk_individu_sec1[value]' }}</h1>
                <p>
                    {!! $var->produk_individu_sec1->content ?? 'produk_individu_sec1[content]' !!}
                </p>
            </div>
            <div class="col-md">
                @if($var->produk_individu_sec1->image)
                <img src="{{ asset('storage/'.$var->produk_individu_sec1->image) }}" class="img-fluid" style="border-radius:10px" alt="">
                @endif
            </div>
        </div>
        <div class="row mt-5 py-5">
            <div class="col-md">
                <h1>2 Manfaat Reliance Endowment</h1>
                <p>
                    1. Manfaat Asuransi sebesar Uang Pertanggungan ditambah Akumulasi Dana Tabungan akan dibayarkan kepada Penerima pertanggungan asuransi baik karena sakit maupun kecelakaan dan selanjutnya asuransi berakhir.

                    2. Manfaat Asuransi sebesar Akumulasi Dana Tabungan Tertanggung akan dibayarkan jika Tertanggung hidup sampai dengan akhir masa pertanggungan asuransi
                </p>
            </div>
            <div class="col-md">
                <img src="https://via.placeholder.com/350x250" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>
@endsection