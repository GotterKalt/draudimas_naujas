@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{__("messages.carsList")}}</h2>

        <a href="{{ route('cars.create') }}" class="btn btn-success">{{__("Add new car")}}</a>
        <hr>

        <table class="grid">

            <tbody>
            @foreach ($cars as $car)
                <tr onclick="window.location='{{ route('cars.specific', $car->id) }}';" style="cursor: pointer;">

                    <td>

                        @if($car->image_path != null)
                            <img src="{{ asset('images/' . $car->image_path) }}" alt="" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
                        @else {{__("None")}}
                        @endif
                    </td>
                    <td>{{ $car->reg_number }}</td>
                    <td>{{ $car->owner_id }}</td>
                    <td>
                        <a href="{{ route('cars.specific', $car->id) }}">{{__("See details")}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
