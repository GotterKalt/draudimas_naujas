@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Savininku sąrašas</h2>

        <a href="{{ route('owners.create') }}" class="btn btn-success">Pridėti naują sąvininką</a>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Telefono nr.</th>
                <th>El. paštas</th>
                <th>Adresas</th>
                <th>Veiksmai</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($owners as $owner)
                <tr>
                    <td>{{ $owner->id }}</td>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->surname }}</td>
                    <td>{{ $owner->phone }}</td>
                    <td>{{ $owner->email }}</td>
                    <td>{{ $owner->address }}</td>
                    <td>
                        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary">Redaguoti</a>


                        <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" style="display: inline;">
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
