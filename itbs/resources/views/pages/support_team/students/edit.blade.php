@extends('layouts.master')
@section('page_title', 'Edit Student')
@section('content')

        <div class="card">
            <div class="card-header bg-white header-elements-inline">
                <h6 id="ajax-title" class="card-title">Please fill The form Below To Edit record of {{ $sr->user->name }}</h6>

                {!! Qs::getPanelOptions() !!}
            </div>

            <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-update" data-reload="#ajax-title" action="{{ route('students.update', Qs::hash($sr->id)) }}" data-fouc>
                @csrf @method('PUT')
                <h6>Personal data</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name: <span class="text-danger">*</span></label>
                                <input value="{{ $sr->user->name }}" required type="text" name="name" placeholder="Full Name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address: <span class="text-danger">*</span></label>
                                <input value="{{ $sr->user->address }}" class="form-control" placeholder="Address" name="address" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email address: <span class="text-danger">*</span></label>
                                <input value="{{ $sr->user->email  }}" type="email" name="email" class="form-control" placeholder="your@email.com">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Gender: <span class="text-danger">*</span></label>
                                <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option {{ ($sr->user->gender  == 'Male' ? 'selected' : '') }} value="Male">Male</option>
                                    <option {{ ($sr->user->gender  == 'Female' ? 'selected' : '') }} value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Phone:</label>
                                <input value="{{ $sr->user->phone  }}" type="text" name="phone" class="form-control" placeholder="" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Telephone:</label>
                                <input value="{{ $sr->user->phone2  }}" type="text" name="phone2" class="form-control" placeholder="" >
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Date of Birth:</label>
                                <input name="dob" value="{{ $sr->user->dob  }}" type="text" class="form-control date-pick" placeholder="Select Date...">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nal_id">Nationality: <span class="text-danger">*</span></label>
                                <select data-placeholder="Choose..." required name="nal_id" id="nal_id" class="select-search form-control">
                                    <option value=""></option>
                                    @foreach($nationals as $na)
                                        <option {{  ($sr->user->nal_id  == $na->id ? 'selected' : '') }} value="{{ $na->id }}">{{ $na->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="d-block">Upload Passport Photo:</label>
                                <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                            </div>
                        </div>
                    </div>

                </fieldset>

                <h6>Student Data</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_class_id">Class: </label>
                                <select onchange="getClassSections(this.value)" name="my_class_id" required id="my_class_id" class="form-control select-search" data-placeholder="Select Class">
                                    <option value=""></option>
                                    @foreach($my_classes as $c)
                                        <option {{ $sr->my_class_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id">Section: </label>
                                <select name="section_id" required id="section_id" class="form-control select" data-placeholder="Select Section">
                                    <option value="{{ $sr->section_id }}">{{ $sr->section->name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_parent_id">Parent: </label>
                                <select data-placeholder="Choose..."  name="my_parent_id" id="my_parent_id" class="select-search form-control">
                                    <option  value=""></option>
                                    @foreach($parents as $p)
                                        <option {{ (Qs::hash($sr->parent_id) == Qs::hash($p->id)) ? 'selected' : '' }} value="{{ Qs::hash($p->id) }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </fieldset>

            </form>
        </div>
@endsection
