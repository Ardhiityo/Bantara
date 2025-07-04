@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>DataTable</h3>
                    <p class="text-subtitle text-muted">A dynamic position table with search, sorting, and pagination no
                        extra dependencies required.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Positions</a></li>
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
                        Positions
                    </h5>
                </div>
                <div class="card-body">
                    @role('admin')
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">Create</a>
                            </div>
                        </div>
                    @endrole
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">Position</th>
                                @role('admin')
                                    <th class="text-center">Action</th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($positions as $position)
                                <tr>
                                    <td>{{ $position->name }}</td>
                                    @role('admin')
                                        <td>
                                            <div class="d-flex justify-content-center gap-3">
                                                <a href="{{ route('positions.edit', ['position' => $position->id]) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('positions.destroy', ['position' => $position->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
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
