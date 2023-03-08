@extends('layouts.app')

{{-- set title --}}
@section('title', 'Hospital Patient')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- error --}}
            @if ($errors->any())
                <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">User</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            {{-- table card --}}
            @can('user_table')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">User List</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">

                                            <div class="table-responsive">
                                                <table
                                                    class="table table-striped table-bordered text-inputs-searching default-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Role</th>
                                                            <th>Type</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($hospital_patient as $key => $hospital_patient_item)
                                                            <tr data-entry-id="{{ $hospital_patient_item->id }}">
                                                                <td>{{ date('d/m/Y H:i:s', strtotime($hospital_patient_item->created_at)) ?? '' }}
                                                                </td>
                                                                <td>{{ $hospital_patient_item->name ?? '' }}</td>
                                                                <td>{{ $hospital_patient_item->email ?? '' }}</td>
                                                                <td style="width:200px;">
                                                                    @foreach ($hospital_patient_item->role as $key => $item)
                                                                        <span
                                                                            class="badge bg-yellow text-dark mr-1 mb-1">{{ $item->title }}</span>
                                                                    @endforeach
                                                                </td>
                                                                <td style="width:200px;">
                                                                    <span
                                                                        class="badge bg-success mr-1 mb-1">{{ $hospital_patient_item->detail_user->type_user->name ?? '' }}</span>
                                                                </td>

                                                                <td class="text-center">

                                                                    <div class="btn-group mr-1 mb-1">
                                                                        @can('user_show', 'user_edits', 'user_delete')
                                                                            <button type="button"
                                                                                class="btn btn-info btn-sm dropdown-toggle"
                                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                                aria-expanded="false">Action</button>
                                                                        @endcan
                                                                        <div class="dropdown-menu">
                                                                            @can('user_show')
                                                                                <a href="#mymodal"
                                                                                    data-remote="{{ route('backsite.user.show', $hospital_patient_item->id) }}"
                                                                                    data-toggle="modal" data-target="#mymodal"
                                                                                    data-title="User Detail" class="dropdown-item">
                                                                                    Show
                                                                                </a>
                                                                            @endcan
                                                                            @can('user_edit')
                                                                                <a class="dropdown-item"
                                                                                    href="{{ route('backsite.user.edit', $hospital_patient_item->id) }}">
                                                                                    Edit
                                                                                </a>
                                                                            @endcan
                                                                            @can('user_delete')
                                                                                <form
                                                                                    action="{{ route('backsite.user.destroy', $hospital_patient_item->id) }}"
                                                                                    method="POST"
                                                                                    onsubmit="return confirm('Are you sure want to delete this data ?');">
                                                                                    <input type="hidden" name="_method"
                                                                                        value="DELETE">
                                                                                    <input type="hidden" name="_token"
                                                                                        value="{{ csrf_token() }}">
                                                                                    <input type="submit" class="dropdown-item"
                                                                                        value="Delete">
                                                                                </form>
                                                                            @endcan
                                                                        </div>
                                                                    </div>

                                                                </td>

                                                            </tr>
                                                        @empty
                                                            {{-- not found --}}
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Role</th>
                                                            <th>Type</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endcan

        </div>
    </div>
    <!-- END: Content-->

@endsection

@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script>
        jQuery(document).ready(function($) {
            $('#mymodal').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });

            $('.select-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })

            $('.deselect-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })
        });

        $('.default-table').DataTable({
            "order": [],
            "paging": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "pageLength": 10
        });

        $(function() {
            $(":input").inputmask();
        });
    </script>

    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="btn close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa spin"></i>
                </div>
            </div>
        </div>
    </div>
@endpush
