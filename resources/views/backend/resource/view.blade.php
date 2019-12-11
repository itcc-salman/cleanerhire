@extends('backend.layouts.master')
@push('css')
<style type="text/css">
    .pdfobject-container { height: 90rem; border: 1rem solid rgba(0,0,0,.1); }
</style>
@endpush
@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-md-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ $resource->name }}
                        </h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div id="pdf_view">
                        </div>
                    </div>
                </div>

            </div>

            <!--end::Portlet-->
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('assets/js/pdfobject.min.js') }}" ></script>
<script>
    PDFObject.embed("{{ $file_path }}", "#pdf_view");
</script>
@endpush
