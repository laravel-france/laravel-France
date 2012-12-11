@layout('blog::admin.layout')

@section('admincontent')
    <h3>Billets</h3>

    @if(!$posts)
        Aucun billet créé.
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Date de publication</th>
                <th>Date de modification</th>
                <th>Suppression</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->publicated_at->format('d-m-Y H:i:s') }}</td>
                <td>{{ $post->updated_at->format('d-m-Y H:i:s') }}</td>
                <td>{{ HTML::link_to_action('blog::admin.post@remove', 'Supprimer', array('id' => $post->id), array('class'=>'btn btn-danger')) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif

@endsection