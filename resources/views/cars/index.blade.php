@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{__("messages.carsList")}}</h2>

        <a href="{{ route('cars.create') }}" class="btn btn-success">{{__("Add new car")}}</a>
        <hr>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{__("Photos")}}</th>
                <th>{{__("Licence plate number")}}</th>
                <th>{{__("Car brand")}}</th>
                <th>{{__("Model")}}</th>
                <th>{{__("Owner ID")}}</th>
                <th>{{__("Options")}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>
                        @if($car->image_path != null)
                            <img src="{{ asset('images/' . $car->image_path) }}" alt="" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
                        @else {{__("None")}}
                        @endif
                    </td>
                    <td>{{ $car->reg_number }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->owner_id }}</td>
                    <td>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">{{__("Edit")}}</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this owner?')">{{__("Delete")}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
