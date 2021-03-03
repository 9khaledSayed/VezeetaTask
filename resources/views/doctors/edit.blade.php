@extends('layouts.app')


@section('content')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{__('My Profile')}}
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                <a href="/" class="btn btn-secondary">
                    {{__('Back To Home')}}
                </a>
            </div>
        </div>
    </div>

        @if(session('success'))
            <div class="alert alert-solid-success alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                <div class="alert-icon"><i class="fa fa-check-circle"></i></div>
                <div class="alert-text">{{__('Changes Has Been Saved Successfully !')}}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-close"></i></span>
                    </button>
                </div>
            </div>
        @endif

        <form id="profileForm" class="" action="{{route('doctors.update', $doctor)}}" method="post" enctype="multipart/form-data">
            @method('put')
            <div class="row">
                <div class="col-lg-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Doctor Information
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->

                            @csrf
                            <div class="kt-portlet__body">
                                <div class="form-group row mb-2">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control @error('name') is-invalid @enderror"
                                               value="{{old('name') ?? $doctor->name}}"
                                               name="name"
                                               placeholder="Name"
                                               type="text" >
                                        @error('name')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                            <input type="text"
                                                   name="phone"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   value="{{old('phone') ?? $doctor->phone}}"
                                                   placeholder="Phone"
                                                   aria-describedby="basic-addon1">
                                        </div>
                                        @error('phone')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                            <input type="text"
                                                   name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{old('email') ?? $doctor->email}}"
                                                   placeholder="Email"
                                                   aria-describedby="basic-addon1">
                                        </div>
                                        @error('email')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Address</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-location-arrow"></i></span></div>
                                            <input type="text"
                                                   name="address"
                                                   class="form-control @error('address') is-invalid @enderror"
                                                   value="{{old('address') ?? $doctor->address}}"
                                                   placeholder="Address"
                                                   aria-describedby="basic-addon1">
                                        </div>
                                        @error('address')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Price</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-money"></i></span></div>
                                            <input type="text"
                                                   name="price"
                                                   class="form-control @error('price') is-invalid @enderror"
                                                   value="{{old('price') ?? $doctor->price}}"
                                                   placeholder="Price"
                                                   aria-describedby="basic-addon1">
                                        </div>
                                        @error('price')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Specialization</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control @error('specialization') is-invalid @enderror"
                                               value="{{old('specialization') ?? $doctor->specialization}}"
                                               name="specialization"
                                               placeholder="Specialization"
                                               type="text" >
                                        @error('specialization')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <div class="col-lg-3 m-auto">
                                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle m-auto" id="kt_user_avatar_3">
                                            <div class="kt-avatar__holder" style="width: 120px;height: 120px; background-image: url({{asset('storage/avatars/' . $doctor->photo)}})"></div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen"></i>
                                                <input type="file" name="photo" accept=".png, .jpg, .jpeg">
                                            </label>
                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <!--end::Form-->
                    </div>

                    <!--end::Portlet-->
                </div>
                <div class="col-lg-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Add Your Appointments
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->

                        <div class="kt-portlet__body">
                                <div class="form-group row mb-2">
                                    <div class="col-lg-2">
                                        <label class="">Day:</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-checkbox kt-checkbox--success">
                                                <input type="checkbox" name="saturday" @if(old('saturday') ?? $doctor->saturday) checked @endif> Saturday
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 saturday">
                                        <label class="">From:</label>
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('saturday_from') is-invalid @enderror timeInput"
                                                       readonly
                                                       name="saturday_from"
                                                       value="{{old('saturday_from') ?? $doctor->saturday_from}}"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('saturday_from')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 saturday">
                                        <label class="">To:</label>
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('saturday_to') is-invalid @enderror timeInput"
                                                       readonly
                                                       value="{{old('saturday_to') ?? $doctor->saturday_to}}"
                                                       name="saturday_to"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('saturday_to')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 saturday">
                                        <label class="">Period:</label>
                                        <input class="form-control @error('saturday_period') is-invalid @enderror"
                                               name="saturday_period"
                                               value="{{old('saturday_period') ?? $doctor->saturday_period}}"
                                               type="number" min="0" placeholder="period" />
                                        @error('saturday_period')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <div class="col-lg-2">
                                        <div class="kt-radio-inline">
                                            <label class="kt-checkbox kt-checkbox--success">
                                                <input type="checkbox" name="sunday" @if(old('sunday') ?? $doctor->sunday) checked @endif> Sunday
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 sunday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('sunday_from') is-invalid @enderror timeInput"
                                                       readonly
                                                       name="sunday_from"
                                                       value="{{old('sunday_from') ?? $doctor->sunday_from}}"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('sunday_from')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 sunday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('sunday_to') is-invalid @enderror timeInput"
                                                       readonly
                                                       name="sunday_to"
                                                       value="{{old('sunday_to') ?? $doctor->sunday_to}}"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('sunday_to')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 sunday">
                                        <input class="form-control @error('sunday_period') is-invalid @enderror"
                                               name="sunday_period"
                                               type="number"
                                               min="0"
                                               value="{{old('sunday_period') ?? $doctor->sunday_period}}"
                                               placeholder="period" />
                                        @error('sunday_period')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <div class="col-lg-2">
                                        <div class="kt-radio-inline">
                                            <label class="kt-checkbox kt-checkbox--success">
                                                <input type="checkbox" value="{{old('monday') ?? $doctor->monday}}" name="monday"
                                                       @if(old('monday') ?? $doctor->monday) checked @endif> Monday
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 monday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('monday_from') is-invalid @enderror timeInput"
                                                       readonly
                                                       value="{{old('monday_from') ?? $doctor->monday_from}}"
                                                       name="monday_from"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('monday_from')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 monday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('monday_to') is-invalid @enderror timeInput"
                                                       readonly
                                                       value="{{old('monday_to') ?? $doctor->monday_to}}"
                                                       name="monday_to"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('monday_to')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 monday">
                                        <input class="form-control @error('monday_period') is-invalid @enderror"
                                               value="{{old('monday_period') ?? $doctor->monday_period}}" name="monday_period" type="number" min="0" placeholder="period" />
                                        @error('monday_period')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <div class="col-lg-2">
                                        <div class="kt-radio-inline">
                                            <label class="kt-checkbox kt-checkbox--success">
                                                <input type="checkbox" name="tuesday" @if(old('tuesday') ?? $doctor->tuesday) checked @endif> Tuesday
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 tuesday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('tuesday_from') is-invalid @enderror timeInput"
                                                       readonly
                                                       name="tuesday_from"
                                                       value="{{old('tuesday_from') ?? $doctor->tuesday_from}}"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('tuesday_from')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 tuesday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('tuesday_to') is-invalid @enderror timeInput"
                                                       readonly
                                                       name="tuesday_to"
                                                       value="{{old('tuesday_to') ?? $doctor->tuesday_to}}"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('tuesday_to')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 tuesday">
                                        <input class="form-control @error('tuesday_period') is-invalid @enderror"
                                               name="tuesday_period"
                                               value="{{old('tuesday_period') ?? $doctor->tuesday_period}}"
                                               type="number" min="0" placeholder="period" />
                                        @error('tuesday_period')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <div class="col-lg-2">
                                        <div class="kt-radio-inline">
                                            <label class="kt-checkbox kt-checkbox--success">
                                                <input type="checkbox"
                                                       name="wednesday" @if(old('wednesday') ?? $doctor->wednesday) checked @endif> Wednesday
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 wednesday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('wednesday_from') is-invalid @enderror timeInput"
                                                       readonly
                                                       name="wednesday_from"
                                                       value="{{old('wednesday_from') ?? $doctor->wednesday_from}}"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('wednesday_from')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 wednesday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('wednesday_to') is-invalid @enderror timeInput"
                                                       readonly
                                                       value="{{old('wednesday_to') ?? $doctor->wednesday_to}}"
                                                       name="wednesday_to"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('wednesday_to')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 wednesday">
                                        <input class="form-control @error('wednesday_period') is-invalid @enderror"
                                               name="wednesday_period"
                                               value="{{old('wednesday_period') ?? $doctor->wednesday_period}}"
                                               type="number" min="0" placeholder="period" />
                                        @error('wednesday_period')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <div class="col-lg-2">
                                        <div class="kt-radio-inline">
                                            <label class="kt-checkbox kt-checkbox--success">
                                                <input type="checkbox" name="thursday" @if(old('thursday')  ?? $doctor->thursday) checked @endif> Thursday
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 thursday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('thursday_from') is-invalid @enderror timeInput"
                                                       readonly
                                                       name="thursday_from"
                                                       value="{{old('thursday_from')  ?? $doctor->thursday_from}}"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('thursday_from')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 thursday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('thursday_to') is-invalid @enderror timeInput"
                                                       readonly
                                                       name="thursday_to"
                                                       value="{{old('thursday_to')  ?? $doctor->thursday_to}}"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('thursday_to')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 thursday">
                                        <input class="form-control @error('thursday_period') is-invalid @enderror"
                                               name="thursday_period"
                                               value="{{old('thursday_period') ?? $doctor->thursday_period}}"
                                               type="number" min="0" placeholder="period" />
                                        @error('thursday_period')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <div class="col-lg-2">
                                        <div class="kt-radio-inline">
                                            <label class="kt-checkbox kt-checkbox--success">
                                                <input type="checkbox" id="friday" name="friday" @if(old('friday') ?? $doctor->friday) checked @endif> Friday
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 friday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('friday_from') is-invalid @enderror timeInput"
                                                       readonly
                                                       value="{{old('friday_from') ?? $doctor->friday_from}}"
                                                       name="friday_from"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('friday_from')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 friday">
                                        <div class="kt-input-icon kt-input-icon--right">
                                            <div class="input-group timepicker">
                                                <input class="form-control @error('friday_to') is-invalid @enderror timeInput"
                                                       readonly
                                                       value="{{old('friday_to') ?? $doctor->friday_to}}"
                                                       name="friday_to"
                                                       placeholder="Select time"
                                                       type="text" />
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('friday_to')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 friday">
                                        <input class="form-control @error('friday_period') is-invalid @enderror"
                                               name="friday_period"
                                               value="{{old('friday_period') ?? $doctor->friday_period}}"
                                               type="number" min="0" placeholder="period" />
                                        @error('friday_period')
                                        <span class="form-text text-muted">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                    </div>


                        <!--end::Form-->
                    </div>

                    <!--end::Portlet-->
                </div>
            </div>
        </form>


@endsection

@push('scripts')
    <script>
        $(function () {
            var dayNameCheckboxElements = $("input[type='checkbox']");

            $('.timeInput').timepicker({
                minuteStep: 1,
                defaultTime: '',
                showSeconds: false,
                showMeridian: false
            });



            dayNameCheckboxElements.on('change',function () {
                contorller($(this));
            });

            dayNameCheckboxElements.each(function () {
                contorller($(this));
            });

            function contorller(element) {
                var dayName = element.attr('name');
                if (element.prop("checked")){
                    $("."+dayName).fadeIn();
                    $("input[name='" + dayName + "_from']").prop('required',true);
                    $("input[name='" + dayName + "_to']").prop('required',true);
                    $("input[name='" + dayName + "_period']").prop('required',true);
                }else {
                    $("."+dayName).fadeOut()
                    $("input[name='" + dayName + "_from']").prop('required',false);
                    $("input[name='" + dayName + "_to']").prop('required',false);
                    $("input[name='" + dayName + "_period']").prop('required',false);
                }
            }
            $(".alert").fadeOut(3000)
            $("#submitBtn").click(function () {
                $("#profileForm").submit();
            })
        })
    </script>
@endpush
