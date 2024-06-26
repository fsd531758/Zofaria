@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.basic_attributes'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.products') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="text-muted">{{ __('words.show_basic_attributes') }}</span>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-title">{{ __('words.show_basic_attributes') }}</h3>
            </div>

            <div class="card-toolbar">
                <!--begin::Dropdown-->

                <div class="dropdown dropdown-inline mr-2">
                    <!--begin::Button-->
                    @permission('create-basic_attributes')
                        <a href="{{ route('basic-attributes.create') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path
                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>{{ __('words.add_new_record') }}</a>
                        <!--end::Button-->
                    @endpermission
                </div>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="custom_datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('words.value') }}</th>
                        <th>{{ __('words.type') }}</th>
                        <th>{{ __('words.order') }}</th>
                        <th>{{ __('words.created_at') }}</th>
                        <th>{{ __('words.updated_at') }}</th>
                        <th>{{ __('words.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($basic_attributes as $key => $attribute)
                        <tr>

                            <td>{{ $key + 1 }}</td>
                            <td>{{ $attribute->value }}</td>
                            <td>{{ $attribute->type }}</td>
                            <td>{{ $attribute->order }}</td>

                            <td>{{ formatDate($attribute->created_at) }}</td>
                            <td>{{ formatDate($attribute->created_at) == formatDate($attribute->updated_at) ? '--' : formatDate($attribute->updated_at) }}
                            </td>
                            <td nowrap="nowrap">
                                @include('admin.components.form-controls', [
                                    'name' => 'basic-attributes',
                                    'value' => $attribute,
                                    'role' => 'basic_attributes',
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>

    </div>
@endsection
