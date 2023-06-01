$("#contact").keydown(function(e) {
    var oldvalue=$(this).val();
    var field=this;
    setTimeout(function () {
        if(field.value.indexOf('09') !== 0) {
            $(field).val(oldvalue);
        } 
    }, 1);
});