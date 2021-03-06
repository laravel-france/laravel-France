@layout('main')

@section('title')
    Contactez nous - Laravel France
@endsection

@section('content')
    
    <ul class="breadcrumb">
        <li><a title="Retour à la page d'accueil" href="{{ URL::home() }}"><i class="icon-home"></i></a> <span class="divider">/</a></li>
        <li>Contact</li>
    </ul>

    <article>
        
        <header>
            <h1>Contact</h1>
        </header>

        <section>

        {{ Form::open(null,null,array('id'=>'contact_form', 'class'=>'form-horizontal')) }}

            {{ Form::token() }}

            <div class="control-group @if($errors->has('nom'))error@endif">
                {{ Form::label('nom','Nom* :',array('class'=>'control-label')) }}
                <div class="controls">
                {{ Form::text('nom', Input::old('nom')) }}
                {{ $errors->first('nom', '<span class="help-inline">:message</span>') }}
                </div>
            </div>

            <div class="control-group @if($errors->has('email'))error@endif">
                {{ Form::label('email','Email* :',array('class'=>'control-label')) }}
                <div class="controls">
                {{ Form::text('email', Input::old('email')) }}
                {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
                </div>
            </div>

            <div class="control-group @if($errors->has('sujet'))error@endif">
                {{ Form::label('sujet','Sujet :',array('class'=>'control-label')) }}
                <div class="controls">
                {{ Form::text('sujet', Input::old('sujet')) }}
                {{ $errors->first('sujet', '<span class="help-inline">:message</span>') }}
                </div>
            </div>

            <div class="control-group @if($errors->has('message'))error@endif">
                {{ Form::label('message', 'Message* :',array('class'=>'control-label'))}}
                <div class="controls">
                {{ Form::textarea('message', Input::old('message'),array('class'=>'span8')) }}
                {{ $errors->first('message', '<span class="help-inline">:message</span>') }}
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                {{ Form::submit('Envoyer',array('class'=>'btn btn-primary')) }}
                </div>
            </div>
            
        {{ Form::close() }}
        </section>
@endsection