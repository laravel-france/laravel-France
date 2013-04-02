@layout('main')

@section('css')
    @parent
    {{ HTML::style(URL::to_asset('bundles/forums/forums.css')) }}
@endsection

@section('title')
    Forums de Laravel France
@endsection

@section('content')

    <ul class="breadcrumb">
        <li><a title="Retour à la page d'accueil" href="{{ URL::home() }}"><i class="icon-home"></i></a> <span class="divider">/</span></li>
        <li>Forums - Accueil</li>
    </ul>

<div class="row">
    <div class="span12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="3"><strong>Forums</strong></th>
                    <th class="text-center">Sujets</th>
                    <th class="text-center">Messages</th>
                    <th>Dernier message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td width="1" style="padding:0"><div style="min-height:78px"></div></td>
                    <td width="37" class="ico-read">@if($category->isUnread())<i class="icon-circle"></i>@else<i class="icon-circle-blank"></i>@endif</td>
                    <td>
                        <strong>
                            <a href="{{ URL::to_action('forums::category@index', array($category->slug)) }}">
                                {{ $category->title }}
                            </a>
                        </strong>
                        @if($category->desc)
                        <br />{{ $category->desc }}
                        @endif
                    </td>
                    <td class="text-center" width="127">{{ $category->nb_topics }}</td>
                    <td class="text-center" width="127">{{ $category->nb_posts }}</td>
                    <td width="350">
                        @if($lm = $category->last_message)
                            <a href="{{ URL::to_action('forums::topic@index', array($category->slug, $lm[0]->topic->slug)) }}#message{{ $lm[0]->id }}">
                                {{ $lm[0]->topic->title }}<br />
                                {{ date('d/m/Y H:i:s',strtotime($lm[0]->created_at)) }}
                            </a><br />
                            <small>Par {{ $lm[0]->user->username }}</small>
                        @else
                            Aucun message dans cette catégorie
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <strong>Légende :</strong>
            <p class="ico-read">
                <i class="icon-circle"></i> : Messages non lus<br />
                <i class="icon-circle-blank"></i> : Messages lus
            </p>
        </div>
    </div>
</div>
@endsection