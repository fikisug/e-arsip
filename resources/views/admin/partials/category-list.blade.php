@foreach ($allKategori as $k)
    <li class="nav-item">
        <a href="{{ url('/inputFile'.'/'.$k->id) }}" class="nav-link {{ request()->url() == url('/inputFile'.'/'.$k->id) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{$k->nama}}</p>
        </a>
    </li>
@endforeach