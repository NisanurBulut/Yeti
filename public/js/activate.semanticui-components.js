$(".tabItem").tab();
$(".ui.modal").modal();
$('.ui.dropdown').dropdown();
$('.tooltip').popup();
$('.ui.toggle').toggle();
$('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  });