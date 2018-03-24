@extends('layouts.app')

@section('title','Unit')

@push('css')

@endpush

@section('content')
    <header class="content__title">
        <a href="{{ route('course.index') }}" class="btn btn-info">Back to Course</a>
        <a href="{{ route('unit.create',$course) }}" class="btn btn-info">Create Unit</a>
    </header>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Unit</h4>
            {{--<h6 class="card-subtitle"></h6>--}}

            <div class="table-responsive">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Course Name</th>
                            <th>Update At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Course Name</th>                        
                        <th>Update At</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($units as $key=>$unit)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $unit->name }}</td>
                                <td>{{ $unit->description }}</td>
                                <td>{{ $unit->course->name }}</td>
                                <td>{{ $unit->updated_at }}</td>
                                <td class="text-right">
                                    <a href="{{ route('lesson.index',['course'=>$course,'unit'=>$unit->id]) }}" class="btn btn-primary btn--icon-text">
                                        <i class="zmdi zmdi-eye"></i>Show Lesson</a>

                                    <a class="btn btn-info btn--icon-text" href="{{ route('unit.edit',['course'=>$course,'unit'=>$unit->id]) }}">
                                        <i class="zmdi zmdi-edit"></i>Edit</a>

                                    <button class="btn btn-danger btn--icon-text" 
                                                onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault; document.getElementById('delete-form-{{ $unit->id }}').submit();
                                                }else{
                                                    event.preventDefault;
                                                }">
                                        <i class="zmdi zmdi-delete"></i>Delete</button>
                                    <form id="delete-form-{{ $unit->id }}" method="POST" action="{{ route('unit.destroy',['course'=>$course,'unit'=>$unit->id]) }}" style="display:none;">
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