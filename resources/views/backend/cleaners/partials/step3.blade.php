<div class="kt-wizard-v1__form" id="stepThreeWizardDiv"></div>

@push('scripts')
<script>
    function getStep3Services(){
        var cleaner_id = $("#cleaner_id").val();
        if(cleaner_id != ''){
            var url = "{{ route('backend.ajax.get_role_based_services') }}" +"?cleaner_id="+ cleaner_id;
        }else{
            var url = "{{ route('backend.ajax.get_role_based_services') }}" +"?user_type=cleaner";
        }

        $.ajax({
            url: url,
            type: 'get',
            async: false,
            success: function(response){
                if(response.code == 200){
                    var xrole = $("input[type=radio][name=role]:checked").val();
                    var rate_per_hour_display = '';
                    if(xrole == 'cleaner'){
                        rate_per_hour_display = 'd-none';
                    }
                    @if(isset($cleaner))
                        var cleanerServices = {!! $cleaner->cleanerServices !!};

                        var cleanerServicesResidentialIds = cleanerServices.filter(cleanerService => cleanerService.service_for == 'residential').map(cleanerService => cleanerService.cleaning_service_id);
                        var cleanerServicesResidentialYesEquipememtIds = cleanerServices.filter(cleanerService => cleanerService.has_equipments == 1 && cleanerService.service_for == 'residential').map(cleanerService => cleanerService.cleaning_service_id);
                        var cleanerServicesResidentialNoEquipememtIds = cleanerServices.filter(cleanerService => cleanerService.has_equipments != 1 && cleanerService.service_for == 'residential').map(cleanerService => cleanerService.cleaning_service_id);

                        var cleanerServicesCommercialIds = cleanerServices.filter(cleanerService => cleanerService.service_for == 'commercial').map(cleanerService => cleanerService.cleaning_service_id);
                        var cleanerServicesCommercialYesEquipememtIds = cleanerServices.filter(cleanerService => cleanerService.has_equipments == 1 && cleanerService.service_for == 'commercial').map(cleanerService => cleanerService.cleaning_service_id);
                        var cleanerServicesCommercialNoEquipememtIds = cleanerServices.filter(cleanerService => cleanerService.has_equipments != 1 && cleanerService.service_for == 'commercial').map(cleanerService => cleanerService.cleaning_service_id);

                        var  htmlstring = '<div class="row"><label class="col-xl-3"></label><div class="col-lg-9 col-xl-6"><h5 class="kt-section__title kt-section__title-sm">Residential :</h5></div></div>';
                        htmlstring = htmlstring + '<div class="kt-checkbox-list row">';


                        if(response.services.residential){
                            $.each(response.services.residential, function(index, el) {
                                if($.inArray(el.id, cleanerServicesResidentialIds) !== -1){
                                    var tmp =  cleanerServices.filter(cleanerService => cleanerService.cleaning_service_id == el.id && cleanerService.service_for == 'residential').map(cleanerService => cleanerService.rate_per_hour);
                                    var checked = 'checked';
                                    var display = '';
                                    var rate_per_hour = tmp[0];
                                }else{
                                    var tmp =  response.services.residential.filter(cleanerService => cleanerService.id == el.id).map(cleanerService => cleanerService.rate_per_hour);
                                    var checked = '';
                                    var display = 'd-none';
                                    var rate_per_hour = tmp[0];
                                }

                                if($.inArray(el.id, cleanerServicesResidentialYesEquipememtIds) !== -1){
                                    var equipement_yes_checked = 'checked';
                                    var equipement_no_checked = '';
                                }else if($.inArray(el.id, cleanerServicesResidentialNoEquipememtIds) !== -1){
                                    var equipement_yes_checked = '';
                                    var equipement_no_checked = 'checked';
                                }else{
                                    var equipement_yes_checked = '';
                                    var equipement_no_checked = '';
                                }
                                htmlstring = htmlstring + '<div class="col-6"><div class="kt-option kt-p10 col-12 d-block form-group"><label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0"><input class="cleaner-services-checkbox" name="cleaner_services_residential[]"  value="'+ el.id +'" '+ checked +' type="checkbox" >' + el.name + '<span></span></label>';
                                htmlstring = htmlstring + '<div class="form-group kt-mb-5 kt-mt-5 '+ display +'" id="service_'+ el.id +'"><label class="'+ rate_per_hour_display +'">Rate per hour</label><input type="text" name="rate_per_hour_'+ el.id +'" class="form-control '+rate_per_hour_display+'" value="'+ rate_per_hour +'"><label>Do you have relevant equipments?</label><div class="kt-radio-inline"><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" '+equipement_yes_checked+' value="1" name="has_equipment_residential_'+el.id+'"> Yes <span></span></label><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="0" '+equipement_no_checked+' name="has_equipment_residential_'+el.id+'"> No <span></span></label></div></div></div></div>'
                            });
                        }

                        htmlstring = htmlstring + '</div>';

                        htmlstring = htmlstring + '<div id="propertiesDiv"></div>';


                        if(response.services.commercial){
                        htmlstring = htmlstring + '<div class="row"><label class="col-xl-3"></label><div class="col-lg-9 col-xl-6"><h5 class="kt-section__title kt-section__title-sm">Commercial :</h5></div></div>';
                        htmlstring = htmlstring + '<div class="kt-checkbox-list row">';
                            $.each(response.services.commercial, function(index, el) {
                                if($.inArray(el.id, cleanerServicesCommercialIds) !== -1){
                                    var tmp =  cleanerServices.filter(cleanerService => cleanerService.cleaning_service_id == el.id && cleanerService.service_for == 'commercial').map(cleanerService => cleanerService.rate_per_hour);
                                    var checked = 'checked';
                                    var display = '';
                                    var rate_per_hour = tmp[0];
                                }else{
                                    var tmp =  response.services.commercial.filter(cleanerService => cleanerService.id == el.id).map(cleanerService => cleanerService.rate_per_hour);
                                    var checked = '';
                                    var display = 'd-none';
                                    var rate_per_hour = tmp[0];
                                }

                                if($.inArray(el.id, cleanerServicesCommercialYesEquipememtIds) !== -1){
                                    var equipement_yes_checked = 'checked';
                                    var equipement_no_checked = '';
                                }else if($.inArray(el.id, cleanerServicesCommercialNoEquipememtIds) !== -1){
                                    var equipement_yes_checked = '';
                                    var equipement_no_checked = 'checked';
                                }else{
                                    var equipement_yes_checked = '';
                                    var equipement_no_checked = '';
                                }
                                htmlstring = htmlstring + '<div class="col-6"><div class="kt-option kt-p10 col-12 d-block form-group"><label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0"><input class="cleaner-services-checkbox-commercial" name="cleaner_services_commercial[]"  value="'+ el.id +'" '+ checked +' type="checkbox" >' + el.name + '<span></span></label>';
                                htmlstring = htmlstring + '<div class="form-group kt-mb-5 kt-mt-5 '+ display +'" id="service_commercial_'+ el.id +'"><label  class="'+ rate_per_hour_display +'">Rate per hour</label><input type="text" name="rate_per_hour_commercial_'+ el.id +'" class="form-control '+rate_per_hour_display+'" value="'+ rate_per_hour +'"><label>Do you have relevant equipments?</label><div class="kt-radio-inline"><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" '+equipement_yes_checked+' value="1" name="has_equipment_commercial_'+el.id+'"> Yes <span></span></label><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="0" '+equipement_no_checked+' name="has_equipment_commercial_'+el.id+'"> No <span></span></label></div></div></div></div>'
                            });
                        }
                    @else

                        if(response.services.residential){
                            var  htmlstring = '<div class="row"><label class="col-xl-3"></label><div class="col-lg-9 col-xl-6"><h5 class="kt-section__title kt-section__title-sm">Residential :</h5></div></div>';
                            htmlstring = htmlstring + '<div class="kt-checkbox-list row">';

                            $.each(response.services.residential, function(index, el) {
                                htmlstring = htmlstring + '<div class="col-6"><div class="kt-option kt-p10 col-12 d-block form-group"><label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0"><input class="cleaner-services-checkbox" name="cleaner_services_residential[]" value="'+ el.id +'" type="checkbox">' + el.name + '<span></span></label>';
                                htmlstring = htmlstring + '<div class="form-group kt-mb-5 kt-mt-5 d-none" id="service_'+ el.id +'"><label  class="'+ rate_per_hour_display +'">Rate per hour</label><input type="text" name="rate_per_hour_'+ el.id +'" class="form-control '+rate_per_hour_display+'" value="'+ el.rate_per_hour +'"><label>Do you have relevant equipments?</label><div class="kt-radio-inline"><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="1" name="has_equipment_residential_'+el.id+'"> Yes <span></span></label><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="0" name="has_equipment_residential_'+el.id+'"> No <span></span></label></div></div></div></div>';
                            });
                        }

                        htmlstring = htmlstring + '</div>';
                        htmlstring = htmlstring + '<div id="propertiesDiv"></div>';
                        if(response.services.commercial){

                            htmlstring = htmlstring + '<div class="row"><label class="col-xl-3"></label><div class="col-lg-9 col-xl-6"><h5 class="kt-section__title kt-section__title-sm">Commercial :</h5></div></div>';
                            htmlstring = htmlstring + '<div class="kt-checkbox-list row">';
                            $.each(response.services.commercial, function(index, el) {
                                htmlstring = htmlstring + '<div class="col-6"><div class="kt-option kt-p10 col-12 d-block form-group"><label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0"><input class="cleaner-services-checkbox-commercial" name="cleaner_services_commercial[]" value="'+ el.id +'" type="checkbox">' + el.name + '<span></span></label>';
                                htmlstring = htmlstring + '<div class="form-group kt-mb-5 kt-mt-5 d-none" id="service_commercial_'+ el.id +'"><label  class="'+ rate_per_hour_display +'">Rate per hour</label><input type="text" name="rate_per_hour_commercial_'+ el.id +'" class="form-control '+rate_per_hour_display+'" value="'+ el.rate_per_hour +'"><label>Do you have relevant equipments?</label><div class="kt-radio-inline"><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="1" name="has_equipment_commercial_'+el.id+'"> Yes <span></span></label><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="0" name="has_equipment_commercial_'+el.id+'"> No <span></span></label></div></div></div></div>';
                            });
                        }
                    @endif

                    htmlstring = htmlstring +  '</div>';
                }else{
                    var htmlstring = 'No Services Found';
                }

                $("#stepThreeWizardDiv").html(htmlstring);
            },
        });
    }

    function getStep3Properties(){
        var cleaner_properties = [];
        @if(isset($cleaner) && $cleaner->cleaner_properties != '')
            cleaner_properties = '{{ $cleaner->cleaner_properties }}';
            cleaner_properties = cleaner_properties.split(',').map( Number );
        @endif

        $.ajax({
            url: '{{ route('backend.ajax.active.properties') }}',
            type: 'get',
            success: function(response){
                if(response.code == 200){

                    var  htmlstring = '<div class="row"><label class="col-xl-3"></label><div class="col-lg-9 col-xl-6"><h5 class="kt-section__title kt-section__title-sm">Properties :</h5></div></div>';
                    htmlstring = htmlstring + '<div class="kt-checkbox-list row">';

                    if(response.properties){
                        $.each(response.properties, function(index, el) {

                            if($.inArray(el.id, cleaner_properties) !== -1){
                                var checked = 'checked';
                            }else{
                                var checked = '';
                            }

                            htmlstring = htmlstring + '<div class="col-6"><div class="kt-option kt-p10 col-12 d-block form-group"><label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0"><input class="" '+ checked +' name="cleaner_properties[]" value="'+ el.id +'" type="checkbox">' + el.name + '<span></span></label></div></div>';
                        });
                    }
                    htmlstring = htmlstring +  '</div></div>';
                }else{
                    var htmlstring = 'No Properties Available Found';
                }

                $("#propertiesDiv").html(htmlstring);
            },
        });
    }

    $(document).ready(function() {
        getStep3Services();
    });

    $(document).on('change', '.cleaner-services-checkbox', function(event) {
        if(this.checked) {
            $('#service_'+this.value).removeClass("d-none");
        }else{
            $('#service_'+this.value).addClass("d-none");
        }
    });

    $(document).on('change', '.cleaner-services-checkbox-commercial', function(event) {
        if(this.checked) {
            $('#service_commercial_'+this.value).removeClass("d-none");
        } else {
            $('#service_commercial_'+this.value).addClass("d-none");
        }
    });
</script>
@endpush
