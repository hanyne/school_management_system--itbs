@extends('layouts.master')
@section('page_title', 'Manage Exams')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Exams</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-exams" class="nav-link active" data-toggle="tab">Exam</a></li>
                <!-- Ajouter d'autres onglets ici si nécessaire -->
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-exams">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Term</th>
                                <th>Session</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exams as $ex)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ex->name }}</td>
                                    <td>{{ 'Term '.$ex->term }}</td>
                                    <td>{{ $ex->year }}</td>
                                    <td class="text-center">
                                        <!-- Ajouter les actions ici -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="new-exam">
                    <form method="post" action="{{ route('exams.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Name of Exam">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="term" class="col-lg-3 col-form-label font-weight-semibold">Term</label>
                            <div class="col-lg-9">
                                <select data-placeholder="Select Term" class="form-control select-search" name="term" id="term">
                                    <option {{ old('term') == 1 ? 'selected' : '' }} value="1">First Term</option>
                                    <option {{ old('term') == 2 ? 'selected' : '' }} value="2">Second Term</option>
                                    <option {{ old('term') == 3 ? 'selected' : '' }} value="3">Third Term</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Other contents of the page here --}}

@endsection
