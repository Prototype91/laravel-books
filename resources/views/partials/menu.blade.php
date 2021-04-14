<nav style="width: 80%; margin: 0 auto;">
    <ul style="list-style: none; display: flex; justify-content: space-between; padding: 20px 0;">
        <li><a href="{{url('/')}}">Accueil</a></li>
        @if(isset($genres))
        @forelse($genres as $id => $genre)
        <li><a href="{{url('genre', $id)}}">{{$genre}}</a></li>
        @empty
        <li>Aucun genre pour l'instant</li>
        @endforelse
        @endif
        @if(Auth::check())
        <li><a href="{{route('book.index')}}">Dashboard</a></li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();
            ">
                Logout
            </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @else
        <li><a href="{{route('login')}}">Login</a></li>
        @endif
    </ul>
</nav>