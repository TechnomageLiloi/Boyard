I60.Vertex = {
    show: function ()
    {
        API.request('I60.Vertex.Show', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}