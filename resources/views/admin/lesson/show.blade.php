@extends('layouts.app')

@section('title','Lesson')

@push('css')

@endpush

@section('content')
    <div class="content__inner">
        <a href="{{ route('lesson.index',['course'=>$course,'unit'=>$unit]) }}" class="btn btn-info">Back to All Lessons</a>

        <header class="content__title">
            <h1>{{ $lesson->title }}</h1>
            <small>on {{ $lesson->updated_at->diffForHumans() }}</small>
    </header>

    <div class="row">
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <img class="card-img-top" src="demo/img/blog/1.jpg" alt="">

                <div class="card-body">
                    {!! htmlspecialchars_decode( $lesson->body) !!}
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-5 hidden-md-down">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Related Lesson</h4>
                    <h6 class="card-subtitle">Lesson that related to this unit</h6>
                </div>

                <div class="listview listview--hover">
                    @foreach($relateds as $related)
                        <a class="listview__item">
                            {{--<img src="demo/img/profile-pics/1.jpg" class="listview__img" alt="">--}}

                            <div class="listview__content">
                                <div class="listview__heading text-truncate">{{ $related->title }}</div>
                                <p>on {{ $related->updated_at->diffForHumans() }}</p>
                            </div>
                        </a>

                    @endforeach
                    <div class="m-4"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('script')

@endpush