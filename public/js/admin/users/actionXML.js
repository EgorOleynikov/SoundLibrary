$(document).ready(function() {
  function performAction(e) {
    e.preventDefault();
    var form_id = e.target.form.id;
    var form = e.target.form;
    var actionUrl = e.target.form.action;
    var button_type = e.target.name;
    $.ajax({
      url: actionUrl,
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {"id" : form_id, "type" : button_type},
      success: function(data) {
        if(data === "success") {
          switch(button_type) {
            case "unban_btn":
              $("#button_container" + form_id).html('<button name="ban_btn" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full ban_btn" form="' + form_id + '">Ban</button>');
              $(".ban_btn").click(function(e) {performAction(e)});
              break;
            case "ban_btn":
              $("#button_container" + form_id).html('<button name="unban_btn" class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full unban_btn" form="' + form_id + '">Unban</button>');
              $(".unban_btn").click(function(e) {performAction(e)});
              break;
            case "remove_btn":
              $("#" + "tr" + form_id).remove();
              $("#" + form_id).remove();
              break;
          }
        }
      }
    });
  };
  $(".ban_btn").click(function(e) { performAction(e) });
  $(".unban_btn").click(function(e) { performAction(e) });
  $(".remove_btn").click(function(e) { performAction(e) });
});
