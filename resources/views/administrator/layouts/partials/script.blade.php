<!-- Jquery -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Datatable -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables/datatables.min.js')}}"></script>
<!-- feather -->
<script src="{{ asset('assets/js/feather.min.js')}}"></script>
{{-- <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/plugins/apexchart/chart-data.js')}}"></script> --}}
<!-- Flatpickr -->
{{-- <script src="{{ asset('assets/dist/flatpickr/flatpickr.min.js')}}"></script> --}}
<!-- Ckeditor -->
{{-- <script src="{{ asset('assets/js/ckeditor.js')}}"></script> --}}
<!-- Sweetalert -->
{{-- <script src="{{ asset('assets/dist/sweetalert2/js/sweetalert2.all.min.js')}}"></script> --}}
<!-- Apexcharts -->
<script src="{{ asset('assets/js/apexcharts.min.js')}}"></script>
<!-- Dropify -->
<script src="{{ asset('assets/dist/dropify/js/dropify.min.js')}}"></script>
<!-- Filepond -->
<script src="{{ asset('assets/dist/filepond/js/filepond.js')}}"></script>

<!-- main js -->
<script src="{{ asset('assets/js/script.js')}}"></script>



{{-- <div class="mb-3">
    <div class="card text-center border card-file-upload" id="file_upload_card">
        <div class="card-body text-center" id="image_preview_container">
            <!-- Preview images will be added here -->
        </div>
        <div class="file-upload-label"  id="file_upload_label">
            <i class="fas fa-upload"></i>
            <p>Drag or click to add photos</p>
        </div>
    </div>

    <input type="file" class="form-control" id="file_upload" name="file_upload" accept="image/*" style="display: none;"/>
</div> --}}

{{--
@push('styles')
    <style>
    .card-file-upload {
        cursor: pointer;
    }
    #file_upload_card {
        position: relative;
        width: 100%;
        min-height: 200px;
        border: 1px solid #ccc;
        transition: min-height 0.3s, box-shadow 0.3s;
        transition: height 0.3s;
    }

    #file_upload_card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* #image_preview_container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
    } */

    .file-upload-label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        cursor: pointer;
    }

    .file-upload-label i {
        font-size: 24px;
    }

    .file-upload-label p {
        margin-top: 5px;
    }

    .preview-image {
        max-width: 100%;
        max-height: 200px;
        padding: 10px;
    }


    </style>
@endpush

@push('scripts')

<script>

document.addEventListener("DOMContentLoaded", function() {
    const fileUploadCard = document.getElementById('file_upload_card');
    const fileInput = document.getElementById('file_upload');
    const imagePreviewContainer = document.getElementById('image_preview_container');
    let isMultiple = fileInput.hasAttribute('multiple'); // Cek apakah mode multiple aktif
    const fileUploadLabel = document.getElementById('file_upload_label');

    fileUploadCard.addEventListener('click', function() {
        fileInput.click();
    });

    fileInput.addEventListener('change', function() {
        const files = this.files;
        let maxHeight = 0;

        // Hapus foto lama jika tidak dalam mode multiple
        if (!isMultiple) {
            while (imagePreviewContainer.firstChild) {
                imagePreviewContainer.removeChild(imagePreviewContainer.firstChild);
            }
        }

        if (this.files.length > 0) {
            fileUploadLabel.style.display = 'none'; // Sembunyikan label jika ada file yang dipilih
        } else {
            fileUploadLabel.style.display = 'block'; // Tampilkan label jika tidak ada file yang dipilih
        }

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const image = new Image();
                image.onload = function() {
                    // Update maxHeight
                    maxHeight = Math.max(maxHeight, image.height);

                    // Append image to container
                    image.classList.add('preview-image');
                    imagePreviewContainer.appendChild(image);

                    // Adjust container's min-height
                    fileUploadCard.style.minHeight = maxHeight + 'px';
                };
                image.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });
});



</script>

@endpush --}}
