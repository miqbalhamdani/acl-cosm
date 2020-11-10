
    <!-- BEGIN: Vendor JS-->
    <script>
      var assetBaseUrl = "{{ asset('') }}";
    </script>
    <script src="{{asset('vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('fonts/LivIconsEvo/js/LivIconsEvo.tools.js')}}"></script>
    <script src="{{asset('fonts/LivIconsEvo/js/LivIconsEvo.defaults.js')}}"></script>
    <script src="{{asset('fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>

    <!-- dataTable -->
    {{-- <script src="{{asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script> --}}

    <!-- Select2 -->
    <script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>

    <!-- Sweet Alerts -->
    <script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

    <!-- Dropzone -->
    <script src="{{asset('vendors/js/extensions/dropzone.min.js')}}"></script>

    <!-- END Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    @yield('vendor-scripts')
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    @if($configData['mainLayoutType'] == 'vertical-menu')
    <script src="{{asset('js/scripts/configs/vertical-menu-light.js')}}"></script>
    @else
    <script src="{{asset('js/scripts/configs/horizontal-menu.js')}}"></script>
    @endif
    <script src="{{asset('js/core/app-menu.js')}}"></script>
    <script src="{{asset('js/core/app.js')}}"></script>
    <script src="{{asset('js/scripts/components.js')}}"></script>
    <script src="{{asset('js/scripts/footer.js')}}"></script>
    <script src="{{asset('js/scripts/customizer.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- Laravel Vue -->
    <script src="{{ mix('vue/js/manifest.js') }}"></script>
    <script src="{{ mix('vue/js/vendor.js') }}"></script>
    <script src="{{ mix('vue/js/app.js') }}"></script>

    <!-- COMMON JS-->
    <script src="{{asset('js/scripts/common.js')}}"></script>

    <!-- BEGIN: Page JS-->
    @yield('page-scripts')
    <!-- END: Page JS-->
