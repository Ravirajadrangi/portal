<?php print drupal_render($form); ?>
<script>
	(function($) {
		function checkEmail(field) {
			var $field = $(field);
			var $wrapper = $field.parent();
			var entry = $field.val();
			if (matches = entry.match(/^.*@(gmail|yahoo|hotmail).com$/)) {
				var wmsg;
				if ($('.messages.warning', $wrapper).length == 0) {
					wmsg = $('<div>').attr('id', 'edit-mail-warn').addClass('messages warning');
					wmsg.hide().appendTo($wrapper);
					wmsg.text('Please use your e-mail from your university or organization.  Using a non-organizational e-mail (such as ' + matches[1] + ') may lead to a delay or in some cases to a rejection of the account request.');
				} else {
					wmsg = $('.messages.warning', $wrapper);
				}
				wmsg.text('Please use your e-mail from your university or organization.  Using a non-organizational e-mail (such as ' + matches[1] + ') may lead to a delay or in some cases to a rejection of the account request.');
				if (! wmsg.is(":visible")) {
					wmsg.fadeIn();
				}
			} else {
				$('.messages.warning', $wrapper).fadeOut();
			}
		}
		$(document).ready(function() {
			$('#edit-mail,#edit-profile-email').bind('blur', function() {
				checkEmail(this);
			});
			$('#edit-mail,#edit-profile-email').trigger('blur');

			if ($('#edit-profile-institution-role').val() == "Undergraduate Student") {
				$('#edit-profile-contact-adviser').addClass('required');
				$("label[for='edit-profile-contact-adviser']").append('<span title="This field is required." class="form-required">*</span>');
			}
			$('#edit-profile-institution-role').change( function() {
				if ($(this).val() == "Undergraduate Student") {
					$('#edit-profile-contact-adviser').addClass('required');
					$("label[for='edit-profile-contact-adviser']").append('<span title="This field is required." class="form-required">*</span>');
				} else {
					$('#edit-profile-contact-adviser').removeClass('required');
					$("label[for='edit-profile-contact-adviser'] > span.form-required").remove();
				}
			});
			
		});
	})(jQuery);
</script>
