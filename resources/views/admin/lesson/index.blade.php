@extends('layouts.app')

@section('title','Lesson')

@push('css')

@endpush

@section('content')
    <header class="content__title">
        <a href="{{ route('unit.index',$course) }}" class="btn btn-info">Back to Unit</a>
        <a href="{{ route('lesson.create',['course'=>$course,'unit'=>$unit]) }}" class="btn btn-info">Create Lesson</a>
    </header>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All lesson</h4>
            {{--<h6 class="card-subtitle"></h6>--}}

            <div class="table-responsive">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            {{--<th>Body</th>--}}
                            <th>Unit No</th>
                            <th>Course Name</th>
                            <th>Update At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Unit No</th>
                        <th>Course Name</th>
                        <th>Update At</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($lessons as $key=>$lesson)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->unit->name }}</td>
                                <td>{{ $lesson->unit->course->name }}</td>
                                <td>{{ $lesson->updated_at }}</td>
                                <td class="text-right">
                                    <a href="{{ route('lesson.show',['course'=>$course,'unit'=>$unit,'lesson'=>$lesson->id]) }}" class="btn btn-primary btn--icon-text">
                                        <i class="zmdi zmdi-eye"></i>Show Details</a>

                                    <a class="btn btn-info btn--icon-text" href="{{ route('lesson.edit',['course'=>$course,'unit'=>$unit,'lesson'=>$lesson->id]) }}">
                                        <i class="zmdi zmdi-edit"></i>Edit</a>

                                    <button class="btn btn-danger btn--icon-text" 
                                                onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault; document.getElementById('delete-form-{{ $lesson->id }}').submit();
                                                }else{
                                                    event.preventDefault;
                                                }">
                                        <i class="zmdi zmdi-delete"></i>Delete</button>
                                    <form id="delete-form-{{ $lesson->id }}" method="POST" action="{{ route('lesson.destroy',['course'=>$course,'unit'=>$unit,'lesson'=>$lesson->id]) }}" style="display:none;">
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