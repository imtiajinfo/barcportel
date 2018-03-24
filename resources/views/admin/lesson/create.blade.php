@extends('layouts.app')

@section('title','Lesson')

@push('css')

@endpush

@section('content')
   <div class="content__inner">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Lesson</h4>
                <form method="POST" action="{{ route('lesson.store',['course'=>$course,'unit'=>$unit]) }}">
                    @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Lesson Title" name="title">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group">
                    <label class="form-control">Body</label>
                    <textarea class="form-control" name="body"></textarea>
                    <i class="form-group__bar"></i>
                </div>
                <div class="btn-demo">
                    <a href="{{ route('lesson.index',['course'=>$course,'unit'=>$unit]) }}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                 </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'body' );
    </script>
@endpush