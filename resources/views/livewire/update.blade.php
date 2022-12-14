<form>
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Заголовок:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Заголовок" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Текст:</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="body" placeholder="Текст"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Сохранить</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Отмена</button>
</form>
