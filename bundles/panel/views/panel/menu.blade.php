<h3>Bonjour {{ $user->username }}</h3>

<nav class="well">
    <h3>Mon compte</h3>
	<ul>
		<li><a href="{{ URL::to_action('panel::password@show') }}">Modifier mon mot de passe</a></li>
		<li><a href="{{ URL::to('logout') }}">Déconnexion</a></li>
	</ul>
</nav>

@if($user->is('Blog'))
<nav class="well">
    <h3>Blog</h3>
    <ul>
        <li>{{ HTML::link_to_action('blog::admin.post@new','Nouvel article') }}</li>
        <li>{{ HTML::link_to_action('blog::admin.post@list','Gestion des articles') }}</li>
    </ul>
</nav>
@endif

@if($user->is('Super Admin'))
<nav class="well">
    <h3>Laravel.fr</h3>
    <ul>
        <li><a href="{{ URL::to_action('panel::site@listusers') }}">Utilisateurs</a></li>
    </ul>
</nav>
@endif
