<div class="list-group custom-list">
    @foreach($list as $item)
    <a href="/about/{{ $item->slug }}#konten" class="list-group-item list-group-item-action {{ Request::is('about/'.$item->slug) ? 'active' : '' }}">
        {{ $item->title }}
    </a>
    @endforeach
    <a href="/keuangan#konten" class="list-group-item list-group-item-action {{ Request::is('keuangan') ? 'active' : '' }}">
        Laporan Keuangan
    </a>
</div>