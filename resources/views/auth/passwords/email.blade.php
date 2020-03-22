@extends('layouts.app')

@section('content')
    @component('components.hero')
        <form method="POST" action="{{ route('password.email') }}" class="box">
            @csrf

            @if (session('status'))
                <p class="help is-success">{{ session('status') }}</p>
            @endif

            <div class="field">
                <label for="email" class="label is-hidden">E-Mail</label>
                <div class="control has-icons-left">
                    <input type="email" name="email" value="{{ old('email') }}" class="input @error('email') is-danger @enderror" placeholder="E-Mail-Adresse" required autofocus>
                    <span class="icon is-small is-left">
                        <span class="oi" data-glyph="envelope-closed"></span>
                    </span>
                </div>
                @component('components.error_field', ['fieldName' => 'email']) @endcomponent
            </div>

                <div class="field">
                    <button type="submit" class="button is-primary is-fullwidth">
                        Passwort zurücksetzen
                    </button>
                </div>
        </form>
    @endcomponent
@endsection
