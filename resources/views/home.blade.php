<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}/style.css">

    <title>Maque Homework Challenge</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Maque Forum</h3>
        </div>
        <div class="row">
            <div class="col-md-9">
                <p>Your current timezone is :  {{ \Carbon\Carbon::now()->tzName }}</p>
            </div>
            @if($posts->count()>0)
                <div class="col-md-3">
                    <a href="{{ route('removeFromDatabase') }}" class="btn btn-danger">Remove From Database </a>
                </div>
            @endif
        </div>
            @forelse($posts as $post)
                <div class="row mt-2">
                    <div class="col-md-12">
                        <img class="rounded-circle float-left author-image"  src="{{ $post->author->avatar_url }}" alt="Card image cap">
                        <p class="author-paragraph"><span class="author-name">{{ $post->author->name }}</span> posted on {{\Carbon\Carbon::parse( $post->created_at)->toDayDateTimeString() }}
                    </div>
                    <div class="col-md-3">
                        <img class="card-img-top" src="{{ $post->image_url }}" alt="Card image cap">
                    </div>
                    <div class="col-md-9">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->body }}</p>
                        <p class="card-text"><small class="text-muted"></small></p>
                    </div>
                </div>
            @empty
            <div class="row mt-2">
                <div class="col-md-9">
                    <p>No Data in the table</p>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('storeInDatabase') }}" class="btn btn-primary"> Store Api Data </a>
                </div>
            </div>
            @endforelse

    </div>



</body>
<script src="{{asset('assets/js')}}/jquery-3.2.1.slim.min.js"></script>
<script src="{{asset('assets/js')}}/popper.min.js" ></script>
<script src="{{asset('assets/js')}}/bootstrap.min.js"></script>
</html>
