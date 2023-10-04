const { API } = require('./constant');
const { dateFormat } = require('./function');

const categoryListView = document.getElementById('category-list');
const categoryListContentView = document.getElementById(
    'category-list-content',
);

const toAllCategoryLink = document.getElementById('category-to-all');

const createListContent = function (data) {
    const date = dateFormat(data.date);
    const thumbnail = data._embedded['wp:featuredmedia'][0];

    return `<a href="${data.link}" class="flex flex-col justify-between bg-black/25 group cursor-pointer">
    <div class="flex w-full flex-col">
        <div class="pt-4 mx-auto mb-4">
            <img src="${thumbnail.source_url}" alt="${thumbnail.alt_text}" class="h-36 w-auto">
        </div>
        <div class="px-4">
            <h1 class="text-lg leading-none font-semibold group-hover:opacity-80">${data.title.rendered}</h1>
        </div>
    </div>
    <div class="px-4 pb-4 flex items-end w-full justify-between mt-2">
        <span class="opacity-60 text-sm mr-5">${date}</span>
        <button class="bg-red-500 rounded-sm text-sm h-[20px] px-2 font-semibold group-hover:opacity-60">Baca</button>
    </div>
</a>`;
};
const getRelatedCategory = function (id, categoryUrl) {
    toAllCategoryLink.setAttribute('href', categoryUrl);

    const categoryId = String(id).toLowerCase();
    const url = new URL(API.POSTS);

    const { searchParams } = url;

    searchParams.set('status', 'publish');
    searchParams.set('order', 'desc');
    searchParams.set('orderby', 'date');
    searchParams.set('categories', categoryId);
    searchParams.set('per_page', '5');

    categoryListView.classList.replace('hidden', 'flex');

    categoryListContentView.innerHTML = '';

    fetch(`${url.toString()}&_embed`)
        .then((response) => response.json())
        .then((response) => {
            for (let post of response) {
                const parser = new DOMParser();
                const newNode = parser.parseFromString(
                    createListContent(post),
                    'text/html',
                ).body.firstChild;

                categoryListContentView.appendChild(newNode);
            }
        });
};

document.addEventListener('click', function (event) {
    event.target.ariaLabel !== 'button-link' &&
        event.target.id !== 'category-list' &&
        destroyRelatedCategory();
});

const destroyRelatedCategory = function () {
    categoryListView.classList.replace('flex', 'hidden');
};

window.getRelatedCategory = getRelatedCategory;
window.destroyRelatedCategory = destroyRelatedCategory;
