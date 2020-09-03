@extends('layouts.backend')


@section('content')
<div class="m-portlet m-portlet--mobile">        
  <div class="m-portlet__body">    
    @if (session('resent'))
    <div class="m-alert m-alert--icon m-alert--air alert alert-success alert-dismissible fade show" role="alert">
        <div class="m-alert__icon">
            <i class="flaticon-exclamation-2"></i>
        </div>
        <div class="m-alert__text">
            <strong>
                Well done!
            </strong>
            A fresh verification link has been sent to your email address
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection