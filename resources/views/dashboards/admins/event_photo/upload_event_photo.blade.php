@extends('layouts.admin')
@section('admin_content')
<section class="content">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-family: 'Times New Roman'">OROMIA MICROFINANCE</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">OMF</a></li>
                            <li class="breadcrumb-item active">Events photo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-4">
                        <h3 class="card-title">Event photo uploding</h3>
                      </div>
                      <div class="col-md-6">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                      </div>
                  </div>
                </div>
                <form method="POST" action="{{ route('admin.event_photo_uploading') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="event_description">Event description</label>
                        <textarea id="event_description" type="text" value="{{ old('event_description') }}"class="form-control @error('event_description') is-invalid @enderror" name="event_description" required style="width: 90%;" autocomplete="event_description" cols="50" rows="5" placeholder="Enter event discription here...."></textarea>
                        <div class="invalid-feedback">
                            Valid input required.
                        </div>
                        @error('event_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="event_photo">Choose
                            photo</label>
                        <input type="file" class="form-control @error('event_photo') is-invalid @enderror" name="event_photo" id="event_photo" value="{{ old('event_photo') }}" style="width: 40%; height: 8.5%;" required>
                        <div class="invalid-feedback">
                            Valid input required.
                        </div>
                        @error('event_photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Upload</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
 <div class="row">
     <div class="col-md-1"></div>
     <div class="col-md-10">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Event photos</h3>
            </div>
            <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>Event description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($event_photos as $event_photo )
                        <tr>
                            <td><img src="{{ asset('uploads/event_photo/'.$event_photo->event_photo) }}" alt="event photo" width="60px" height="60px"></td>
                            <td>{{ $event_photo->event_description }}</td>
                            <td class="text-center">
                                <a target="button" href="{{ url('admin/edit_branch/' . $event_photo->id) }}" class="btn btn-sm btn-success">
                                    <p class="fa fa-edit"></p>Edit
                                </a>
                                <form action="{{ url('admin/delete_event_photo/' . $event_photo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this event photo?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger bt-sm"><i class="far fa-trash-alt"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
     </div>
     <div class="col-md-1"></div>
 </div>

 @endsection
