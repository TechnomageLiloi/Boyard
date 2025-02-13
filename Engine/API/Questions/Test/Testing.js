const Testing = {
    turnAround: function (key_question)
    {
        const id = '#testing-' + key_question;
        $(id).find('.question').slideToggle();
        $(id).find('.answer').slideToggle();
    },

    checkRadio: function (key_question)
    {
        const id = '#testing-' + key_question;
        const jq_block = $(id);
        const jq_selected = jq_block.find('input:checked');

        if(!jq_selected.length)
        {
            alert('Choose some answer.');
            return;
        }

        const is_correct = jq_selected.data('correct');

        alert('Answer is ' + (is_correct ? '' : 'in') + 'correct');
    },

    checkCheck: function (key_question)
    {
        const id = '#testing-' + key_question;
        const jq_block = $(id);
        const jq_checks = jq_block.find('input');

        let is_final = true;

        jq_checks.each(function () {
            const jq_check = $(this);
            const is_correct = jq_check.data('correct');
            const is_checked = jq_check.is(':checked');

            if(
                (is_correct && !is_checked) ||
                (!is_correct && is_checked)
            )
            {
                is_final = false;
            }
        });

        alert('Answer is ' + (is_final ? '' : 'in') + 'correct');
    },

    checkSentence: function (key_question)
    {
        const id = '#testing-' + key_question;
        const jq_block = $(id);
        const jq_checks = jq_block.find('input');

        let is_final = true;

        jq_checks.each(function () {
            const jq_check = $(this);
            const correct = jq_check.data('correct');
            const actual = jq_check.val();

            if(correct !== actual)
            {
                is_final = false;
            }
        });

        alert('Answer is ' + (is_final ? '' : 'in') + 'correct');
    }
};