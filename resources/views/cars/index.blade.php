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



                    @foreach ($cars as $car)

                @can('view', $car)
                    <script>
                        console.log("allowed");
                    </script>
                <tr onclick="window.location='{{ route('cars.specific', $car->id, $car->owner) }}';" style="cursor: pointer;">

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
                @endcan
                    @endforeach

                @if ($cars->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">{{__("No cars yet")}}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
