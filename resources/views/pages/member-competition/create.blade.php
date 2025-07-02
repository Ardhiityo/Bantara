@extends('layouts.index')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Inputs</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('member-competitions.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Anggota</h6>
                            <fieldset class="form-group">
                                <select name="member_id" class="form-select" id="basicSelect">
                                    <option value="">Choose...</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}"
                                            {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                            {{ $member->user->name }} - {{ $member->user->email }}
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
                                            {{ old('competition_id') == $competition->id ? 'selected' : '' }}>
                                            {{ $competition->title }}
                                        </option>
                                    @endforeach
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
@endsection
