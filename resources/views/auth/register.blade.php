@extends('layouts.app')

@section('content')



    <div class="kt-login__head d-flex justify-content-between">
        <div class="kt-login__head">
            <span class="kt-login__signup-label">{{__('Already have an account ?')}}</span>&nbsp;&nbsp;
            <a href="{{ route("login") }}" class="kt-link kt-login__signup-link">{{__('Log in!')}}</a>
        </div>

    </div>

    <!--end::Head-->

    <!--begin::Body-->
    <div class="kt-login__body">

        <!--begin::Signin-->
        <div class="kt-login__form">
            <div class="kt-login__title">
                <h3> {{ __('Register')}}</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action='{{ route("register") }}' aria-label="{{ __('Register') }}">

            @csrf
                <div class="form-group row">
                    <div class="col-lg-12">
                        <input name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{old('name')}}"
                               placeholder="{{__('Name')}}"
                               type="text">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <input id="email"
                               type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="{{__('Email')}}"
                               required
                               autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <input id="phone"
                               type="number"
                               class="form-control @error('phone') is-invalid @enderror"
                               name="phone"
                               value="{{ old('phone') }}"
                               placeholder="{{__('Phone')}}"
                               required
                               autocomplete="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <input id="specialization"
                               type="text"
                               class="form-control @error('specialization') is-invalid @enderror"
                               name="specialization"
                               value="{{ old('specialization') }}"
                               placeholder="{{__('Specialization')}}"
                               required
                               autocomplete="specialization">
                        @error('specialization')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <input id="address"
                               type="text"
                               class="form-control @error('address') is-invalid @enderror"
                               name="address"
                               value="{{ old('address') }}"
                               placeholder="{{__('Address')}}"
                               required
                               autocomplete="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <input id="password"
                               type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="{{__('Password')}}"
                               name="password"
                               required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <input id="password-confirm"
                               type="password"
                               class="form-control"
                               placeholder="{{__('Confirm Password')}}"
                               name="password_confirmation"
                               required autocomplete="new-password">
                    </div>
                </div>
                <div class="kt-login__actions">
                    <button  class="btn btn-primary btn-elevate kt-login__btn-primary mx-auto">{{__('Register')}}</button>
                </div>
                <!--end::Action-->
            </form>

            <!--end::Form-->
        </div>

        <!--end::Signin-->
    </div>

    <!--end::Body-->
@endsection
