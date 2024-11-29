<div>
    <h1>Products</h1>
    <button class="btn btn-outline-primary" style="width: 90px; font-size:20px;"
        wire:click="{{ $activeForm ? 'cancel' : 'create' }}">{{ $activeForm ? 'Cancel' : 'Create' }}</button>

    @if ($activeForm)
        <form wire:submit.prevent="save">
            <div class="row mt-3">
                <div class="col-4">
                    <label for="ct_id" class="form-label">Category</label>
                    <select wire:model="category_id" class="form-control" id="ct_id">
                        <option value="">Choose</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" wire:model="name" placeholder="Name">
                </div>
                <div class="col-4">
                    <label for="company" class="form-label">Company</label>
                    <input type="text" class="form-control" id="company" wire:model="company"
                        placeholder="Company">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" wire:model="country"
                        placeholder="Country">
                </div>
                <div class="col-4">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" wire:model="price" placeholder="Price">
                </div>
                <div class="col-2">
                    <input type="submit" style="width: 80px; margin-top:32px;" class="btn btn-primary" value="Save">
                </div>
            </div>
        </form>
    @endif

    @if (!$activeForm)

        <div>
            <table class="table table-striped table-bordered mt-3">
                <tr>
                    <th style="width: 35px;">#</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Country</th>
                    <th>Price</th>
                    <th style="width: 150px;">Action</th>
                </tr>
                <tr>
                    <td>#</td>
                    <td>
                        <select class="form-control" wire:model="searchCategory" wire:change="searchColumns">
                            <option value="">Choose</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" class="form-control" wire:model="searchName" wire:keydown="searchColumns"
                            placeholder="Search"></td>
                    <td><input type="text" class="form-control" wire:model="searchCompany"
                            wire:keydown="searchColumns" placeholder="Search"></td>
                    <td><input type="text" class="form-control" wire:model="searchCountry"
                            wire:keydown="searchColumns" placeholder="Search"></td>
                    <td><input type="number" class="form-control" wire:model="searchPrice" wire:keydown="searchColumns"
                            placeholder="Search"></td>
                    <td>
                        <a class="badge text-bg-warning mt-2" style="cursor: pointer;" wire:click="refresh">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                <path
                                    d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @foreach ($models as $model)
                    @if ($editFromProduct != $model->id)
                        <tr>
                            <td>{{ $model->id }}</td>
                            <td>
                                <span
                                    class="{{ $model->is_active ? 'text-success' : 'text-danger text-decoration-line-through' }}">
                                    {{ $model->category->name }}
                                </span>
                            </td>
                            <td>
                                <span
                                    class="{{ $model->is_active ? 'text-success' : 'text-danger text-decoration-line-through' }}">
                                    {{ $model->name }}
                                </span>
                            </td>
                            <td>
                                <span
                                    class="{{ $model->is_active ? 'text-success' : 'text-danger text-decoration-line-through' }}">
                                    {{ $model->company }}
                                </span>
                            </td>
                            <td>
                                <span
                                    class="{{ $model->is_active ? 'text-success' : 'text-danger text-decoration-line-through' }}">
                                    {{ $model->country }}
                                </span>
                            </td>
                            <td>
                                <span
                                    class="{{ $model->is_active ? 'text-success' : 'text-danger text-decoration-line-through' }}">
                                    {{ $model->price }}
                                </span>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input mt-2" style="cursor: pointer;" type="checkbox"
                                        wire:click="changeActive({{ $model->id }})"
                                        {{ $model->is_active ? 'checked' : '' }}>

                                    <a class="badge text-bg-danger" style="cursor: pointer;"
                                        wire:click="delete({{ $model->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </a>
                                    <a class="badge text-bg-warning" style="cursor: pointer;"
                                        wire:click="editForm({{ $model->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endif
                    @if ($editFromProduct == $model->id)
                        <tr>
                            <td>{{ $model->id }}</td>
                            <td>
                                <select wire:model.defer="editCategory_id" class="form-control">
                                    <option value="">Choose</option>
                                    @foreach ($categories as $category)
                                        {{-- {{$model->category_id == $category->id ? 'checked' : ''}} --}}
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" wire:model.defer="editName"
                                    wire:keydown.enter="updateForm" placeholder="Name">
                            </td>
                            <td>
                                <input type="text" class="form-control" wire:model.defer="editCompany"
                                    wire:keydown.enter="updateForm" placeholder="Company">
                            </td>
                            <td>
                                <input type="text" class="form-control" wire:model.defer="editCountry"
                                    wire:keydown.enter="updateForm" placeholder="Country">
                            </td>
                            <td>
                                <input type="number" class="form-control" wire:model.defer="editPrice"
                                    wire:keydown.enter="updateForm" placeholder="Price">
                            </td>
                            <td>
                                <input type="submit" value="Update" class="btn btn-primary"
                                    wire:click="updateForm">
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    @endif

</div>
