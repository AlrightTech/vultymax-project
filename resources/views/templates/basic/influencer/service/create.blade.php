@extends($activeTemplate . 'layouts.master')
@section('content')

    <div class="container-fluid d-flex justify-content-end p-0">
        <button class="btn btn--base py-1 px-2" type="button" id="aiGenerateBtn">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.58913 4.54002C8.08747 3.08169 10.1025 3.03752 10.6933 4.40752L10.7433 4.54085L11.4158 6.50752C11.5699 6.95855 11.819 7.37128 12.1462 7.71787C12.4733 8.06447 12.8711 8.33686 13.3125 8.51669L13.4933 8.58419L15.46 9.25585C16.9183 9.75419 16.9625 11.7692 15.5933 12.36L15.46 12.41L13.4933 13.0825C13.0421 13.2365 12.6292 13.4855 12.2825 13.8127C11.9357 14.1399 11.6632 14.5377 11.4833 14.9792L11.4158 15.1592L10.7441 17.1267C10.2458 18.585 8.2308 18.6292 7.6408 17.26L7.58913 17.1267L6.91747 15.16C6.76345 14.7088 6.51444 14.2959 6.18725 13.9492C5.86006 13.6025 5.46229 13.3299 5.0208 13.15L4.8408 13.0825L2.87413 12.4109C1.41496 11.9125 1.3708 9.89752 2.7408 9.30752L2.87413 9.25585L4.8408 8.58419C5.29183 8.43007 5.70456 8.18102 6.05115 7.85383C6.39775 7.52664 6.67014 7.12893 6.84997 6.68752L6.91747 6.50752L7.58913 4.54002ZM9.16663 5.07835L8.49497 7.04502C8.26029 7.73277 7.87852 8.36111 7.37625 8.88627C6.87397 9.41143 6.26325 9.82079 5.58663 10.0859L5.3783 10.1617L3.41163 10.8334L5.3783 11.505C6.06605 11.7397 6.69439 12.1215 7.21955 12.6237C7.74471 13.126 8.15407 13.7367 8.41913 14.4134L8.49497 14.6217L9.16663 16.5884L9.8383 14.6217C10.073 13.9339 10.4547 13.3056 10.957 12.7804C11.4593 12.2553 12.07 11.8459 12.7466 11.5809L12.955 11.5059L14.9216 10.8334L12.955 10.1617C12.2672 9.92701 11.6389 9.54524 11.1137 9.04297C10.5886 8.54069 10.1792 7.92998 9.91413 7.25335L9.83913 7.04502L9.16663 5.07835ZM15.8333 1.66669C15.9892 1.66669 16.142 1.71042 16.2743 1.79291C16.4065 1.87541 16.513 1.99336 16.5816 2.13335L16.6216 2.23085L16.9133 3.08585L17.7691 3.37752C17.9254 3.4306 18.0623 3.52887 18.1627 3.65987C18.263 3.79087 18.3222 3.9487 18.3327 4.11337C18.3432 4.27804 18.3046 4.44213 18.2218 4.58484C18.139 4.72756 18.0157 4.84247 17.8675 4.91502L17.7691 4.95502L16.9141 5.24669L16.6225 6.10252C16.5693 6.25871 16.471 6.3956 16.3399 6.49585C16.2089 6.59609 16.051 6.65518 15.8863 6.66562C15.7217 6.67606 15.5576 6.63739 15.415 6.5545C15.2723 6.47161 15.1574 6.34824 15.085 6.20002L15.045 6.10252L14.7533 5.24752L13.8975 4.95585C13.7412 4.90277 13.6043 4.80451 13.5039 4.67351C13.4036 4.54251 13.3444 4.38467 13.3339 4.22C13.3234 4.05533 13.362 3.89124 13.4448 3.74853C13.5276 3.60582 13.6509 3.4909 13.7991 3.41835L13.8975 3.37835L14.7525 3.08669L15.0441 2.23085C15.1003 2.06621 15.2066 1.92328 15.3482 1.8221C15.4897 1.72093 15.6593 1.66658 15.8333 1.66669Z"
                    fill="white" />
            </svg>

            Ai Generated
        </button>
    </div>

    <div class="card custom--card mt-3">
        <div class="card-body">
            <form action="{{ route('influencer.service.store', @$service->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- image -->
                    <div class="col-lg-4">
                        <label class="form-label create-influencers-labels" for="title">@lang('Image')<span
                                class="text--danger">*</span></label>
                        <div class="profile-thumb p-0 text-center shadow-none">
                            <div class="thumb">
                                <img id="upload-img"
                                    src="{{ getImage(getFilePath('service') . '/' . @$service->image, getFileSize('service')) }}"
                                    alt="userProfile">
                                <label class="badge badge--icon badge--fill-base badge-fill-red update-thumb-icon"
                                    for="update-photo"><i class="las la-pen"></i></label>
                            </div>
                            <div class="profile__info">
                                <input class="form-control d-none" id="update-photo" name="image" type="file"
                                    accept=".png, .jpg, .jpeg" @if (!@$service) required @endif>
                            </div>
                        </div>
                        <small class="text--warning">@lang('Supported files'): @lang('jpeg'), @lang('jpg'),
                            @lang('png').
                            @lang('| Will be resized to'): {{ getFileSize('service') }}@lang('px').</small>
                    </div>
                    @php
                        if (@$service) {
                            $categoryId = $service->category_id;
                        } else {
                            $categoryId = old('category_id');
                        }
                    @endphp

                    <!-- Category -->
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label class="form-label create-influencers-labels" for="category_id">@lang('Category')</label>
                            <select class="form-select form--control select2" id="category_id" name="category_id" required>
                                <option value="" selected disabled>@lang('Select category')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($categoryId == $category->id) selected="selected" @endif>
                                        {{ __($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label create-influencers-labels">@lang('Title')</label>
                            <input class="form-control form--control" name="title" type="text"
                                value="@if (@$service) {{ @$service->title }}@else{{ old('title') }} @endif"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="form-label create-influencers-labels">@lang('Price')</label>
                            <div class="input-group">
                                <input class="form-control form--control" name="price" type="number"
                                    value="@if (@$service) {{ getAmount(@$service->price) }}@else{{ old('price') }} @endif"
                                    step="any" required>
                                <span class="input-group-text">{{ __(gs('cur_text')) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $selectedTag = [];

                    if (@$service->tags) {
                        foreach (@$service->tags as $t) {
                            array_push($selectedTag, $t->name);
                        }
                    }
                @endphp

                <!-- Service Tags -->
                <div class="form-group skill-body">
                    <label class="form-label create-influencers-labels">@lang('Service Tags')</label>
                    <select class="form-control form--control select2-auto-tokenize" multiple="multiple" name="tags[]"
                        id="tags" required>
                        @foreach (@$tags as $tag)
                            <option value="{{ @$tag->name }}"
                                {{ in_array($tag->name, $selectedTag) ? 'selected' : '' }}>
                                {{ __(@$tag->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label class="form-label required create-influencers-labels">@lang('Description')</label>
                    <textarea class="form-control form--control" name="description" rows="6" cols="12">

{{ old('description', @$service->description) }}

</textarea>
                </div>

                <!-- Key Points -->
                <div class="content w-100 ps-0">
                    <div class="d-flex justify-content-between align-items-end mb-3">
                        <div class="form-label mb-0 create-influencers-labels">
                            <p>@lang('Key Points')<span class="text--danger">*</span></p>
                        </div>
                        <button class="btn btn--outline-custom btn--sm pointBtn" type="button">
                            <i class="las la-plus"></i>@lang('Add More')
                        </button>
                    </div>
                </div>

                @if (@$service->key_points)
                    @foreach (@$service->key_points as $point)
                        <div class="key-point d-flex mb-3 gap-2">
                            <input class="form-control form--control" name="key_points[]" type="text"
                                value="{{ __($point) }}" required>
                            <button
                                class="btn btn--danger remove-button @if ($loop->first) disabled @endif border-0"
                                type="button"><i class="fas fa-times"></i></button>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex mb-3 gap-2">
                        <input class="form-control form--control" name="key_points[]" type="text" required>
                        <button class="btn btn--danger disabled border-0" type="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif
                <div id="more-keyPoint">

                </div>


                <!-- Description -->
                <div class="form-group">
                    <label class="form-label create-influencers-labels">@lang('Description')</label>
                    <div class="input-images rounded-2"></div>
                </div>


                <button class="btn btn--base w-100 mt-3" type="submit">@lang('Submit')</button>
        </div>
        </form>
    </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="sponseeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aiModalLabel">Create Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Input fields -->
                    <div class="mb-3">
                        {{-- <label for="ai_description_gen" class="form-label">Description:</label> --}}
                        <textarea class="form-control" name="ai_description_gen" id="ai_description_gen" cols="30" rows="10"
                            placeholder="Enter description here..."></textarea>
                    </div>
                    <!-- Generate Button -->
                    <button id="generateBtn" class="btn btn-danger d-block w-100">Generate</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('style')
    <style>
        .badge.badge--icon {
            border-radius: 5px 0 0 0;
        }
    </style>
@endpush
@push('style-lib')
    <link href="{{ asset($activeTemplateTrue . 'css/lib/image-uploader.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('script-lib')
    <script src="{{ asset($activeTemplateTrue . 'js/lib/image-uploader.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/select2.min.js') }}"></script>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";
            const inputField = document.querySelector('#update-photo'),
                uploadImg = document.querySelector('#upload-img');
            inputField.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        const result = reader.result;
                        uploadImg.src = result;
                    }
                    reader.readAsDataURL(file);
                }
            });


            @if (isset($images))
                let preloaded = @json($images);
            @else
                let preloaded = [];
            @endif

            $('.input-images').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'images',
                preloadedInputName: 'old',
                maxSize: 2 * 1024 * 1024,
            });

            $('.pointBtn').on('click', function() {
                var html = `
                <div class="key-point d-flex gap-2 mb-3">
                    <input type="text" class="form-control form--control" name="key_points[]" required>
                    <button class="btn btn--danger remove-button border-0" type="button"><i class="fas fa-times"></i></button>
                </div>`;
                $('#more-keyPoint').append(html);
            });

            $(document).on('click', '.remove-button', function() {
                $(this).closest('.key-point').remove();
            });

        })(jQuery);
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // let nicEditorInstance = new nicEditor({fullPanel : true}).panelInstance('description',{hasPanel : true});
            // 

            // Get elements
            const aiGenerateBtn = document.getElementById("aiGenerateBtn");
            const generateBtn = document.getElementById("generateBtn");
            const modal = new bootstrap.Modal(document.getElementById('sponseeModal')); // Initialize modal

            // Function to fetch AI-generated data
            function generateSponseeData() {
                let ai_description_gen = document.getElementById("ai_description_gen").value;
                if (ai_description_gen == "" || ai_description_gen == null) {
                    alert("please fill the description field");
                }
                fetch('/api/generateService', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            description: ai_description_gen
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        data = JSON.parse(data);
                        // Populate the modal's input fields with the response data

                        // Populate the input fields (assuming title and description are plain text fields)
                        document.getElementById("title").value = data["title"];
                        document.getElementById("description").value = data["description"];

                        // Select the category_id (set the value of the category dropdown)
                        $("#category_id").val(data["category_id"]).trigger(
                            "change"); // Trigger change to update Select2

                        // Populate the tags select field (for Select2 with multiple tags)
                        var selectedTags = data["tags"];

                        // Add tags dynamically if they don't exist in the dropdown yet
                        selectedTags.forEach(function(tag) {
                            console.log(tag);
                            // Check if the tag already exists in the options
                            if (!$('#tags option[value="' + tag + '"]').length) {
                                var newOption = new Option(tag, tag, false,
                                true); // Add new option (select it)
                                $('#tags').append(newOption).trigger(
                                'change'); // Append the new option and trigger change
                            }
                        });

                        // Now select the tags
                        $('#tags').val(selectedTags).trigger(
                        "change"); // nicEditorInstance.nicInstances[0].setContent(data["Description"]);
                        // document.getElementById("description").value = ;
                        modal.hide();
                    })
                    .catch(error => {
                        alert("something went wrong");
                        console.error('Error fetching AI data:', error);
                    });
            }

            // Show modal when AI Generate button is clicked
            aiGenerateBtn.addEventListener('click', function() {
                modal.show(); // Show modal
            });

            // Call the API to generate data when the Generate button is clicked in the modal
            generateBtn.addEventListener('click', function() {
                generateSponseeData(); // Fetch AI-generated data
            });
        });
    </script>
@endpush
