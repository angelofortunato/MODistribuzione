$(document).ready(function() {
    let searchInput = $('#search');
    let url = searchInput.data('url'); // Recupera l'URL dalla vista

    searchInput.on('keyup', function() {
        let query = $(this).val();
        //console.log('Query:', query); // Verifica la query
        if (query.length > 2) {
            //console.log('URL:', url); // Verifica l'URL
            $.ajax({
                url: url,
                type: "GET",
                data: {'search': query},
                success: function(data) {
                    //console.log('Data:', data); // Verifica i dati ricevuti
                    $('#search-results').empty();
                    if (data.length > 0) {
                        data.forEach(function(product) {
                            $('#search-results').append('<a href="/listino/products/' + product.id + '" class="dropdown-item">' + product.name + '</a>');
                        });
                        $('#search-results').show();
                    } else {
                        $('#search-results').hide();
                    }
                },
                error: function(xhr, status, error) {
                    //console.error('Errore AJAX:', error);
                }
            });
        } else {
            $('#search-results').hide();
        }
    });

    // Nascondi il dropdown quando si clicca fuori
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#search').length) {
            $('#search-results').hide();
        }
    });
});
