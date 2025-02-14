I60.Questions = {
    collection: function ()
    {
        API.request('I60.Questions.Collection', {
            
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (link)
    {
        API.request('I60.Questions.Show', {
            'link': link
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('I60.Questions.Create', {

        }, function (data) {
            I60.Questions.collection();
        }, function () {

        });
    },

    remove: function (key_question)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('I60.Questions.Remove', {
            'key_question': key_question
        }, function (data) {
            I60.Questions.collection();
        }, function () {

        });
    },

    edit: function (key_question)
    {
        API.request('I60.Questions.Edit', {
            'key_question': key_question
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    test: function (key_question)
    {
        API.request('I60.Questions.Test', {
            'key_question': key_question
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    suite: function ()
    {
        API.request('I60.Questions.Suite', {
            'tags': $('#tags').val()
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_question)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('I60.Questions.Save', {
            'key_question': key_question,
            'title': jq_block.find('[name="title"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'theory': jq_block.find('[name="theory"]').val(),
            'tags': jq_block.find('[name="tags"]').val(),
            'dt': jq_block.find('[name="dt"]').val(),
            'data': jq_block.find('[name="data"]').val()
        }, function (data) {
            I60.Questions.collection();
        }, function () {

        });
    }
}