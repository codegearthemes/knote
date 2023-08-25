(function(){
	'use strict';

	window.addEventListener('load', function(){
        const buttonElement = document.getElementById('starter-install');
        if( buttonElement ){
            buttonElement.addEventListener('click', (e) => {
                if( buttonElement.dataset.status == 'active' )
                    return;
                e.preventDefault();

                buttonElement.innerHTML = '<i class="dashicons dashicons-update-alt rotating"></i> Installing…';

                const formData = new FormData();
                formData.append( 'action', 'knote_install_starter_plugin' );
                formData.append( 'slug', 'codegear-starter' );
                formData.append( 'path', 'codegear-starter/codegear-starter.php' );
                formData.append( 'nonce', knote_localize.nonce );


                fetch( knote_localize.ajax_url, {
                    method: "POST",
                    credentials: 'same-origin',
                    body: formData
                })
                .then((response) => response.json())
                .then((data) => {

                    if( data.success ){
                        buttonElement.innerHTML = '<i class="dashicons dashicons-saved"></i> Activated';

                        setTimeout( function() {
                            buttonElement.innerHTML = 'Redirecting…';

                            setTimeout( function() {

                                window.location = buttonElement.getAttribute('href');

                            }, 1000 );
                        }, 500 );
                    }


                })
                .catch((error) => {
                    output.innerHTML = '<span>'+knote_localize.failed_message+'</span>';
                });

            });
        }
    })

})();
