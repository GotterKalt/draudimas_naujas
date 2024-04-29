@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{__("messages.carsList")}}</h2>

        <a href="{{ route('cars.index') }}" class="btn btn-success">{{__("Back")}}</a>
        <hr>


            <tbody>
            <tr>

                    <h2>{{__("Photos")}}: </h2>
                <div class="row mt-4">
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
                    @else {{__("None")}}
                    @endif</div>


                <div>ID:
                    {{ $car->id }}</div>
                <div>{{__("Licence plate number")}}: {{ $car->reg_number }}</div>
                <div>{{__("Car brand")}}: {{ $car->brand }}</div>
                <div>{{__("Model")}}: {{ $car->model }}</div>
                <div>{{__("Owner ID")}}: {{ $car->owner_id }}</div>
                <div>{{__("Options")}}:
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">{{__("Edit")}}</a>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this owner?')">{{__("Delete")}}</button>
                    </form></div>
            </tr>

            </tbody>
    </div>
@endsection
