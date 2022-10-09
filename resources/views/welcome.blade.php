@extends('layouts.app')

@section('content')
<!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    
</div> -->
<div class="container">
    <div class="row justify-content-center">
        @if (!empty($studios) && count($studios)>0)
            @foreach($studios as $key => $row)
                <div class="col-md-3">
                    <div class="card" >
                        <div class="card-header">
                            {{ $row['studio_name'] }}
                        </div>
                        @if($row['studio_image']) <img class="card-img" src = "{{ url($row['studio_image']) }}"  /> @endif
                        <div class="card-body">
                            <p class="card-text">{{ $row['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection

