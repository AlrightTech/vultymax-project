@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <div class="pt-80 pb-80">
        <div class="container">
            <div class="card custom--card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title text-start d-inline">
                        @lang('Sponsee Name') :
                        {{ __($influencer->fullname) }}
                    </h4>
                    <button class="btn btn--base py-1 px-2" type="button" id="aiGenerateBtn">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.58913 4.54002C8.08747 3.08169 10.1025 3.03752 10.6933 4.40752L10.7433 4.54085L11.4158 6.50752C11.5699 6.95855 11.819 7.37128 12.1462 7.71787C12.4733 8.06447 12.8711 8.33686 13.3125 8.51669L13.4933 8.58419L15.46 9.25585C16.9183 9.75419 16.9625 11.7692 15.5933 12.36L15.46 12.41L13.4933 13.0825C13.0421 13.2365 12.6292 13.4855 12.2825 13.8127C11.9357 14.1399 11.6632 14.5377 11.4833 14.9792L11.4158 15.1592L10.7441 17.1267C10.2458 18.585 8.2308 18.6292 7.6408 17.26L7.58913 17.1267L6.91747 15.16C6.76345 14.7088 6.51444 14.2959 6.18725 13.9492C5.86006 13.6025 5.46229 13.3299 5.0208 13.15L4.8408 13.0825L2.87413 12.4109C1.41496 11.9125 1.3708 9.89752 2.7408 9.30752L2.87413 9.25585L4.8408 8.58419C5.29183 8.43007 5.70456 8.18102 6.05115 7.85383C6.39775 7.52664 6.67014 7.12893 6.84997 6.68752L6.91747 6.50752L7.58913 4.54002ZM9.16663 5.07835L8.49497 7.04502C8.26029 7.73277 7.87852 8.36111 7.37625 8.88627C6.87397 9.41143 6.26325 9.82079 5.58663 10.0859L5.3783 10.1617L3.41163 10.8334L5.3783 11.505C6.06605 11.7397 6.69439 12.1215 7.21955 12.6237C7.74471 13.126 8.15407 13.7367 8.41913 14.4134L8.49497 14.6217L9.16663 16.5884L9.8383 14.6217C10.073 13.9339 10.4547 13.3056 10.957 12.7804C11.4593 12.2553 12.07 11.8459 12.7466 11.5809L12.955 11.5059L14.9216 10.8334L12.955 10.1617C12.2672 9.92701 11.6389 9.54524 11.1137 9.04297C10.5886 8.54069 10.1792 7.92998 9.91413 7.25335L9.83913 7.04502L9.16663 5.07835ZM15.8333 1.66669C15.9892 1.66669 16.142 1.71042 16.2743 1.79291C16.4065 1.87541 16.513 1.99336 16.5816 2.13335L16.6216 2.23085L16.9133 3.08585L17.7691 3.37752C17.9254 3.4306 18.0623 3.52887 18.1627 3.65987C18.263 3.79087 18.3222 3.9487 18.3327 4.11337C18.3432 4.27804 18.3046 4.44213 18.2218 4.58484C18.139 4.72756 18.0157 4.84247 17.8675 4.91502L17.7691 4.95502L16.9141 5.24669L16.6225 6.10252C16.5693 6.25871 16.471 6.3956 16.3399 6.49585C16.2089 6.59609 16.051 6.65518 15.8863 6.66562C15.7217 6.67606 15.5576 6.63739 15.415 6.5545C15.2723 6.47161 15.1574 6.34824 15.085 6.20002L15.045 6.10252L14.7533 5.24752L13.8975 4.95585C13.7412 4.90277 13.6043 4.80451 13.5039 4.67351C13.4036 4.54251 13.3444 4.38467 13.3339 4.22C13.3234 4.05533 13.362 3.89124 13.4448 3.74853C13.5276 3.60582 13.6509 3.4909 13.7991 3.41835L13.8975 3.37835L14.7525 3.08669L15.0441 2.23085C15.1003 2.06621 15.2066 1.92328 15.3482 1.8221C15.4897 1.72093 15.6593 1.66658 15.8333 1.66669Z" fill="white"></path>
                        </svg>
                
                        Ai Generated
                    </button>



                </div>
                <div class="card-body">
                    <form action="{{ route('user.hiring.influencer', $influencer->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Title') </label>
                                    <input type="text" name="title" class="form-control form--control" value="{{ old('title') }}" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Estimated Delivery Date') </label>
                                    <input type="text" class="datepicker-here form-control form--control" data-language='en' data-date-format="yyyy-mm-dd" data-position='bottom left' placeholder="@lang('Select date')" name="delivery_date" autocomplete="off" required>
                                    <small class="text-small"> <i class="la la-info-circle"></i> @lang('Year-Month-Date')</small>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Remuneration')</label>
                                    <div class="input-group">
                                        <input type="number" step="any" class="form-control form--control" name="amount" value="{{ old('amount') }}" required>
                                        <span class="input-group-text">{{ __(gs("cur_text")) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Payment Type')</label>
                                    <select class="form-control form--control form-select" name="payment_type" required>
                                        <option value="" disabled selected>@lang('Select One')</option>
                                        <option value="2">@lang('Direct Payment')</option>
                                        <option value="1">@lang('Deposited Wallet') ({{ showAmount(auth()->user()->balance) }} {{ __(gs("cur_text")) }})</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">@lang('Description')</label>
                                    <textarea rows="4" class="form-control form--control " name="description" id="description" placeholder="@lang('Description')">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn--base w-100">@lang('Submit')</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>









<!-- Modal -->
<div class="modal fade" id="sponseeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aiModalLabel">Generate Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Input fields -->
                <div class="mb-3">
                    {{-- <label for="ai_description_gen" class="form-label">Description:</label> --}}
                    <textarea class="form-control" name="ai_description_gen" id="ai_description_gen" cols="30" rows="10" placeholder="Enter description here..."></textarea>
                </div>
                <!-- Generate Button -->
                <button id="generateBtn" class="btn btn-danger d-block w-100">Generate</button>
            </div>
        </div>
    </div>
</div>






@endsection
@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/global/css/datepicker.min.css') }}">
@endpush
@push('script-lib')
    <script src="{{ asset('assets/global/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/datepicker.en.js') }}"></script>
@endpush
@push('script')
    <script>

        $('.datepicker-here').datepicker({
            changeYear: true,
            changeMonth: true,
            minDate: new Date(),
        });
    </script>




<script>
document.addEventListener('DOMContentLoaded', function() {
    let nicEditorInstance = new nicEditor({fullPanel : true}).panelInstance('description',{hasPanel : true});
     // 

    // Get elements
    const aiGenerateBtn = document.getElementById("aiGenerateBtn");
    const generateBtn = document.getElementById("generateBtn");
    const modal = new bootstrap.Modal(document.getElementById('sponseeModal')); // Initialize modal

    // Function to fetch AI-generated data
    function generateSponseeData() {
        let ai_description_gen = document.getElementById("ai_description_gen").value;
        if(ai_description_gen == "" || ai_description_gen == null){
                alert("please fill the description field");
        }
        fetch('/api/generate_sponsee_ai', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ description: ai_description_gen }),
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
             data= JSON.parse(data);
            // Populate the modal's input fields with the response data
            document.getElementById("title").value = data["Title"];
            nicEditorInstance.nicInstances[0].setContent(data["Description"]);
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
