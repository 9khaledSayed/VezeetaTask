@extends('layouts.app')


@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    3 Columns Form Layout
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form class="kt-form kt-form--label-right" action="{{route('appointments.store')}}" method="post">
            @csrf
            <div class="kt-portlet__body">
                <div class="form-group row mb-2">
                    <div class="col-lg-2">
                        <label class="">Day:</label>
                        <div class="kt-radio-inline">
                            <label class="kt-checkbox kt-checkbox--success">
                                <input type="checkbox" name="saturday" @if(old('saturday')) checked @endif> Saturday
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="">From:</label>
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('saturday_from') is-invalid @enderror timeInput"
                                       readonly
                                       name="saturday_from"
                                       value="{{old('saturday_from')}}"
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
                    <div class="col-lg-4">
                        <label class="">To:</label>
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('saturday_to') is-invalid @enderror timeInput"
                                       readonly
                                       value="{{old('saturday_to')}}"
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
                    <div class="col-lg-2">
                        <label class="">Period:</label>
                        <input class="form-control @error('saturday_period') is-invalid @enderror"
                               name="saturday_period"
                               value="{{old('saturday_period')}}"
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
                                <input type="checkbox" name="sunday" @if(old('sunday')) checked @endif> Sunday
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('sunday_from') is-invalid @enderror timeInput"
                                       readonly
                                       name="sunday_from"
                                       value="{{old('sunday_from')}}"
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
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('sunday_to') is-invalid @enderror timeInput"
                                       readonly
                                       name="sunday_to"
                                       value="{{old('sunday_to')}}"
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
                    <div class="col-lg-2">
                        <input class="form-control @error('sunday_period') is-invalid @enderror"
                               name="sunday_period"
                               type="number"
min="0"                                value="{{old('sunday_period')}}"
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
                                <input type="checkbox" value="{{old('monday')}}" name="monday" @if(old('monday')) checked @endif> Monday
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('monday_from') is-invalid @enderror timeInput"
                                       readonly
                                       value="{{old('monday_from')}}"
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
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('monday_to') is-invalid @enderror timeInput"
                                       readonly
                                       value="{{old('monday_to')}}"
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
                    <div class="col-lg-2">
                        <input class="form-control @error('monday_period') is-invalid @enderror"
                               value="{{old('monday_period')}}" name="monday_period" type="number" min="0" placeholder="period" />
                        @error('monday_period')
                        <span class="form-text text-muted">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-lg-2">
                        <div class="kt-radio-inline">
                            <label class="kt-checkbox kt-checkbox--success">
                                <input type="checkbox" name="tuesday" @if(old('tuesday')) checked @endif> Tuesday
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('tuesday_from') is-invalid @enderror timeInput"
                                       readonly
                                       name="tuesday_from"
                                       value="{{old('tuesday_from')}}"
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
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('tuesday_to') is-invalid @enderror timeInput"
                                       readonly
                                       name="tuesday_to"
                                       value="{{old('tuesday_to')}}"
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
                    <div class="col-lg-2">
                        <input class="form-control @error('tuesday_period') is-invalid @enderror"
                               name="tuesday_period"
                               value="{{old('tuesday_period')}}"
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
                                       name="wednesday" @if(old('wednesday')) checked @endif> Wednesday
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('wednesday_from') is-invalid @enderror timeInput"
                                       readonly
                                       name="wednesday_from"
                                       value="{{old('wednesday_from')}}"
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
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('wednesday_to') is-invalid @enderror timeInput"
                                       readonly
                                       value="{{old('wednesday_to')}}"
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
                    <div class="col-lg-2">
                        <input class="form-control @error('wednesday_period') is-invalid @enderror"
                               name="wednesday_period"
                               value="{{old('wednesday_period')}}"
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
                                <input type="checkbox" name="thursday" @if(old('thursday')) checked @endif> Thursday
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('thursday_from') is-invalid @enderror timeInput"
                                       readonly
                                       name="thursday_from"
                                       value="{{old('thursday_from')}}"
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
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('thursday_to') is-invalid @enderror timeInput"
                                       readonly
                                       name="thursday_to"
                                       value="{{old('thursday_to')}}"
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
                    <div class="col-lg-2">
                        <input class="form-control @error('thursday_period') is-invalid @enderror"
                               name="thursday_period"
                               value="{{old('thursday_period')}}"
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
                                <input type="checkbox" name="friday" @if(old('friday')) checked @endif> Friday
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('friday_from') is-invalid @enderror timeInput"
                                       readonly
                                       value="{{old('friday_from')}}"
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
                    <div class="col-lg-4">
                        <div class="kt-input-icon kt-input-icon--right">
                            <div class="input-group timepicker">
                                <input class="form-control @error('friday_to') is-invalid @enderror timeInput"
                                       readonly
                                       value="{{old('friday_to')}}"
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
                    <div class="col-lg-2">
                        <input class="form-control @error('friday_period') is-invalid @enderror"
                               name="friday_period"
                               value="{{old('friday_period')}}"
                               type="number" min="0" placeholder="period" />
                        @error('friday_period')
                        <span class="form-text text-muted">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="m-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

    <!--end::Portlet-->
@endsection

@push('scripts')
    <script>
        $(function () {
            $('.timeInput').timepicker({
                minuteStep: 1,
                defaultTime: '',
                showSeconds: false,
                showMeridian: true
            });
        })
    </script>
@endpush
