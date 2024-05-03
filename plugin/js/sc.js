// Toggle Class Active
function active() {
    const search = document.querySelector('.form-search')
    
    // Saat hamburger di klik
    document.querySelector('#search-id').onclick = () => {
        search.classList.toggle('active_form')
    }

    // Saat diklik diluar navbar, sidebarnya ilang
    const search_id = document.querySelector('#search-id')
    
    document.addEventListener('click', function(event) {
        if (!search_id.contains(event.target) && !search.contains(event.target)) {
            search.classList.remove('active_form')
        }
    })
}