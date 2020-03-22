@extends('layouts.app')

@section('content')
    @component('components.hero')
        <form method="POST" action="{{ route('login') }}" class="box">
            @csrf

            <div class="field">
                <label for="email" class="label is-hidden">E-Mail</label>
                <div class="control has-icons-left">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="input @error('email') is-danger @enderror" placeholder="E-Mail-Adresse" required autofocus>
                    <span class="icon is-small is-left">
                        <span class="oi" data-glyph="envelope-closed"></span>
                    </span>
                </div>
                @component('components.error_field', ['fieldName' => 'email']) @endcomponent
            </div>
            <div class="field">
                <label for="password" class="label is-hidden">Passwort</label>
                <div class="control has-icons-left">
                    <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" value="{{ old('password') }}" placeholder="Passwort"  required>
                    <span class="icon is-small is-left">
                        <span class="oi" data-glyph="key"></span>
                    </span>
                </div>
                @component('components.error_field', ['fieldName' => 'password']) @endcomponent
            </div>
            <div class="field">
                <label for="remember" class="checkbox">
                    <input type="checkbox" name="remember" id="remember">
                    Angemeldet bleiben
                </label>
            </div>
            <div class="columns">
                <div class="column">
                    <button type="submit" class="button is-primary is-fullwidth">
                        Anmelden
                    </button>
                </div>
                <div class="column">
                    <a class="button is-outlined is-fullwidth" href="{{ route('password.request') }}">
                        Passwort vergessen?
                    </a>
                </div>
            </div>
        </form>
    @endcomponent
@endsection
