@extends('layouts.app')

@section('title','Course')

@push('css')

@endpush

@section('content')
   <div class="content__inner">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Course</h4>
                <form method="POST" action="{{ route('course.update',$course->id) }}">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Course Name" name="name" value="{{ $course->name }}">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Course Description" name="description">{{ $course->description }}
                    </textarea>
                    <i class="form-group__bar"></i>
                </div>
                <div class="btn-demo">
                    <a href="{{ route('course.index') }}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                 </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    
@endpush