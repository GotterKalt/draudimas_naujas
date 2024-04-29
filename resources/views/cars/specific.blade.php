@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{__("messages.carsList")}}</h2>

        <a href="{{ route('cars.index') }}" class="btn btn-success">{{__("Back")}}</a>
        <hr>


            <tbody>
            <tr>

                <div>{{__("Photos")}}:
                    @if($car->image_path != null)
                        <img src="{{ asset('images/' . $car->image_path) }}" alt="" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
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
