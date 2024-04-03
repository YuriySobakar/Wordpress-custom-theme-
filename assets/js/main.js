jQuery(document).ready(function($) {
  const spanTag = $('.wpcf7-form-control-wrap')
    .addClass('input-group mb-2');

  const input = $('.subscribe-your-email-input')
    .attr('aria-describedby', 'button-addon2')
    .attr('aria-label', 'Email address')
    .attr('required', true)
    .attr('placeholder', 'example@mail.com')
    .addClass('form-control shadow fs-5');

  const button = $('.subscribe-your-email-button')
    .attr('id', 'button-addon2')
    .addClass('btn btn-outline-secondary shadow');

  const submitLoader = $('.wpcf7-spinner')
    .attr('id', 'submit-loader');

  $('.wpcf7-response-output')
    .addClass('shadow')
    .attr('id', 'form-error');

  spanTag.append(input);
  spanTag.append(button);
  spanTag.append(submitLoader);
});