$(document).ready(function (e) {
  $(".update_btn").click(function(e) {
    e.preventDefault();
    var form_id = $(this).attr("form");
    var form = $('#' + form_id);
    var actionUrl = form.attr("action");
    $.ajax({
      url: actionUrl,
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: form.serialize(),
      success: function(data) {
        if(data === "success") {
          $("#" + "tr" + form_id).remove();
          console.log($("#" + "tr" + form_id));
        }
      }
    });
  });
  $(".delete_btn").click(function(e) {
    e.preventDefault();
    var form_id = $(this).attr("form");
    var form = $('#' + form_id);
    var actionUrl = $("#destroy_path").attr("value");
    $.ajax({
      url: actionUrl,
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: form.serialize(),
      success: function(data) {
        if(data === "success") {
          console.log($("#" + "tr" + form_id));
          $("#" + "tr" + form_id).remove();
          $("#" + form_id).remove();
        }
        console.log(data);
      }
    });
    console.log(); // or alert($(this).attr('id'));
  });
});
