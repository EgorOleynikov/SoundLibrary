$(document).ready(function() {
  function performUpdate(e) {
    e.preventDefault();
    var form_id = e.target.form.id;
    var form = $('#' + form_id).serialize();
    var actionUrl = e.target.form.action;
    console.log(form);
    $.ajax({
      url: actionUrl,
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: form,
      success: function(data) {
        if (data === "success") {
          $("#" + "tr" + form_id).remove();
          $("#" + form_id).remove();
        }
        console.log(data);
      }
    });
  };
  $(".delete_btn").click(function(e) { performUpdate(e) });
});
