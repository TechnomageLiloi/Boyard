I60.Maps = {
    show: function ()
    {
        API.request('I60.Maps.Show', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}