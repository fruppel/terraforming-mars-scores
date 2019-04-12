<div class="form-group row">
    <label for="date" class="col-sm-2 col-form-label">Datum</label>
    <div class="col-sm-10">
        <input type="datetime-local" id="date" name="date" class="form-control" value="{{ $game->date }}">
    </div>
</div>
<div class="form-group row">
    <label for="map_id" class="col-sm-2 col-form-label">Karte</label>
    <div class="col-sm-10">
        <select name="map_id" id="map_id" class="custom-select">
            @foreach ($maps as $map)
            <option value="{{ $map->id }}" {{ (int) $game->map_id === $map->id ? 'selected' : '' }}>{{ $map->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Erweiterungen</label>
    <div class="col-sm-10">
        <div class="custom-control custom-switch">
            <input type="checkbox" name="corporate_area" id="corporate_area" class="custom-control-input" {{ $game->corporate_area ? 'checked' : '' }}>
            <label class="custom-control-label" for="corporate_area">Zeitalter der Konzerne</label>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="corporate_mini_extension" id="corporate_mini_extension" class="custom-control-input" {{ $game->corporate_mini_extension ? 'checked' : '' }}>
            <label class="custom-control-label" for="corporate_mini_extension">Konzerne Mini-Erweiterung</label>
        </div>
    </div>
</div>
<div class="form-group row mt-4">
    <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary mr-1">Speichern</button>
        <a href="{{ route('games.index') }}" class="btn btn-secondary">Abbrechen</a>
    </div>
</div>