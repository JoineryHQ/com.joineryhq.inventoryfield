CRM.$(function($) {
  // Foreach data that has inventoryfield
  $.each(CRM.vars.participantDetails, function(key, value) {
    var customField = value.custom_field;
    // Run code when ajax is complete (since ajax is running on the site)
    $(document).ajaxComplete(function(){
      $('select').each(function(){
        // If data-api-field in a select match the customField
        if($(this).data('api-field') == customField) {
          $('option', this).each(function(){
            var optionVal = $(this).val();
            // Edit option text and disabled option if option text match
            // Be sure to edit the text once so that it will not append multiple
            // unavailable text since ajax will run more than once in this page
            if(value[optionVal] && $(this).text() != $(this).text() + ' (unavailable)') {
              $(this).text($(this).text() + ' (unavailable)');
              $(this).attr('disabled', 'disabled');
            }
          });
        }
      });
    });
  });
});
