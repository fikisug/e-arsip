@foreach ($allKategori as $k)
    <li class="nav-item">
        <a href="{{ url('/inputFileUser'.'/'.$k->id) }}" class="nav-link {{ request()->url() == url('/inputFileUser'.'/'.$k->id) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{$k->nama}}</p>
        </a>
    </li>
@endforeach