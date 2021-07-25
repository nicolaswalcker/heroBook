@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif


<div class="c-form-template">
    @csrf
    <div class="c-name-input-area">
        <label class="c-label" for="name">Nome do herói</label>
        <input class="c-small-input" type="text" name="name" id="name" placeholder="Ex: Superman"
            value='{{ $hero->name ?? old('name') }}'>
    </div>
    <div class="c-powerups-input-area">
        <label class="c-label" for="powerups">Nome do herói</label>
        <small class="c-warning-small">Digite os super poderes separados por virgula!</small>
        <input class="c-small-input" type="text" name="powerups" id="powerups"
            placeholder="Ex: Poder1, poder2, poder3..." value='{{ $hero->powerups ?? old('powerups') }}'>
    </div>
    <div class="c-description-input-area">
        <label class="c-label" for="description">Descrição do herói</label>
        <textarea class="c-big-input" name="description" id="description" cols="30" rows="4"
            placeholder="Descrição do herói">{{ $hero->description ?? old('description') }}</textarea>
    </div>
    <input class="c-image-input" type="file" name="image" id="image">
</div>

