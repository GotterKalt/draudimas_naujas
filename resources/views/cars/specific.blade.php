@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{__("messages.carsList")}}</h2>

        <a href="{{ route('cars.index') }}" class="btn btn-success">{{__("Back")}}</a>
        <hr>

        <div class="align-content-center">
            <div class="row justify-content-center">
                <h2>{{__("Photos")}}:</h2>
                <div class="row mt-4 justify-content-center">
                    @if($car->images != null)
                        @foreach($images as $image)
                            <div class="col-md-3">
                                <div class="card text-black bg-secondary mb-3" style="max-width: 20rem;">
                                    <div class="card-body">
                                        <img src="/images/{{$image->image}}" class="card-img-top">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12 text-center">
                            <p>{{__("None")}}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="mb-3 h4">{{__("ID")}}: {{ $car->id }}</div>
                    <div class="mb-3 h4">{{__("Licence plate number")}}: {{ $car->reg_number }}</div>
                    <div class="mb-3 h4">{{__("Car brand")}}: {{ $car->brand }}</div>
                    <div class="mb-3 h4">{{__("Model")}}: {{ $car->model }}</div>
                    <div class="mb-3 h4">{{__("Owner ID")}}: {{ $car->owner_id }}</div>
                </div>
            </div>

            <div>
                <div class="btn-group">
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">{{__("Edit")}}</a>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this owner?')">{{__("Delete")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
