const explore = document.getElementById('explore');
const moreContent = document.getElementById('morecontent');

explore.addEventListener('click', function () {

    if (moreContent.style.display === 'none') {
        moreContent.style.display = 'block';
        explore.style.color = '#000';
    } else {
        moreContent.style.display = 'none';
        explore.style.color = '#A67A0F';
        
    }
});
const button1 = document.getElementById('button1');
const seemore1 = document.getElementById('seemore1');

button1.addEventListener('click', function () {

    if (seemore1.style.display === 'none') {
        seemore1.style.display = 'block';
        button1.textContent='See Less';
    } else {
        seemore1.style.display = 'none';
        button1.textContent = 'See More';
    }
});
const button2 = document.getElementById('button2');
const seemore2 = document.getElementById('seemore2');

button2.addEventListener('click', function () {

    if (seemore2.style.display === 'none') {
        seemore2.style.display = 'block';
        button2.textContent = 'See Less';
    } else {
        seemore2.style.display = 'none';
        button2.textContent = 'See More';
    }
});