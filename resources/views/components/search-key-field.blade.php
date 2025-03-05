{{-- @props(['placeholder' => 'Search...', 'btn' => 'btn--primary'])
<div class="input-group w-auto flex-fill">
    <input type="search" name="search" class="form-control bg--white" placeholder="{{ __($placeholder) }}" value="{{ request()->search }}">
    <button class="btn {{ $btn }}" type="submit"><i class="la la-search"></i></button>
</div> --}}
@props(['placeholder' => 'Search...', 'btn' => 'btn--primary'])
<form class="navbar-search position-relative">
    <div class="position-relative">
        <input type="search" name="search" class="form-control bg-white pe-5 border-0 navbar-search-field bg-white" id="searchInput" autocomplete="off"
            placeholder="Search here..." style="border-radius: 12px; height: 42px; width: 265px;">
        <svg viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="position-absolute top-50 translate-middle-y end-0 me-2"
            width="20" height="20">
            <path d="M15.4204 14.3296L12.5646 11.4738C13.1546 10.5845 13.5 9.51969 13.5 8.375C13.5 5.27338 10.9766 2.75 7.875 2.75C4.77338 2.75 2.25 5.27338 2.25 8.375C2.25 11.4766 4.77338 14 7.875 14C9.01969 14 10.0845 13.6546 10.9738 13.0646L13.8296 15.9204C14.2684 16.3597 14.9816 16.3597 15.4204 15.9204C15.8597 15.4811 15.8597 14.7689 15.4204 14.3296ZM3.9375 8.375C3.9375 6.20375 5.70375 4.4375 7.875 4.4375C10.0462 4.4375 11.8125 6.20375 11.8125 8.375C11.8125 10.5462 10.0462 12.3125 7.875 12.3125C5.70375 12.3125 3.9375 10.5462 3.9375 8.375Z" fill="#6B7384" />
        </svg>
    </div>
</form>

