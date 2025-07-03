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
                                <a href="{{ route('competitions.create') }}" class="btn btn-primary mb-3">Create</a>
                            </div>
                        </div>
                    @endrole
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">End Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($competitions as $competition)
                                <tr>
                                    <td>{{ $competition->title }}</td>
                                    <td>{{ $competition->description }}</td>
                                    <td>{{ $competition->start_date }}</td>
                                    <td>{{ $competition->end_date }}</td>
                                    <td class="d-flex align-items-center justify-content-center gap-3">
                                        @role('admin')
                                            <a href="{{ route('competitions.edit', ['competition' => $competition->id]) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form
                                                action="{{ route('competitions.destroy', ['competition' => $competition->id]) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        @endrole
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('competitions.show', ['competition' => $competition->id]) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

    </div>
@endsection
