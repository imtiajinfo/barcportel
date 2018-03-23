@extends('layouts.app')

@section('title','Course')

@push('css')

@endpush

@section('content')
   <div class="content__inner">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Course</h4>
                <form method="POST" action="{{ route('course.store') }}">
                    @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Course Name" name="name">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Course Description" name="description"></textarea>
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