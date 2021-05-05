CRM.$(function($) {
  $(document).ready(function(){
    // Add min value field and autoinc checkbox to the right place and remove original field
    var $limitPer = $('#limit_per');
    var $limitPerParent = $limitPer.parents('tr');
    $limitPerParent.addClass('crm-custom-field-form-block-min_value limit_per').hide();
    var insertlimitPer = '.crm-custom-field-form-block-is_view';
    $limitPerParent.insertAfter(insertlimitPer);
    $('.CRM_Custom_Form_Field > .form-layout-compressed').remove();

    // if ($('#html_type option:selected'))
    if($('#html_type').val() === 'Select') {
      $limitPerParent.show();
    }

    $(document).on('change', '#html_type', function(){
      // console.log($('#html_type').val());
      if($('#html_type').val() === 'Select') {
        $limitPerParent.show();
      } else {
        $limitPerParent.hide();
      }
    });
  });
});
