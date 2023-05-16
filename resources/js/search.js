let input = document.querySelector("#search");
let tabList = document.querySelector(".test");
let page = document.querySelector("#page");
let timer = null;

function search() {
    clearTimeout(timer);
    timer = setTimeout(async function() {
        let uri = '/?q=' + input.value + "&page=" + page.value;

        let response = await fetch(uri, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        tabList.innerHTML = await response.text();
    }, 200);
}

input.addEventListener('keyup', function () {
    page.value = 1;
    search();
});

addEventListener('click', function (event) {
    const anchor = event.target.closest("a");
    if (!anchor) return;

    if (anchor.classList.contains('page-number') || anchor.classList.contains('page-nav')) {
        event.preventDefault();
        page.value = anchor.getAttribute('href').split("page=")[1];
        search();
    }
})