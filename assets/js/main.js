const mobileButton = document.getElementById('mobile-bar-button');
const mobileXButton = document.getElementById('mobile-x-button');
const mobileNavigationToggler = function () {
    const mobileNavigation = document.getElementById('mobile-navigation');

    mobileNavigation.classList.toggle('hidden');
};

mobileButton.addEventListener('click', mobileNavigationToggler);
mobileXButton.addEventListener('click', mobileNavigationToggler);
