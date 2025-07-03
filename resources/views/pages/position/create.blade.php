@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Inputs</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('positions.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Position</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Enter position">
                                <p>
                                    <small class="text-muted">Min 3 character.</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-4">
                            <button class=" btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
