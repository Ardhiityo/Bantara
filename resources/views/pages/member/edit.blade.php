@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Input</h3>
                    <p class="text-subtitle text-muted">Manage and update member information using styled input fields with
                        realtime validation and accessible controls.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Members</a></li>
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
                    <form action="{{ route('members.update', ['member' => $member->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input name="name" type="text" class="form-control"
                                        value="{{ old('name', $member->user->name) }}" id="name"
                                        placeholder="Enter name">
                                    <p>
                                        <small class="text-muted">Min 3 character.</small>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" class="form-control"
                                        value="{{ old('email', $member->user->email) }}" id="email"
                                        placeholder="Enter email">
                                    <p>
                                        <small class="text-muted">Email format.</small>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="text" id="password" class="form-control"
                                        placeholder="Enter password">
                                    <p>
                                        <small class="text-muted">Min 8 character.</small>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input name="phone" type="text" class="form-control" id="phone"
                                        value="{{ old('phone', $member->phone) }}" placeholder="08xxx">
                                    <p>
                                        <small class="text-muted">Min 10 digits.</small>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h6>Position</h6>
                                <fieldset class="form-group">
                                    <select name="position_id" class="form-select">
                                        <option value="">Choose...</option>
                                        @foreach ($positions as $position)
                                            <option value="{{ $position->id }}"
                                                {{ old('position_id', $member->position_id ?? '') == $position->id ? 'selected' : '' }}>
                                                {{ $position->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <h6>Verification</h6>
                                <fieldset class="form-group">
                                    <select name="is_verified" class="form-select">
                                        <option value="">Choose...</option>
                                        <option value="1"
                                            {{ old('is_verified', $member->is_verified) == 1 ? 'selected' : '' }}>
                                            Approved
                                        </option>
                                        <option value="0"
                                            {{ old('is_verified', $member->is_verified) == 0 ? 'selected' : '' }}>
                                            Rejected
                                        </option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-4">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
