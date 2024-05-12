@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{__("messages.ownersList")}}</h2>

        <a href="{{ route('owners.create') }}" class="btn btn-success">{{__("Add new owner")}}</a>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{__("Name")}}</th>
                <th>{{__("Surname")}}</th>
                <th>{{__("Phone number")}}</th>
                <th>{{__("Email")}}</th>
                <th>{{__("Adress")}}</th>
                <th>{{__("Owned cars")}}</th>
                <th>{{__("Options")}}</th>
            </tr>
            </thead>
            @foreach ($owners as $owner)
                @can('view', $owner)
            <tbody>

                <tr>
                    <td>{{ $owner->id }}</td>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->surname }}</td>
                    <td>{{ $owner->phone }}</td>
                    <td>{{ $owner->email }}</td>
                    <td>{{ $owner->address }}</td>
                    <td>
                        @foreach( $owner->cars as $car)
                            {{ $car->reg_number }} <br>
                        @endforeach
                    </td>
                    <td>
                        @can('update', $owner)
                        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary">{{__("Edit")}}</a>
                        @endcan
                        @can('delete', $owner)
                        <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this owner?')">{{__("Delete")}}</button>
                            @endcan
                        </form>
                    </td>
                </tr>

            </tbody>
                @endcan
            @endforeach
        </table>

    </div>
@endsection
