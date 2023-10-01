const newestArticleContainer = document.getElementById('news-articles');
let responseIndex = 0;

const anchorArticles = document.createElement('a');

const getNewestArticles = function () {
    fetch(API.POSTS)
        .then((response) => response.json())
        .then((response) => {
            if (response.length === 0) return;

            console.log(response);

            anchorArticles.href = response[responseIndex].link;
            anchorArticles.innerHTML = response[responseIndex].title.rendered;

            newestArticleContainer.appendChild(anchorArticles);

            setInterval(() => {
                anchorArticles.innerHTML =
                    response[responseIndex].title.rendered;
                anchorArticles.href = response[responseIndex].link;

                newestArticleContainer.appendChild(anchorArticles);

                if (responseIndex === response.length - 1) {
                    responseIndex = 0;
                } else {
                    responseIndex++;
                }
            }, 3000);
        })
        .catch((error) => {
            console.log(error);
        });
};

newestArticleContainer.onload = getNewestArticles();
