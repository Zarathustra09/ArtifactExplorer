@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Gallery Header -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 id="gallery-name" class="display-4">{{ $gallery->name }}</h1>
                <div>
                    <i class="fas fa-pencil-alt ms-3 text-muted" style="cursor: pointer;" onclick="editGalleryName()"></i>
                    <a href="{{ route('gallery.index') }}" class="btn btn-outline-primary ms-3">Back to Galleries</a>
                </div>
            </div>
        </div>

        <!-- Gallery Description -->
        <div class="row mb-5">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <p id="gallery-description" class="lead text-muted">{{ $gallery->description }}</p>
                <i class="fas fa-pencil-alt ms-3 text-muted" style="cursor: pointer;" onclick="editGalleryDescription()"></i>
            </div>
        </div>

        <!-- Gallery Images -->
        <div class="row">
            @if($gallery->images->isEmpty())
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        No images available in this gallery.
                    </div>
                </div>
            @else
                @foreach($gallery->images as $image)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card shadow-sm border-light rounded">
                            <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="Image" style="height: 200px; object-fit: cover;">
                            <div class="card-body position-relative">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <form action="{{ route('gallery.image.edit', $image->id) }}" method="POST" enctype="multipart/form-data" class="d-inline">
                                        @csrf
                                        <label for="edit_img_{{ $image->id }}" class="text-primary me-2" style="cursor: pointer;">
                                            <i class="fas fa-pencil-alt"></i>
                                        </label>
                                        <input type="file" id="edit_img_{{ $image->id }}" name="upload_img" class="d-none" onchange="this.form.submit()">
                                    </form>
                                    <form action="{{ route('gallery.image.destroy', $image->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- Upload New Image -->
            <div class="col-md-4 col-lg-3 mb-4 d-flex justify-content-center align-items-center">
                <form action="{{ route('gallery.image.store', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="w-100">
                    @csrf
                    <label for="upload_img" class="d-flex align-items-center justify-content-center" style="width: 200px; height: 200px; border: 2px dashed #ccc; cursor: pointer; border-radius: 10px;">
                        <i class="fas fa-plus fa-3x text-muted"></i>
                    </label>
                    <input type="file" id="upload_img" name="upload_img" class="d-none" onchange="this.form.submit()">
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Edit Gallery Name Function
        function editGalleryName() {
            Swal.fire({
                title: 'Edit Gallery Name',
                input: 'text',
                inputLabel: 'New Gallery Name',
                inputValue: document.getElementById('gallery-name').innerText,
                showCancelButton: true,
                confirmButtonText: 'Save',
                showLoaderOnConfirm: true,
                preConfirm: (newName) => {
                    return fetch('{{ route('gallery.update', $gallery->id) }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ gallery_name: newName, _method: 'PUT' })
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText);
                            }
                            return response.text();
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            );
                        });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Gallery name updated successfully.',
                        icon: 'success'
                    }).then(() => {
                        location.reload();
                    });
                }
            });
        }

        // Edit Gallery Description Function
        function editGalleryDescription() {
            Swal.fire({
                title: 'Edit Gallery Description',
                input: 'textarea',
                inputLabel: 'New Gallery Description',
                inputValue: document.getElementById('gallery-description').innerText,
                showCancelButton: true,
                confirmButtonText: 'Save',
                showLoaderOnConfirm: true,
                preConfirm: (newDescription) => {
                    return fetch('{{ route('gallery.update', $gallery->id) }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ description: newDescription, _method: 'PUT' })
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText);
                            }
                            return response.text();
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            );
                        });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Gallery description updated successfully.',
                        icon: 'success'
                    }).then(() => {
                        location.reload();
                    });
                }
            });
        }
    </script>
@endsection
