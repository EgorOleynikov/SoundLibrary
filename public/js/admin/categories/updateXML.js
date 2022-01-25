$(document).ready(function() {
  function performUpdate(e) {
    e.preventDefault();
    var button_type = e.target.name;
    var form_id = e.target.form.id;
    var form = $('#' + form_id).serialize();
    form = form + "&type=" + button_type; // sending button type along with request
    console.log(form);
    var actionUrl = e.target.form.action;
    $.ajax({
      url: actionUrl,
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: form,
      success: function(data) {
        if (data === "success" || data[0] === "success") {
          if (button_type == "delete_btn") {
            $("#" + "tr" + form_id).remove();
            $("#" + form_id).remove();
          } else if (button_type == "add_btn") {
            $("#table").append(data[1]);
            $("#form_container").prepend(data[2]);
            $(".update_btn").off();
            $(".delete_btn").off();
            $(".update_btn").click(function(e) { performUpdate(e) });
            $(".delete_btn").click(function(e) { performUpdate(e) });
          }
        }
        console.log(data);
      }
    });
  };
  $(".update_btn").click(function(e) { performUpdate(e) });
  $(".delete_btn").click(function(e) { performUpdate(e) });
  $("#add_btn").click(function(e) { performUpdate(e) });
});
