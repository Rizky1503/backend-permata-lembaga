@extends('layouts.backend')


@section('content')
<div class="m-portlet m-portlet--mobile">        
  <div class="m-portlet__body">
	<div class="m-alert m-alert--icon alert alert-danger" role="alert">
	    <div class="m-alert__icon">
	        <i class="flaticon-danger"></i>
	    </div>
	    <div class="m-alert__text">
	        <strong>
	            Opps !
	        </strong>
	        Your account is not active
	    </div>
	    <div class="m-alert__actions" style="width: 220px;">
	        <button type="button" class="btn btn-outline-light btn-sm m-btn m-btn--hover-brand" data-dismiss="alert1" aria-label="Close">
	            Dismiss
	        </button>
	    </div>
	</div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection