@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Inputs</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('competitions.update', ['competition' => $competition->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" value="{{ old('title', $competition->title) }}"
                                    name="title" id="title">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" placeholder="Enter description" name="description">{{ old('description', $competition->description) }}</textarea>
                                <p><small class="text-muted">Find helper text here for given textbox.</small></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control"
                                    value="{{ old('start_date', $competition->start_date) }}" id="start_date"
                                    name="start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" id="end_date"
                                    value="{{ old('end_date', $competition->end_date) }}" name="end_date">
                            </div>
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
        </div>
    </section>
@endsection
