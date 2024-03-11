@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Automobiliu sarašas</h2>

        <a href="{{ route('cars.create') }}" class="btn btn-success">Pridėti automobilį</a>
        <hr>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Registracijos numeris</th>
                <th>Brendas</th>
                <th>Modelis</th>
                <th>Savininko ID</th>
                <th>Veiksmai</th>
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
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">Redaguoti</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this owner?')">Ištrinti</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
