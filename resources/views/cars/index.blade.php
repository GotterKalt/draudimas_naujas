@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cars List</h2>

        <a href="{{ route('cars.create') }}" class="btn btn-info">Add a New Car</a>
        <hr>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Registration Number</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Owner ID</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->reg_number }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->owner_id }}</td>
                    <td>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">Edit</a>
                        <!-- Add a button for deletion if needed -->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
