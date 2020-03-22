<div class="field">
    <label for="email" class="label">Datum</label>
    <div class="control">
        <input type="datetime-local" id="date" name="date" class="input" value="{{ $game->date }}">
    </div>
    @component('components.error_field', ['fieldName' => 'date']) @endcomponent
</div>

<div class="field">
    <label for="map_id" class="label">Karte</label>
    <div class="control">
        <div class="select is-fullwidth">
            <select name="map_id" id="map_id">
                @foreach ($maps as $map)
                    <option value="{{ $map->id }}" {{ (int) $game->map_id === $map->id ? 'selected' : '' }}>{{ $map->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @component('components.error_field', ['fieldName' => 'map_id']) @endcomponent
</div>

<div class="field">
    <label class="label">Erweiterungen</label>
    <div class="control">
        <label class="checkbox" for="corporate_area">
            <input type="checkbox" name="corporate_area" id="corporate_area" class="checkbox" {{ $game->corporate_area ? 'checked' : '' }}>
            Zeitalter der Konzerne
        </label>
    </div>
    <div class="control">
        <label class="checkbox" for="corporate_area">
            <input type="checkbox" name="corporate_mini_extension" id="corporate_mini_extension" class="checkbox" {{ $game->corporate_mini_extension ? 'checked' : '' }}>
            Konzerne Mini-Erweiterung
        </label>
    </div>
</div>

<div class="field">
    <div class="buttons">
        <button type="submit" class="button is-primary">Speichern</button>
        <a href="{{ route('games.index') }}" class="button is-danger is-outlined">Abbrechen</a>
    </div>
</div>
