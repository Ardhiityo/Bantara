@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Input</h3>
                    <p class="text-subtitle text-muted">Manage and update registration information using styled input fields
                        with
                        realtime validation and accessible controls.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Registrations</a></li>
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
                    <form
                        action="{{ route('member-competitions.update', ['member_competition' => $memberCompetition->id]) }}"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Anggota</h6>
                                <fieldset class="form-group">
                                    <select name="member_id" class="form-select" id="basicSelect">
                                        <option value="">Choose...</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->member->id }}"
                                                {{ old('member_id', $memberCompetition->member_id) == $user->member->id ? 'selected' : '' }}>
                                                {{ $user->name }} - {{ $user->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <h6>Competition</h6>
                                <fieldset class="form-group">
                                    <select name="competition_id" class="form-select" id="basicSelect">
                                        <option value="">Choose...</option>
                                        @foreach ($competitions as $competition)
                                            <option value="{{ $competition->id }}"
                                                {{ old('competition_id', $memberCompetition->competition_id) == $competition->id ? 'selected' : '' }}>
                                                {{ $competition->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <h6>Status</h6>
                                <fieldset class="form-group">
                                    <select name="status" class="form-select" id="basicSelect">
                                        <option value="">Choose...</option>
                                        <option value="processed"
                                            {{ old('status', $memberCompetition->status) == 'processed' ? 'selected' : '' }}>
                                            Processed
                                        </option>
                                        <option value="approved"
                                            {{ old('status', $memberCompetition->status) == 'approved' ? 'selected' : '' }}>
                                            Approved
                                        </option>
                                        <option value="rejected"
                                            {{ old('status', $memberCompetition->status) == 'rejected' ? 'selected' : '' }}>
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
