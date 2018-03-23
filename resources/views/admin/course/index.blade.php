@extends('layouts.app')

@section('title','Course')

@push('css')

@endpush

@section('content')
    <header class="content__title">
        <a href="{{ route('course.create') }}" class="btn btn-info">Create Course</a>
    </header>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Courses</h4>
            {{--<h6 class="card-subtitle"></h6>--}}

            <div class="table-responsive">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Update At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Update At</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($courses as $key=>$course)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->description }}</td>
                                <td>{{ $course->updated_at }}</td>
                                <td class="text-right">
                                    <button class="btn btn-primary btn--icon-text">
                                        <i class="zmdi zmdi-home"></i>Show</button>

                                    <a class="btn btn-info btn--icon-text" href="{{ route('course.edit',$course->id) }}">
                                        <i class="zmdi zmdi-edit"></i>Edit</a>

                                    <button class="btn btn-danger btn--icon-text" 
                                                onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault; document.getElementById('delete-form-{{ $course->id }}').submit();
                                                }else{
                                                    event.preventDefault;
                                                }">
                                        <i class="zmdi zmdi-delete"></i>Delete</button>
                                    <form id="delete-form-{{ $course->id }}" method="POST" action="{{ route('course.destroy',$course->id) }}" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- Vendors: Data tables -->
    <script src="{{ asset('vendors/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
@endpush