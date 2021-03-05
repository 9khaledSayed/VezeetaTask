@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <li class="kt-menu__item " aria-haspopup="true"><a onclick="document.getElementById('logout').submit();" href="javascript:" class="kt-menu__link "><i class="kt-menu__link-icon  fas fa-sign-out-alt"></i><span class="kt-menu__link-text">{{__('Log Out')}}</span></a></li>
                        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
