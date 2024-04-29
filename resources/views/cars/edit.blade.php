@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{__("Edit car")}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('cars.update', $car) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">{{__("Licence plate number")}}</label>
                                <input type="text" class="form-control @error('reg_number') is-invalid @enderror" name="reg_number" value="{{ $car->reg_number }}">
                                @error('reg_number') {{$message}} @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Car brand")}}</label>
                                <select name="brand" class="form-select">
                                        <?php
                                        $brands = array("Volvo", "BMW", "Toyota", "Honda", "Audi", "Volkswagen");
                                        foreach ($brands as $brand) {
                                            echo "<option value='$brand'>$brand</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Model")}}</label>
                                <input type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $car->model }}">
                                @error('model') {{$message}} @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Owner")}}</label>
                                <select name="owner_id" class="form-select">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" {{ $owner->id == $car->owner_id ? 'selected' : '' }}>
                                            {{ $owner->name }} {{ $owner->surname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if($car->images!=null)
                                <label class="form-label">{{__("Photos")}}</label>
                                @foreach($car->images as $image)
                                    <div class="mb-3 alert alert-info">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card text-black bg-secondary mb-3" style="max-width: 20rem;">
                                                    <div class="card-body">
                                                        <img src="{{ asset('images/' . $image->image) }}" class="card-img-top" style="max-width: 100px; max-height: 100px;">
                                                        <a href="{{ route('cars.photoDelete', $image->id) }}" class="btn btn-danger btn-sm mt-2"><span class="delete-photo" style="cursor: pointer;">&#10006;</span> {{__("Delete")}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label class="form-label">{{__("Upload new photos")}}</label>
                                <input type="file"
                                       class="form-control @error('photo') is-invalid @enderror"
                                       name="images[]"
                                       accept="image/*"
                                       multiple>
                                @error('photo') {{$message}} @enderror
                            </div>
                            <button class="btn btn-success">{{__("Save")}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
