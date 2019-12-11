<div class="kt-wizard-v1__form" id="stepThreeWizardDiv"></div>

@push('scripts')
<script>
    function getStep3Services(){
        $.ajax({
            url: '{{ route('backend.ajax.services') }}',
            type: 'get',
            success: function(response){
                if(response.code == 200){
                    var htmlstring = '<div class="form-group"><div class="kt-checkbox-list">';
                    @if(isset($cleaner))
                        var cleanerServices = {!! $cleaner->cleanerServices !!};


                        const cleanerServicesIds = cleanerServices.map(cleanerService => cleanerService.cleaning_service_id);
                        const cleanerServicesYesEquipememtIds = cleanerServices.filter(cleanerService => cleanerService.has_equipments).map(cleanerService => cleanerService.cleaning_service_id);
                        const cleanerServicesNoEquipememtIds = cleanerServices.filter(cleanerService => !cleanerService.has_equipments).map(cleanerService => cleanerService.cleaning_service_id);

                        console.log(cleanerServicesNoEquipememtIds);
                        $.each(response.services, function(index, el) {
                            if($.inArray(el.id, cleanerServicesIds) !== -1){
                                var checked = 'checked';
                                var display = '';
                            }else{
                                var checked = '';
                                var display = 'd-none';
                            }

                            if($.inArray(el.id, cleanerServicesYesEquipememtIds) !== -1){
                                var equipement_yes_checked = 'checked';
                                var equipement_no_checked = '';
                            }else if($.inArray(el.id, cleanerServicesNoEquipememtIds) !== -1){
                                var equipement_yes_checked = '';
                                var equipement_no_checked = 'checked';
                            }else{
                                var equipement_yes_checked = '';
                                var equipement_no_checked = '';
                            }
                            htmlstring = htmlstring + '<div class="kt-option kt-p10 col-12 d-block"><label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0"><input class="cleaner-services-checkbox" name="cleaner_services[]"  value="'+ el.id +'" '+ checked +' type="checkbox" >' + el.name + '<span></span></label>';
                            htmlstring = htmlstring + '<div class="form-group kt-mb-5 kt-mt-5 '+ display +'" id="service_'+ el.id +'"><label>Do you have relevant equipments?</label><div class="kt-radio-inline"><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" '+equipement_yes_checked+' value="1" name="has_equipment_'+el.id+'"> Yes <span></span></label><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="0" '+equipement_no_checked+' name="has_equipment_'+el.id+'"> No <span></span></label></div></div></div>'
                        });
                    @else
                        $.each(response.services, function(index, el) {
                            htmlstring = htmlstring + '<div class="kt-option kt-p10 col-12 d-block"><label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0"><input class="cleaner-services-checkbox" name="cleaner_services[]" value="'+ el.id +'" type="checkbox">' + el.name + '<span></span></label>';
                            htmlstring = htmlstring + '<div class="form-group kt-mb-5 kt-mt-5 d-none" id="service_'+ el.id +'"><label>Do you have relevant equipments?</label><div class="kt-radio-inline"><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="1" name="has_equipment_'+el.id+'"> Yes <span></span></label><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="0" name="has_equipment_'+el.id+'"> No <span></span></label></div></div></div>'
                        });
                    @endif

                    htmlstring = htmlstring +  '</div></div>';
                }else{
                    var htmlstring = 'No Services Found';
                }

                $("#stepThreeWizardDiv").html(htmlstring);
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

</script>
@endpush
