jQuery(function ($) {
    $('#my-search-form').submit(function (e) {

        e.preventDefault();

        let search_term = $('#my-search-term').val();

        let formData = new FormData();

        formData.append('action', 'my_search_func');
        formData.append('search_term', search_term);

        $.ajax({

            url: my_ajax.ajax_url,

            type: 'POST',

            data: formData,

            processData: false,

            contentType: false,

            success: function (response) {

                console.log(response);

            },

            error: function (xhr) {

                console.log(xhr.responseText);

            }

        });

    });

});