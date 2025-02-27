<!-- resources/views/activity-log/index.blade.php -->

@extends('layouts.app')

@section('header')
    <h2>Activity Log</h2>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Activity</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $log->user->name }}</td>
                                <td>{{ $log->activity }}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
