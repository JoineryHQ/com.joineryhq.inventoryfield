CRM.$(function($) {
  // Add limit_per field to the right place and remove original field
  var limitPer = $('#limit_per');
  var limitPerAmount = $('#limit_per_amount');
  var limitPerParent = limitPer.parents('tr');
  var limitPerAmountParent = limitPerAmount.parents('tr');
  limitPerParent.addClass('crm-custom-field-form-block-min_value limit_per').hide();
  limitPerAmountParent.addClass('crm-custom-field-form-block-min_value limit_per_amount').hide();
  limitPerParent.insertAfter('.crm-custom-field-form-block-is_view');
  limitPerAmountParent.insertAfter('.limit_per');

  if(limitPer.val() >= 1) {
    limitPerAmountParent.show();
  }

  if($('#html_type').val() === 'Select') {
    limitPerParent.show();
  }

  $(document).on('change', '#html_type', function(){
    if($('#html_type').val() === 'Select') {
      limitPerParent.show();
    } else {
      limitPerParent.hide();
    }
  });

  limitPer.on('change', function(){
    if($(this).val() >= 1) {
      limitPerAmountParent.show();
    } else {
      limitPerAmountParent.hide();
    }
  });
});
