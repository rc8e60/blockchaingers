
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('bootstrap-select');

const ClipboardJS = require('clipboard');

const clipboard = new ClipboardJS('.invitation-link');

clipboard.on('success', function(e) {
    setTooltip('Copied!');
    hideTooltip();
});

clipboard.on('error', function(e) {
    setTooltip('Failed!');
    hideTooltip();
});

$("#link").on("click", function () {
    $(this).select();
});

// Tooltip
$('[data-toggle="tooltip"]').tooltip();

$('.invitation-link').tooltip({
  trigger: 'click',
  placement: 'bottom'
});

function setTooltip(message) {
  $('.invitation-link').tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
}

function hideTooltip() {
  setTimeout(function() {
    $('.invitation-link').tooltip('hide');
  }, 1000);
}
