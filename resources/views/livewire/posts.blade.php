<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th>N.</th>
            <th>Заголовок</th>
            <th>Текст</th>
            <th width="150px">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td class="flex">
                    <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm mr-1 mb-1">Редактировать</button>
                    <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Удалить</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
