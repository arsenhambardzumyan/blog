@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Admin')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Edit Admin')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item active"><a href="{{ route('admin.admin.index') }}">{{__('admin.Admin')}}</a></div>
              <div class="breadcrumb-item">{{__('admin.Edit Admin')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.admin.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('admin.Admin')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <form action="{{ route('admin.admin.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('admin.Email')}} <span class="text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control"  name="email" value="{{$admin->email}}" >
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('admin.Password')}} <span class="text-danger">*</span></label>
                                    <input type="password" id="password" class="form-control"  name="password" value="">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option {{ $admin->status == 1 ? 'selected' : '' }} value="1">{{__('admin.Active')}}</option>
                                        <option {{ $admin->status == 0 ? 'selected' : '' }} value="0">{{__('admin.Inactive')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">{{__('admin.Save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>

@endsection
