
    $('#edit_feature_image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
         $('#edit_show_image').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
    });


    $('#feature_image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
         $('#show_image').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
    });


