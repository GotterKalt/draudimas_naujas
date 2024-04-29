@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{__("messages.carsList")}}</h2>

        <a href="{{ route('cars.create') }}" class="btn btn-success">{{__("Add new car")}}</a>


        <table class="table table-striped">
            <thead>
            <td>{{__("Number of photos")}}</td>
            <td>{{__("Licence plate number")}}</td>
            <td>{{__("Owner ID")}}</td>
            <td>{{__("Show details")}}</td>
            </thead>
            <tbody>
            @forelse ($cars as $car)
                <tr onclick="window.location='{{ route('cars.specific', $car->id) }}';" style="cursor: pointer;">

                    <td>

                        @if($car->images != null)
                            {{$car->images->count()}}
                        @else {{__("None")}}
                        @endif
                    </td>
                    <td>{{ $car->reg_number }}</td>
                    <td>{{ $car->owner_id }}</td>
                    <td>
                        <a href="{{ route('cars.specific', $car->id) }}"class="btn btn-primary">{{__("Show details")}}</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No cars yet</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
