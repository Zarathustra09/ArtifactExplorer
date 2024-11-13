@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 d-flex align-items-center">
                <h1 id="gallery-name">{{ $gallery->name }}</h1>
                <i class="fas fa-pencil-alt ms-3" style="cursor: pointer;" onclick="editGalleryName()"></i>
                <a href="{{ route('gallery.index') }}" class="btn btn-secondary ms-auto">Back to Galleries</a>
            </div>
        </div>
        <div class="row">
            @if($gallery->images->isEmpty())
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        No images available in this gallery.
                    </div>
                </div>
            @else
                @foreach($gallery->images as $image)
                    <div class="col-md-4 position-relative">
                        <div class="card mb-4">
                            <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="Image">
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
                @endforeach
            @endif
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <form action="{{ route('gallery.image.store', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="upload_img" class="d-flex align-items-center justify-content-center" style="width: 200px; height: 200px; border: 2px dashed #ccc; cursor: pointer;">
                        <i class="fas fa-plus fa-3x"></i>
                    </label>
                    <input type="file" id="upload_img" name="upload_img" class="d-none" onchange="this.form.submit()">
                </form>
            </div>
        </div>
    </div>
        <script>
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
                            return response.text(); // Expecting HTML response
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
                        location.reload(); // Reload the page to reflect changes
                    });
                }
            });
        }
    </script>

@endsection
