(function ($) {
    'use strict';

    function init() {
        $('#llms_start_quiz').click(function () {
            $('.next-lesson').hide();
        });
        
        // Open the quiz summary by default
        $('.view-summary').click();
        
        // If the autostart hash is present, autostart the quiz
        if ('#start_quiz' === document.location.hash) {
            document.location.hash = '';
            $('#llms_start_quiz').click();
        }

        $(window).on('beforeunload', maybeBlockUnload);
    }

    /**
     * Warns the user if they want to leave the quiz page
     *
     * @param {jQuery.Event} e
     */
    function maybeBlockUnload(e) {
        if (0 !== $('#llms_answer_question').length) {
            return 'If you leave this page you have to restart the quiz.';
        }
    }

    init();
}(jQuery));
