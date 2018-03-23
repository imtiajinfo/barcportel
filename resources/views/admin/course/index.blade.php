@extends('layouts.app')

@section('title','Course')

@push('css')

@endpush

@section('content')
    {{--<header class="content__title">--}}
        {{--<h1>DATA TABLES</h1>--}}

        {{--<div class="actions">--}}
            {{--<a href="#" class="actions__item zmdi zmdi-trending-up"></a>--}}
            {{--<a href="#" class="actions__item zmdi zmdi-check-all"></a>--}}

            {{--<div class="dropdown actions__item">--}}
                {{--<i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>--}}
                {{--<div class="dropdown-menu dropdown-menu-right">--}}
                    {{--<a href="#" class="dropdown-item">Refresh</a>--}}
                    {{--<a href="#" class="dropdown-item">Manage Widgets</a>--}}
                    {{--<a href="#" class="dropdown-item">Settings</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</header>--}}

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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Update At</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($courses as $key=>$course)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->description }}</td>
                                <td>{{ $course->update_at }}</td>
                                <td>Acrtion</td>
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