const ARTICLES_TAB = getId('articlesTab'),
  RECENT_ARTICLES = getId('recentArticles'),
  ALL_ARTICLES = getId('allArticles');

function displayArticles() {
  if (ALL_ARTICLES.classList.contains('hidden')) {
    RECENT_ARTICLES.classList.add('hidden');
    ALL_ARTICLES.classList.remove('hidden');
    ARTICLES_TAB.innerHTML = 'Filter articles';
  } else {
    RECENT_ARTICLES.classList.remove('hidden');
    ALL_ARTICLES.classList.add('hidden');
    ARTICLES_TAB.innerHTML = 'Display all articles';
  }
}

if (ARTICLES_TAB !== null) ARTICLES_TAB.addEventListener('click', displayArticles);
