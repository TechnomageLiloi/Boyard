var I60 = {
    Services: {
        loadFromServer: function loadFile(filePath) {
            let result = null;
            let request = new XMLHttpRequest();
            request.open("GET", filePath, false);
            request.send();
            if (request.status == 200) {
                result = request.responseText;
            }
            return result;
        }
    }
};
