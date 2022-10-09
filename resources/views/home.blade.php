@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-0">
                        <div class="col-md-10 ">{{ __('Bookings') }}</div>
                        <div class="col-md-2 p-0 text-end">
                            @if(Auth::user()->user_type == 1)
                            <a href = "{{route('studio')}}"  class="btn btn-primary">
                                {{ __('Studio') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order Id</th>
                            <th scope="col">User</th>
                            <th scope="col">Studio</th>
                            <th scope="col">Booking Date</th>
                            <th scope="col">Booking Amount</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if (!empty($orders) && count($orders)>0)
                            @foreach($orders as $key => $row)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$row['id']}}</td>
                                    <td>{{$row['user']['name']}}</td>
                                    <td>{{$row['Studio']['studio_name']}}</td>
                                    <td>{{$row['booking_start_date']}} - {{$row['booking_start_time']}} <br /> 
                                        {{$row['booking_end_date']}} - {{$row['booking_end_time']}}</td>
                                    <td>{{$row['booking_amount']}}</td>
                                    <td>
                                        </td>
                                    
                                </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="red text-center">Sorry! No Record Found.</td>
                                    </tr>
                                @endif
                            
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
