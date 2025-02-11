Rune.Maps = {
    show: function ()
    {
        API.request('Rune.Maps.Show', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}