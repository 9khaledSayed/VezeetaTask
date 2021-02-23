@extends('layouts.app')


@section('content')


    <!--begin::Modal-->
    <div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" style="position: relative;height: 400px;overflow: auto;display: block;">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                        <tr>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody id="intervalBody">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary m-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal-->

    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet" id="kt_portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="flaticon-map-location"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Choose Day
                        </h3>
                    </div>
{{--                    <div class="kt-portlet__head-toolbar">--}}
{{--                        <a href="#" class="btn btn-brand btn-elevate">--}}
{{--                            <i class="la la-plus"></i>--}}
{{--                            Add Event--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
                <div class="kt-portlet__body">
                    <div id="kt_calendar"></div>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/pages/components/calendar/basic.js')}}" type="text/javascript"></script>
@endpush
