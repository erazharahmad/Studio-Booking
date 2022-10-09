@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    
                    <div class="row mb-0">
                        <div class="col-md-10 ">{{ __('Dashboard') }}</div>
                        <div class="col-md-2 p-0 text-end">
                            <a href = "{{route('create-studio')}}"  class="btn btn-primary">
                                {{ __('Add Studio') }}
                            </a>
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
                            <th scope="col">Image</th>
                            <th scope="col">Studio Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Location</th>
                            <th scope="col">Opening Time</th>
                            <th scope="col">Closing Time</th>
                            <th scope="col">Charges</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if (!empty($studioList))
                            @foreach($studioList as $key => $row)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>@if($row['studio_image']) <img src = "{{ url($row['studio_image']) }}" width = "100" height = "100"  /> @endif </td>
                                    
                                    <td>{{$row['studio_name']}}</td>
                                    <td>{{$row['description']}}</td>
                                    <td>{{$row['location']}}</td>
                                    <td>{{$row['opening_time']}}</td>
                                    <td>{{$row['closing_time']}}</td>
                                    <td>{{$row['charges']}}</td>
                                    
                                    <td>
                                        <a href="{!! route('update-studio', ['id'=>$row->id]) !!}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger" onClick = "confirm('Delete is not working yet')"><i class="far fa-trash-alt"></i></a></td>
                                    
                                </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="red text-center">Sorry! No Record Found.</td>
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
