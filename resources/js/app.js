require('./bootstrap');

let sShowcase = document.getElementById('select-showcase')
if (sShowcase) {
    sShowcase.addEventListener('change', () => {
        if (typeof parseInt(sShowcase.value) === 'number' && 'URLSearchParams' in window) {
            let searchParams = new URLSearchParams(window.location.search)
            searchParams.set('perPage', sShowcase.value);
            window.location.search = searchParams.toString();
            // let newRelativePathQuery = window.location.pathname + '?' + searchParams.toString();
            // history.pushState(null, '', newRelativePathQuery);
        }
    })
}
