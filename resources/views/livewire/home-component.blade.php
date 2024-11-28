<div>
    <h1>Home</h1>
    <button class="btn btn-primary" wire:click="create">{{ $activeForm ? 'Cancel' : 'Create' }}</button>

    @if ($activeForm)
        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" wire:model="name" placeholder="Name">
                </div>
                <div class="col-4">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" wire:model="price" placeholder="Price">
                </div>
                <div class="col-4">
                    <label for="count" class="form-label">Count</label>
                    <input type="number" class="form-control" id="count" wire:model="count" placeholder="Count">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2 offset-5">
                    <input type="submit" style="width: 80px;" class="btn btn-primary" value="Save">
                </div>
            </div>
        </form>
    @endif

@if (!$activeForm)

    <div>
        <table class="table table-striped table-bordered mt-3">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Count</th>
                <th>Action</th>
            </tr>
            @foreach ($models as $model)
                <tr>
                    <td>{{ $model->id }}</td>
                    <td>{{ $model->name }}</td>
                    <td>{{ $model->price }}</td>
                    <td>{{ $model->count }}</td>
                    <td>
                        <button type="button" class="btn btn-warning text-white fw-bold" style="cursor: pointer;"
                            wire:click="delete({{ $model->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash3" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                            </svg>
                        </button>

                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endif

</div>
