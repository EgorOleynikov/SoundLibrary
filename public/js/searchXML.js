$(document).ready(function (e) {
  function performSearch(e, sub) {
    if (sub === 'sub') {
      e.preventDefault();
    }
    var form = $('#search_form');
    // console.log(form.serialize());
    var actionUrl = form.attr('action');
    $.ajax({
      url: actionUrl,
      method: 'GET',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: form.serialize(),
      success: function(data) {
        $('#main').html(data);
      }
    }).then(function() {
      $( function() { $( 'audio' ).audioPlayer(); } );
    })
  };
  $("#search_form").on('submit', function(e) { performSearch(e, 'sub') });
  $("#category_box").on('change', function(e) { performSearch(e) });
  $("#ur_only_checkbox").on('change', function(e) { performSearch(e) });
})
