@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card table-custom-bg-radius ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive table-custom-bg-radius borderr-table">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tags as $tag)
                                <tr>
                                    <td>
                                        <span class="sn-nmbers">{{__($tag->name)}}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline--primary editButton" data-id="{{ $tag->id }}" data-name="{{ $tag->name }}">
                                            <i class="la la-pencil"></i>@lang('Edit')
                                        </button>
                                        <button class="btn btn-sm btn-outline--danger confirmationBtn" data-action="{{ route('admin.tag.delete',$tag->id) }}" data-question="@lang('Are you sure to delete this tag?')" data-btn_class="btn btn--primary">
                                            <i class="la la-trash"></i>@lang('Delete')
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($tags->hasPages())
                <div class="card-footer py-4">
                    {{ paginateLinks($tags) }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createModalLabel">@lang('Update Tag Name')</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                </div>
                <form class="form-horizontal" method="post" action="">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45" id="btn-save" value="add">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="d-flex flex-colum flex-wrap gap-2 justify-content-end align-items-center">
        <button class="btn btn-sm btn-outline--primary createButton"><i class="las la-plus"></i>@lang('Add New')</button>
        <x-search-form/>
    </div>
@endpush

@push('script')
<script>
    (function($) {
            "use strict"

            $('.createButton').on('click', function() {
                var modal = $('#tagModal');
                modal.find('form').attr('action', `{{ route('admin.tag.add') }}`);
                modal.find('[name=name]').val($(this).data('name'));
                modal.modal('show')
            });

            $('.editButton').on('click', function() {
                var modal = $('#tagModal');
                modal.find('form').attr('action', `{{ route('admin.tag.add','') }}/${$(this).data('id')}`);
                modal.find('[name=name]').val($(this).data('name'));
                modal.modal('show')
            });

        })(jQuery);
</script>
@endpush
