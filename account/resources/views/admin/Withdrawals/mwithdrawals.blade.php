<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
} else {
    $text = 'light';
}
?>
@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Manage clients withdrawals</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">
                                <table id="ShipTable" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Account Holder</th>
                                            <th>Amount </th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Beneficiary</th>
                                            <th>Status</th>
                                            <th>Date created</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($withdrawals as $deposit)
                                            <tr>
                                                <th scope="row">{{ $deposit->id }}</th>
                                                <td>{{ $deposit->duser->name }}</td>
                                                <td>{{ $settings->currency }}{{ number_format($deposit->amount) }}</td>
                                                <td>{{ $deposit->Description }}</td>
                                                <td>{{ $deposit->payment_mode }}</td>
                                                <td>{{ $deposit->accountname }}</td>
                                                <td>
                                                    @if ($deposit->status == 'Processed')
                                                        <span class="badge badge-success">{{ $deposit->status }}</span>
                                                    @elseif($deposit->status == 'On-hold')
                                                        <span class="badge badge-warning">{{ $deposit->status }}</span>
                                                    @else
                                                    <span class="badge badge-danger">{{ $deposit->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($deposit->created_at)->toDayDateTimeString() }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('processwithdraw', $deposit->id) }}"
                                                        class="m-1 btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
