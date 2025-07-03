@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <h3>Statistics</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="fa-solid fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Anggota</h6>
                                        <h6 class="font-extrabold mb-0">{{ $memberCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Jabatan</h6>
                                        <h6 class="font-extrabold mb-0">{{ $positionCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="fa-solid fa-trophy"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Kompetisi</h6>
                                        <h6 class="font-extrabold mb-0">{{ $competitionCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="fa-solid fa-list"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Pendaftar</h6>
                                        <h6 class="font-extrabold mb-0">{{ $memberCompetitionCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Profile Visit</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <a href="{{ route('profile.edit') }}">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('assets/compiled/jpg/1.jpg') }}" alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">{{ ucfirst(Str::limit(Auth::user()->name, 5, '...')) }}</h5>
                                    <h6 class="text-muted mb-0">{{ Str::limit(Auth::user()->email, 10, '...') }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Competitions</h4>
                    </div>
                    <div class="card-content pb-4">
                        @forelse ($memberCompetitions as $memberCompetition)
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <img src="{{ asset('assets/compiled/jpg/7.jpg') }}">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">{{ $memberCompetition->member->user->name }}</h5>
                                    <h6 class="text-muted mb-0">{{ $memberCompetition->competition->name }}</h6>
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                <h6 class="text-muted">No data available...</h6>
                            </div>
                        @endforelse
                        <div class="px-4">
                            <a href="{{ route('member-competitions.index') }}"
                                class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
