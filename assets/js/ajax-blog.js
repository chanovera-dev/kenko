const ajaxFilter = document.getElementById('ajax-filter');
const siteContent = document.getElementById('site-content');

// Cambiando el evento de 'change' a 'click' para los inputs de radio
ajaxFilter.querySelectorAll('input[type="radio"]').forEach(radio => {
    radio.addEventListener('click', event => {
        siteContent.classList.add('is-loading');

        fetch( misha_args.ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'cat': event.target.value
            }),
        }).then(response => {
            return response.text();
        }).then(response => {
            if (response) {
                siteContent.innerHTML = response;
            }
            siteContent.classList.remove('is-loading');
        }).catch(error => {
            console.log(error);
        });
    });
});
