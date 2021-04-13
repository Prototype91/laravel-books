<nav style="width: 80%; margin: 0 auto;">
    <ul style="list-style: none; display: flex; justify-content: space-between; padding: 20px 0;">
        <li class="icon-bar"><a href="{{url('/')}}">Accueil</a></li>
        @forelse($genres as $id => $genre)
        <li class="icon-bar"><a href="{{url('genre', $id)}}">{{$genre}}</a></li>
        @empty
        <li>Aucun genre pour l'instant</li>
        @endforelse
    </ul>
</nav>