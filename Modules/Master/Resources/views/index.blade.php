@extends('layouts.backend')

@section('content')

<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__body">
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group m-form__group">
						<label for="exampleInputEmail1">
							Input Bank Soal
						</label>
						<input type="email" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bank Soal 1">
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
			<div class="m_datatable" id="json_data"></div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
var DatatableRemoteAjaxDemo = function() {
    var t = function() {
        var t = $(".m_datatable").mDatatable({
                data: {
                    type: "remote",
                    source: {
                        read: {
                            method: "GET",
                            url: "{{ route('Master.load') }}"
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
                    field: "BankSoal",
                    title: "Nama Bank Soal",
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
                        return '<div class="dropdown"><a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown"><i class="la la-ellipsis-h"></i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{ route('Master.mataPelajaran',['jurusan'=>'IPA']) }}"><i class="la la-leaf"></i> Upload Soal IPA </a><a class="dropdown-item" href="{{ route('Master.mataPelajaran',['jurusan'=>'IPS']) }}"><i class="la la-globe"></i> Upload Soal IPS</a></div></div><a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Hapus Soal"><i class="la la-trash"></i></a>'
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