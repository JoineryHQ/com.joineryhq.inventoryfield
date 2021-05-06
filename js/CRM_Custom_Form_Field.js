CRM.$(function($) {
  $(document).ready(function(){
    // Add limit_per field to the right place and remove original field
    var limitPer = $('#limit_per');
    var limitPerParent = limitPer.parents('tr');
    limitPerParent.addClass('crm-custom-field-form-block-min_value limit_per').hide();
    limitPerParent.insertAfter('.crm-custom-field-form-block-is_view');

    if($('#html_type').val() === 'Select') {
      limitPerParent.show();
    }

    $(document).on('change', '#html_type', function(){
      // console.log($('#html_type').val());
      if($('#html_type').val() === 'Select') {
        limitPerParent.show();
      } else {
        limitPerParent.hide();
      }
    });
  });
});
