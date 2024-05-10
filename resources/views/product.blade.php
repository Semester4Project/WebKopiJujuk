<!-- resources/views/dashboard.blade.php -->
@extends('layout.admin')

@section('title', 'Product')

@section('content')
<!-- Isi konten di sini -->
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="mb-3"> <!-- Tambahkan div baru -->
      <div class="card-header py-3 d-flex flex-row align-items-center">
        <button type="button" class="btn btn-dark mb-1">Tambah Product</button>
        <button type="button" class="btn btn-dark mb-1">Tambah Kategori</button>
      </div>
      <div class="table-responsive p-3">
        <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTableHover_length"><label>Show <select name="dataTableHover_length" aria-controls="dataTableHover" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTableHover_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTableHover"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table align-items-center table-flush table-hover dataTable" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
          <thead class="thead-light">
            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 149.172px;">Name</th><th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 238.594px;">Position</th><th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 109.266px;">Office</th><th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 38.6406px;">Age</th><th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 94.5938px;">Start date</th><th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 92.7344px;">Salary</th></tr>
          </thead>
          <tfoot>
            <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
          </tfoot>
          <tbody>
          <tr role="row" class="odd">
              <td class="sorting_1">Airi Satou</td>
              <td>Accountant</td>
              <td>Tokyo</td>
              <td>33</td>
              <td>2008/11/28</td>
              <td>$162,700</td>
            </tr><tr role="row" class="even">
              <td class="sorting_1">Angelica Ramos</td>
              <td>Chief Executive Officer (CEO)</td>
              <td>London</td>
              <td>47</td>
              <td>2009/10/09</td>
              <td>$1,200,000</td>
            </tr><tr role="row" class="odd">
              <td class="sorting_1">Ashton Cox</td>
              <td>Junior Technical Author</td>
              <td>San Francisco</td>
              <td>66</td>
              <td>2009/01/12</td>
              <td>$86,000</td>
            </tr><tr role="row" class="even">
              <td class="sorting_1">Bradley Greer</td>
              <td>Software Engineer</td>
              <td>London</td>
              <td>41</td>
              <td>2012/10/13</td>
              <td>$132,000</td>
            </tr><tr role="row" class="odd">
              <td class="sorting_1">Brenden Wagner</td>
              <td>Software Engineer</td>
              <td>San Francisco</td>
              <td>28</td>
              <td>2011/06/07</td>
              <td>$206,850</td>
            </tr><tr role="row" class="even">
              <td class="sorting_1">Brielle Williamson</td>
              <td>Integration Specialist</td>
              <td>New York</td>
              <td>61</td>
              <td>2012/12/02</td>
              <td>$372,000</td>
            </tr><tr role="row" class="odd">
              <td class="sorting_1">Bruno Nash</td>
              <td>Software Engineer</td>
              <td>London</td>
              <td>38</td>
              <td>2011/05/03</td>
              <td>$163,500</td>
            </tr><tr role="row" class="even">
              <td class="sorting_1">Caesar Vance</td>
              <td>Pre-Sales Support</td>
              <td>New York</td>
              <td>21</td>
              <td>2011/12/12</td>
              <td>$106,450</td>
            </tr><tr role="row" class="odd">
              <td class="sorting_1">Cara Stevens</td>
              <td>Sales Assistant</td>
              <td>New York</td>
              <td>46</td>
              <td>2011/12/06</td>
              <td>$145,600</td>
            </tr><tr role="row" class="even">
              <td class="sorting_1">Cedric Kelly</td>
              <td>Senior Javascript Developer</td>
              <td>Edinburgh</td>
              <td>22</td>
              <td>2012/03/29</td>
              <td>$433,060</td>
            </tr></tbody>
        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTableHover_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTableHover_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTableHover_previous"><a href="#" aria-controls="dataTableHover" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTableHover" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTableHover" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTableHover" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTableHover" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTableHover" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTableHover" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="dataTableHover_next"><a href="#" aria-controls="dataTableHover" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
      </div>
    </div>
  </div>
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/ruang-admin.min.js')}}"></script>
  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
@endsection