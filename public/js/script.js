$(function () {
  $('.modal-open').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });

  $('.js-modal').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
