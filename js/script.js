    function displayHTML(form) {
        var name = form.name.value;
        var email = form.email.value;
        var text = form.text.value;
        var image = form.picture.value;
        win = window.open(", ", 'popup', "width=520,height=240");
        win.document.writeln("Name: "+name+'<br>');
        win.document.writeln("Email: "+email+'<br>');
        win.document.writeln("Text: "+text+'<br>');
        win.document.writeln("Image Path: "+image);
    }