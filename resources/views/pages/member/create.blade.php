@extends('layouts.index')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Input</h3>
                    <p class="text-subtitle text-muted">Give textual form controls like input upgrade with
                        custom styles,
                        sizing, focus states, and more.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Inputs</h4>
                </div>

                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">Nama</label>
                                    <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                                    <p>
                                        <small class="text-muted">Min 3 character.</small>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="helpInputTop">Email</label>
                                    <input type="text" class="form-control" id="helpInputTop" placeholder="Enter email">
                                    <p>
                                        <small class="text-muted">Email format.</small>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="helperText">Password</label>
                                    <input type="text" id="helperText" class="form-control" placeholder="Enter name">
                                    <p>
                                        <small class="text-muted">Min 8 character.</small>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="disabledInput">Phone</label>
                                    <input type="text" class="form-control" id="disabledInput" placeholder="08xxx">
                                    <p>
                                        <small class="text-muted">Min 10 digits.</small>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <h6>Position</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <option>IT</option>
                                        <option>Blade Runner</option>
                                        <option>Thor Ragnarok</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
