// $(document).scroll(function(e) {
//   if($(window).scrollTop() > 50) {
//     $("body").
//   } else if($(window).scrollTop() < 50) {
//
//   }
// });

$(document).on('scroll', event => {
  var scrollPercent = Math.floor(100 * $(window).scrollTop() / ($(document).height() - $(window).height()));
  console.log(scrollPercent);
  // var string = "hue-rotate(" + scrollPercent + "deg)";
  // console.log(string);
  // $('body').css('filter', string); // The animation will take place over 300 milliseconds
});
