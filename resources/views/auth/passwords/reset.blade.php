@extends('layouts.app')

@section('content')
    @component('components.hero')
        <form method="POST" action="{{ route('password.update') }}" class="box">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="field">
                <label for="email" class="label is-hidden">E-Mail-Adresse</label>
                <div class="control has-icons-left">
                    <input type="email" name="email" value="{{ old('email') }}" class="input @error('email') is-danger @enderror" placeholder="E-Mail-Adresse" required autofocus>
                    <span class="icon is-small is-left">
                        <span class="oi" data-glyph="envelope-closed"></span>
                    </span>
                </div>
                @component('components.error_field', ['fieldName' => 'email']) @endcomponent
            </div>

            <div class="field">
                <label for="password" class="label is-hidden">Neues Passwort</label>
                <div class="control has-icons-left">
                    <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" placeholder="Neues Passwort" required>
                    <span class="icon is-small is-left">
                        <span class="oi" data-glyph="key"></span>
                    </span>
                </div>
                @component('components.error_field', ['fieldName' => 'password']) @endcomponent
            </div>

            <div class="field">
                <label for="password_confirmation" class="label is-hidden">Passwort wiederholen</label>
                <div class="control has-icons-left">
                    <input id="password_confirmation" type="password" class="input" name="password_confirmation" placeholder="Passwort wiederholen" required>
                    <span class="icon is-small is-left">
                        <span class="oi" data-glyph="key"></span>
                    </span>
                </div>
            </div>

            <div class="field">
                <button type="submit" class="button is-primary is-fullwidth">
                    Passwort zurücksetzen
                </button>
            </div>
        </form>
    @endcomponent
@endsection
