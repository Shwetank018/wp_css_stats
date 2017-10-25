
<header class="css-stats-header">
    <div class="u-flex-one">
        <h1 class="css-stats-header__title">CSS Stats</h1>
    </div>
    <div class="css-stats-header__filepath">
        <label for="file-path">Enter the location of your stylesheets below: <a href="#info">need more info?</a></label>
        <input value="" name="file-path" class="css-stats-header__filepath__input"/>
    </div>
    <button class="css-stats-header__refresh">
        <svg fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>
</header>
<section class="css-stats-output">
    <div class="css-stats-output__row css-stats-output__row--header">
        <div>Metric</div>
        <div>Data</div>
    </div>
</section>
<section id="info" class="css-stats-info">
    <div class="css-stats-info__left">
        <h2 class="css-stats-info__heading">What is the root folder when using the search?</h2>
        <p class="css-stats-info__body">The search automatically starts from the current theme directory. You can then use a direct path or a much more flexile glob pattern to find the stylesheets you would like to evaluate.</p>
    </div>
    <div class="css-stats-info__right">
        <h2 class="css-stats-info__heading">How can I get the stats of all css files in a folder?</h2>
        <p class="css-stats-info__body">By using the * character you can tell the search to find all files of a certain extension. For example, if all of your css files were in a folder named css the following search value would find all css files in that folder and subfolder: <strong>css/*.css</strong></p>
    </div>
</section>