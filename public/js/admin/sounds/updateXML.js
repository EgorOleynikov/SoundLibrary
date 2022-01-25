$(document).ready(function() {
  function performUpdate(e) {
    e.preventDefault();
    var form_id = e.target.form.id;
    var form = $('#' + form_id).serialize();
    var button_type = e.target.name;
    form = form + "&type=" + button_type; // sending button type along with request
    var actionUrl = e.target.form.action;
    $.ajax({
      url: actionUrl,
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: form,
      success: function(data) {
        if(data === "success") {
          if(button_type == "delete_btn") {
            $("#" + "tr" + form_id).remove();
            $("#" + form_id).remove();
          }
        }
        console.log(data);
      }
    });
  };
  $(".update_btn").click(function(e) { performUpdate(e) });
  $(".delete_btn").click(function(e) { performUpdate(e) });
});
