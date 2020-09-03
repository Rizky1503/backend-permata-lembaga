@extends('layouts.backend')


@section('content')
@if (session('error'))
<div class="m-alert m-alert--icon alert alert-danger" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-danger"></i>
    </div>
    <div class="m-alert__text">
        <strong>
            Opps !
        </strong>
        {{ session('error') }}
    </div>
    <div class="m-alert__actions" style="width: 220px;">
        <button type="button" class="btn btn-outline-light btn-sm m-btn m-btn--hover-brand" data-dismiss="alert1" aria-label="Close">
            Dismiss
        </button>
    </div>
</div>
@endif  
@if (session('alert'))
<div class="m-alert m-alert--icon alert alert-success" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-danger"></i>
    </div>
    <div class="m-alert__text">
        <strong>
            Well Done !
        </strong>
        {{ session('alert') }}
    </div>
    <div class="m-alert__actions" style="width: 220px;">
        <button type="button" class="btn btn-outline-light btn-sm m-btn m-btn--hover-brand" data-dismiss="alert1" aria-label="Close">
            Dismiss
        </button>
    </div>
</div>
@endif  
<form method="POST" action="{{ route('Dashboard.MyprofileStore') }}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="m-portlet m-portlet--mobile">        
              <div class="m-portlet__body">
                  <div class="m-form__heading">
                        <h3 class="m-form__heading-title">
                            Personal Data
                        </h3>
                    </div>
                    <br>
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">
                            Full Name
                        </label>
                        <input type="text" class="form-control m-input" name="full_name" aria-describedby="emailHelp" placeholder="Enter full name" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Place of Birth
                        </label>
                        <input type="text" class="form-control m-input" name="place_birth" placeholder="Enter place of birth" value="{{ Auth::user()->tempat_lahir }}">
                    </div>                    
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Date of Birth
                        </label>    
                        <input type="text" name="date_birth" class="form-control m-input" id="m_datepicker_1" placeholder="Enter date of birth" @if(Auth::user()->tanggal_lahir == "") value="" @else value="{{ Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->format('d F Y') }}" @endif>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Gender
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio" name="gender" value="L" @if(Auth::user()->jenis_kelamin == "L") checked @endif>
                                Male
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="gender" value="P" @if(Auth::user()->jenis_kelamin == "P") checked @endif>
                                Female
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Phone Number
                        </label>
                        <input type="text" class="form-control m-input" name="phone_number" placeholder="Enter phone number" value="{{ Auth::user()->no_telp }}">
                    </div><div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Email
                        </label>
                        <input type="text" class="form-control m-input" name="email" placeholder="Enter email" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Password
                        </label>
                        <input type="password" class="form-control m-input" name="password" placeholder="Password">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleTextarea">
                            Address
                        </label>
                        <textarea class="form-control m-input" name="address" rows="3">{{ Auth::user()->alamat }}</textarea>
                    </div>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="m-portlet m-portlet--mobile">        
              <div class="m-portlet__body">
                  <div class="m-form__heading">
                        <h3 class="m-form__heading-title">
                            Other Information
                        </h3>
                    </div>
                    <br>
                    @can('user-profile-list')              
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Type of Institution
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio" name="type_institute" value="Bank" onclick="funtionKlik(this.value)" @if(Auth::user()->jenis_institute == "Bank") checked @endif>
                                Bank
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="type_institute" value="Sekuritas" onclick="funtionKlik(this.value)" @if(Auth::user()->jenis_institute == "Sekuritas") checked @endif>
                                Sekuritas
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="type_institute" value="Other" onclick="funtionKlik(this.value)" @if(Auth::user()->jenis_institute != "Bank" && Auth::user()->jenis_institute != "Sekuritas") checked @endif>
                                Other
                                <span></span>
                            </label>
                        </div>
                        @if(Auth::user()->jenis_institute != "Bank" && Auth::user()->jenis_institute != "Sekuritas")
                            <input type="text" class="form-control m-input" id="otherInsitution" name="other_type_institute" placeholder="Enter other Institution" value="{{ Auth::user()->jenis_institute }}">
                        @else
                            <input type="text" class="form-control m-input" id="otherInsitution" name="other_type_institute" placeholder="Enter other Institution" style="display: none">
                        @endif
                    </div>                    
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Name of Institution
                        </label>
                        <input type="text" class="form-control m-input" name="institute" value="{{ Auth::user()->nama_institute }}">
                    </div>      
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Profession
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio" name="profession" value="Penasihat Investasi" onclick="funtionKlikProfession(this.value)" @if(Auth::user()->profesi == "Penasihat Investasi") checked @endif>
                                Penasihat Investasi
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="profession" value="Waperd" onclick="funtionKlikProfession(this.value)" @if(Auth::user()->profesi == "Waperd") checked @endif>
                                Waperd
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="profession" value="Other" onclick="funtionKlikProfession(this.value)" @if(Auth::user()->profesi != "Penasihat Investasi" && Auth::user()->profesi != "Waperd") checked @endif>
                                Other
                                <span></span>
                            </label>
                        </div>
                        @if(Auth::user()->profesi != "Penasihat Investasi" && Auth::user()->profesi != "Waperd")
                            <input type="text" class="form-control m-input" id="otherProfession" name="name_profession" value="{{ Auth::user()->profesi }}" placeholder="Enter other Institution">
                        @else
                            <input type="text" class="form-control m-input" id="otherProfession" name="name_profession" placeholder="Enter other Institution" style="display: none">
                        @endif
                    </div> 
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            SK Profession
                        </label>
                        <input type="text" class="form-control m-input" name="sk_profesi" placeholder="Sk Profession" value="{{ Auth::user()->sk_profesi }}">
                    </div>                    
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Number of members
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio" name="number_of_member" value="5" @if(Auth::user()->jumlah_user_register == "5") checked @endif>
                                0 - 5
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="number_of_member" value="15" @if(Auth::user()->jumlah_user_register == "15") checked @endif>
                                6 -15
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="number_of_member" value="30" @if(Auth::user()->jumlah_user_register == "30") checked @endif>
                                16 - 30
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="number_of_member" value="1000" @if(Auth::user()->jumlah_user_register == "1000") checked @endif>
                                 > 30
                                <span></span>
                            </label>
                        </div>
                    </div>
                    @endcan

                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Work
                        </label>
                        <input type="text" class="form-control m-input" name="work" placeholder="Enter work" value="{{ Auth::user()->work }}">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            Source of Income
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio" name="source_of_income" value="Sallary" @if(Auth::user()->source_of_income == "Sallary") checked @endif>
                                Sallary
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="source_of_income" value="Commission" @if(Auth::user()->source_of_income == "Commission") checked @endif>
                                Commission
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="source_of_income" value="Other" @if(Auth::user()->source_of_income == "Other") checked @endif>
                                 Other
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            source of Monthly Income
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio" name="source_of_monthly" value="1-3" @if(Auth::user()->source_of_monthly == "1-3") checked @endif>
                                1 - 3 Juta
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="source_of_monthly" value="3-5" @if(Auth::user()->source_of_monthly == "3-5") checked @endif>
                                3 - 5 Juta
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="source_of_monthly" value="5-10" @if(Auth::user()->source_of_monthly == "5-10") checked @endif>
                                5 - 10 Juta
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="source_of_monthly" value="10-15" @if(Auth::user()->source_of_monthly == "10-15") checked @endif>
                                 10 - 15 Juta
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="source_of_monthly" value=">15" @if(Auth::user()->source_of_monthly == ">15") checked @endif>
                                 > 15 Juta
                                <span></span>
                            </label>
                        </div>
                    </div>
                    @can('user-profile-list-question-user') 
                    <div class="form-group m-form__group">
                        <label for="exampleInputPassword1">
                            <div class="m-checkbox-list">
                                <label class="m-checkbox">
                                    <input type="checkbox" name="checked_value" value="{{ Auth::user()->flag }}" onclick="myFunctionCheckWrapperd()" id="checkBoxWaperd" @if(Auth::user()->flag != "Admin" && Auth::user()->flag != "Koordinator" && Auth::user()->flag != "User") checked @endif>
                                    Do you have an Investment Advisor or Waperd ?
                                    <span></span>
                                </label>
                            </div>                            
                        </label>
                    </div> 
                    <div class="form-group m-form__group" id="valueCheckedWaperd" style="display: none;">                        
                        <!--begin: Datatable -->
                        <table class="table" id="html_table" width="100%">
                          <thead>
                            <tr>
                                <th title="Field #3">
                                  Action
                                </th>
                                <th title="Field #3">
                                  Name
                                </th>
                                <th title="Field #3">
                                  Max User
                                </th>            
                            </tr>
                          </thead>
                          <tbody id="html_value_table">
                          </tbody>
                        </table>
                    </div>
                    @endcan                                         
              </div>
            </div>            
        </div>
        <div class="col-md-12">
            <div class="m-portlet m-portlet--mobile">        
                    <div class="m-portlet__body" style="text-align: right;">   
                        <button type="submit" class="btn btn-brand">
                            Update
                        </button>
                    </div>                
                </form>
            </div>
        </div>
    </div>
</form>

@endsection

@section('script')
@can('user-profile-list-question-user')

@endcan
<script type="text/javascript">
function myFunctionCheckWrapperd(){
    var checkBox = document.getElementById("checkBoxWaperd");

    if (checkBox.checked == true){
        var data = '';
        var url = "{{ route('Dashboard.MyprofileJson') }}";
        // console.log(data);
        $.ajax({
            type:'GET',
            url:url,
            data:data,
            success:function(DataResult){  
                console.log(DataResult);             
                $('#html_value_table').html(DataResult);
            }
        });
        $('#valueCheckedWaperd').show();
    } else {
        $('#valueCheckedWaperd').hide();
    }
};

function funtionKlik(response){
    if (response == "Bank") {
        $('#otherInsitution').hide();
    }else if (response == "Sekuritas") {
        $('#otherInsitution').hide();
    }else{
        $('#otherInsitution').show();
    }

}

function funtionKlikProfession(response){
    if (response == "Penasihat Investasi") {
        $('#otherProfession').hide();
    }else if (response == "Waperd") {
        $('#otherProfession').hide();
    }else{
        $('#otherProfession').show();
    }

}


var BootstrapDatepicker = {
    init: function() {
        $("#m_datepicker_1").datepicker({
            todayHighlight: !0,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            },
            format: 'd M yyyy',
            autoclose:true,
            endDate: "today"
        }).on('change', function(){
            $('.datepicker').hide();
        });    
    }
};


jQuery(document).ready(function() {
    var checkBox = document.getElementById("checkBoxWaperd");
    @can('user-profile-list-question-user')
    if (checkBox.checked == true){
        var data = '';
        var url = "{{ route('Dashboard.MyprofileJson') }}";
        // console.log(data);
        $.ajax({
            type:'GET',
            url:url,
            data:data,
            success:function(DataResult){  
                console.log(DataResult);             
                $('#html_value_table').html(DataResult);
            }
        });
        $('#valueCheckedWaperd').show();
    } else {
        $('#valueCheckedWaperd').hide();
    }
    @endcan


    BootstrapDatepicker.init();
}); 
</script>
@endsection