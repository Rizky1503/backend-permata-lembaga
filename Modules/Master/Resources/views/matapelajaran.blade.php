@extends('layouts.backend')

@section('content')

<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__body">
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group m-form__group">
						<label for="exampleInputEmail1">
							Input Mata Pelajaran
						</label>
						<select class="form-control m-select2" id="m_select2_1" name="param">
                            <option value="AK">Matematika</option>
                            <option value="AK">Bahasa Indonesia</option>
                            <option value="AK">Bahasa Inggris</option>
                            <option value="AK">Fisika</option>
                            <option value="AK">Kimia Biologi</option>
                    </select>
					</div>	
				</div>
				<div class="col-md-5" style="margin-top: 10px;">
					<button type="reset" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__body">
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <span>Jumlah total Keseluruhan soal : 70</span>
			<div class="m_datatable" id="json_data"></div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">

$(document).ready(function() {
    $('#m_select2_1').select2();
});

var DatatableRemoteAjaxDemo = function() {
    var t = function() {
        var t = $(".m_datatable").mDatatable({
                data: {
                    type: "remote",
                    source: {
                        read: {
                            method: "GET",
                            url: "{{ route('Master.loadMataPelajaran') }}"
                        }
                    },
                    pageSize: 10,
                    saveState: {
                        cookie: !0,
                        webstorage: !0
                    },
                    serverPaging: !0,
                    serverFiltering: !0,
                    serverSorting: !0
                },
                layout: {
                    theme: "default",
                    class: "",
                    scroll: !1,
                    footer: !1
                },
                sortable: !0,
                pagination: !0,
                toolbar: {
                    items: {
                        pagination: {
                            pageSizeSelect: [1, 10, 20, 30, 50, 100]
                        }
                    }
                },
                search: {
                    input: $("#generalSearch")
                },
                columns: [{
                    field: "No",
                    title: "#",
                    sortable: !1,
                    width: 40,
                    selector: !1,
                    textAlign: "center"
                }, 
                {
                    field: "matpel",
                    title: "Mata Pelajaran",
                    filterable: !1,
                    width: 150,
                }, 
                {
                    field: "Total",
                    title: "Total",
                    filterable: !1,
                    width: 80,
                },
                {
                    field: "Actions",
                    width: 110,
                    title: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t) {
                        return '<a href="{{ route('Master.Upload',['jurusan'=>$jurusan,'matpel'=> 'Matematika'])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Upload Soal"><i class="la la-upload"></i></a><a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"><i class="la la-trash"></i></a>'
                    }
                }]
        }),
        e = t.getDataSourceQuery();
        $("#m_kelas").on("change", function() {
        	var e = t.getDataSourceQuery();
            e.Status = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
        	loadKelas(e.Status);            
        }).val(void 0 !== e.Status ? e.Status : ""), $("#m_form_type").on("change", function() {
            var e = t.getDataSourceQuery();
            e.Type = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
        }).val(void 0 !== e.Type ? e.Type : ""), $("#m_kelas, #m_form_type").selectpicker()
    };
    return {
        init: function() {
            t()
        }
    }
}();

jQuery(document).ready(function() {
    DatatableRemoteAjaxDemo.init()
});
</script>
@endsection