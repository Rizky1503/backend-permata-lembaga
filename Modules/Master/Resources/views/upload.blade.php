@extends('layouts.backend')

@section('content')

<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__body">
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row">
                <div class="col-md-6">
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">
                            Soal
                        </label><br>
                        <input type="file" id="file2">
                    </div>
                </div>
				<div class="col-md-6">
					<div class="form-group m-form__group">
						<label for="exampleInputEmail1">
							Jawaban
						</label>
						<select class="form-control" id="m_select2_10" name="param">
                            <option value="AK">A</option>
                            <option value="AK">B</option>
                            <option value="AK">C</option>
                            <option value="AK">D</option>
                            <option value="AK">E</option>
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
                            url: "{{ route('Master.loadSoal') }}"
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
                    field: "Soal",
                    title: "Soal",
                    filterable: !1,
                    width: 150,
                }, 
                {
                    field: "Jawaban",
                    title: "Jawaban",
                    filterable: !1,
                    width: 80,
                    textAlign: "center"
                },
                {
                    field: "Actions",
                    width: 110,
                    title: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t) {
                        return '</a><a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"><i class="la la-trash"></i></a>'
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