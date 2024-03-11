@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Car
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('cars.update', $car) }}">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Registration Number:</label>
                                <input type="text" class="form-control" name="reg_number" value="{{ $car->reg_number }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brand:</label>
                                <input type="text" class="form-control" name="brand" value="{{ $car->brand }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Model:</label>
                                <input type="text" class="form-control" name="model" value="{{ $car->model }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Owner:</label>
                                <select name="owner_id" class="form-select">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" {{ $owner->id == $car->owner_id ? 'selected' : '' }}>
                                            {{ $owner->name }} {{ $owner->surname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary">Update Car</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
