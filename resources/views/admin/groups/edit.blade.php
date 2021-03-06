@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
         <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                    <!--<li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Slider Banners</a></li>-->
                </ul>
            </div>
        </div>
         <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                    <form action="{{ route('admin.groups.update') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                     <h3 class="tile-title">Group Information</h3>
                    <hr>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetGroup->title) }}"/>
                            <input type="hidden" name="id" value="{{ $targetGroup->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea class="form-control" rows="4" name="description" id="description">{{ old('description', $targetGroup->description) }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="featured" name="featured"
                                    {{ $targetGroup->featured == 1 ? 'checked' : '' }}
                                    />Featured Group
                                </label>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ( $targetGroup->getFirstMediaUrl('image') != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ $targetGroup->getFirstMediaUrl('image') }}" id="groupImage" class="img-fluid" alt="img">
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label class="control-label">Group Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                    @error('image') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ( $targetGroup->getFirstMediaUrl('bgImage') != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ $targetGroup->getFirstMediaUrl('bgImage') }}" id="groupImage" class="img-fluid" alt="img">
                                        </figure>
                                   @endif
                                </div>
                                <div class="col-md-10">
                                    <label class="control-label">Group Background</label>
                                    <input class="form-control @error('background') is-invalid @enderror" type="file" id="image" name="background"/>
                                    @error('background') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Group</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.groups.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
             </div>
                </div>




            <!--    <div class="tab-pane" id="images">-->
            <!--        <div class="tile">-->
            <!--            <h3 class="tile-title">Upload Image</h3>-->
            <!--            <hr>-->
            <!--            <div class="tile-body">-->
            <!--                <div class="row">-->
            <!--                    <div class="col-md-12">-->
            <!--                        <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">-->
            <!--                            <input type="hidden" name="group_id" value="{{ $targetGroup->id }}">-->
            <!--                            {{ csrf_field() }}-->
            <!--                        </form>-->
            <!--                    </div-->
            <!--                </div>-->
            <!--                <div class="row d-print-none mt-2">-->
            <!--                    <div class="col-12 text-right">-->
            <!--                        <button class="btn btn-success" type="button" id="uploadButton">-->
            <!--                            <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images-->
            <!--                        </button>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                @if ($targetGroup->banners)-->
            <!--                    <hr>-->
            <!--                    <div class="row">-->
            <!--                        @foreach($targetGroup->banners as $banner)-->
            <!--                            <div class="col-md-3">-->
            <!--                                <div class="card">-->
            <!--                                    <div class="card-body">-->
            <!--                                        <img src="{{ asset('storage/'.$banner->banner) }}" id="brandLogo" class="img-fluid" alt="img">-->
            <!--                                        <a class="card-link float-right text-danger" href="{{ route('admin.groups.banners.delete', $banner->id) }}">-->
            <!--                                            <i class="fa fa-fw fa-lg fa-trash"></i>-->
            <!--                                        </a>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        @endforeach-->
            <!--                    </div>-->
            <!--                @endif-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->

            <!--</div>-->
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;

        $( document ).ready(function() {
            $('#groups').select2();

            let myDropzone = new Dropzone("#dropzone", {
                paramName: "banner",
                addRemoveLinks: false,
                maxFilesize: 4,
                parallelUploads: 2,
                uploadMultiple: false,
                url: "{{ route('admin.groups.banners.upload') }}",
                autoProcessQueue: false,
            });
            myDropzone.on("queuecomplete", function (file) {
                //window.location.reload();
                showNotification('Completed', 'All Group uploaded', 'success', 'fa-check');
            });
            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {
                    myDropzone.processQueue();
                }
            });
            function showNotification(title, message, type, icon)
            {
                $.notify({
                    title: title + ' : ',
                    message: message,
                    icon: 'fa ' + icon
                },{
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                });
            }
        });
    </script>
@endpush
