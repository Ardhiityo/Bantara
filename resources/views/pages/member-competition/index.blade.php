@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/compiled/css/table-datatable.css">
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>DataTable</h3>
                    <p class="text-subtitle text-muted">A sortable, searchable, paginated table without dependencies thanks
                        to
                        simple-datatables.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Simple Datatable
                    </h5>
                </div>
                <div class="card-body">
                    @role('admin')
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('member-competitions.create') }}" class="btn btn-primary mb-3">Create</a>
                            </div>
                        </div>
                    @endrole
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">Participant</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Status</th>
                                @role('admin')
                                    <th class="text-center">Action</th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($memberCompetitions as $memberCompetition)
                                <tr>
                                    <td>{{ $memberCompetition->member->user->name }}</td>
                                    <td>{{ $memberCompetition->member->user->email }}</td>
                                    <td>{{ $memberCompetition->competition->title }}</td>
                                    <td>
                                        @if ($memberCompetition->status == 'processed')
                                            <span class="badge bg-warning">Processed</span>
                                        @elseif ($memberCompetition->status == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    @role('admin')
                                        <td class="d-flex justify-content-center align-items-center gap-3">
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('member-competitions.edit', ['member_competition' => $memberCompetition->id]) }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form
                                                action="{{ route('member-competitions.destroy', ['member_competition' => $memberCompetition->id]) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endrole
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
