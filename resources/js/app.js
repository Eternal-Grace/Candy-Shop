require('./bootstrap');

let iSC = document.getElementById('input-showcase')
let sSC = document.getElementById('select-showcase')

let timerId = 0
let searchParams = null

function showcaseSearchRequest() {
    searchParams = new URLSearchParams(window.location.search)
    searchParams.set('search', iSC.value ?? '');
    if (!!sSC.value) searchParams.set('perPage', sSC.value);
    window.location.search = searchParams.toString();
}

if (sSC) {
    sSC.addEventListener('change', () => {
        if ('URLSearchParams' in window && typeof parseInt(sSC.value) === 'number' && [12,24,48].includes(parseInt(sSC.value))) {
            showcaseSearchRequest()
        }
    })
}
if (iSC) {
    iSC.addEventListener('input', () => {
        if ('URLSearchParams' in window && typeof iSC.value === 'string') {
            if (timerId) clearTimeout(timerId)
            timerId = setTimeout(() => {
                showcaseSearchRequest()
            }, 1000) // Execute after 1 second.
        }
    })
}
