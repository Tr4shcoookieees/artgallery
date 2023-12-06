const categories = Array.from(document.querySelectorAll('input[name="category"]'));
const styles = Array.from(document.querySelectorAll('input[name="style"]'));
const themes = Array.from(document.querySelectorAll('input[name="theme"]'));
const colors = Array.from(document.querySelectorAll('input[name="color"]'));
const priceFromInput = document.getElementById('price_from');
const priceToInput = document.getElementById('price_to');
let filterLink = document.getElementById('filter_link');
let styleParams = filterLink.href.includes('style') ? Array.from(filterLink.href.match(/style=([^&]*)/)[1].split('%25')) : [];
let colorParams = filterLink.href.includes('color') ? Array.from(filterLink.href.match(/color=([^&]*)/)[1].split('%25')) : [];
let lastChanged = null;

categories.forEach(category => {
    category.addEventListener('change', (filter) => {
        // add '?category={$filter.value}' to filterLink.href if 'category' parameter does not exist in url or change 'category' parameter in url if it exists
        let newLink = `category=${filter.target.value}`;
        if (filterLink.href.includes('?')) {
            filterLink.href = filterLink.href.includes('category') ? filterLink.href.replace(/category=[^&]*/, `${newLink}`) : filterLink.href + `&${newLink}`;
        } else {
            filterLink.href = filterLink.href.includes('category') ? filterLink.href.replace(/category=[^&]*/, `${newLink}`) : filterLink.href + `?${newLink}`;
        }
    });
});

themes.forEach(theme => {
    theme.addEventListener('change', (filter) => {
        let newLink = `theme=${filter.target.value}`;
        if (filterLink.href.includes('?')) {
            filterLink.href = filterLink.href.includes('theme') ? filterLink.href.replace(/theme=[^&]*/, `${newLink}`) : filterLink.href + `&${newLink}`;
        } else {
            filterLink.href = filterLink.href.includes('theme') ? filterLink.href.replace(/theme=[^&]*/, `${newLink}`) : filterLink.href + `?${newLink}`;
        }
    });
});

styles.forEach(style => {
    style.addEventListener('change', (filter) => {
        filter.target.checked ? styleParams.push(filter.target.value) : styleParams.splice(styleParams.indexOf(filter.target.value), 1);
        let newLink = `style=${styleParams.join('%25')}`;
        if (newLink === 'style=') {
            filterLink.href = filterLink.href.replace(/style=[^&]*/, '');
            console.log(filterLink.href);
            return;
        }
        if (filterLink.href.includes('?')) {
            filterLink.href = filterLink.href.includes('style') ? filterLink.href.replace(/style=[^&]*/, `${newLink}`) : filterLink.href + `&${newLink}`;
        } else {
            filterLink.href = filterLink.href.includes('style') ? filterLink.href.replace(/style=[^&]*/, `${newLink}`) : filterLink.href + `?${newLink}`;
        }
        console.log(filterLink.href);
    });
});

colors.forEach(color => {
    color.addEventListener('change', (filter) => {
        filter.target.checked ? colorParams.push(filter.target.value) : colorParams.splice(colorParams.indexOf(filter.target.value), 1);
        let newLink = `color=${colorParams.join('%25')}`;
        if (newLink === 'color=') {
            filterLink.href = filterLink.href.replace(/color=[^&]*/, '');
            console.log(filterLink.href);
            return;
        }
        if (filterLink.href.includes('?')) {
            filterLink.href = filterLink.href.includes('color') ? filterLink.href.replace(/color=[^&]*/, `${newLink}`) : filterLink.href + `&${newLink}`;
        } else {
            filterLink.href = filterLink.href.includes('color') ? filterLink.href.replace(/color=[^&]*/, `${newLink}`) : filterLink.href + `?${newLink}`;
        }
        console.log(filterLink.href);
    });
});

priceFromInput.addEventListener('change', () => {
    let newLink = `price_from=${document.getElementById('min_value').textContent.replace('₽', '')}`;
    console.log(newLink);
    if (lastChanged === 'price_to' && parseInt(priceFromInput.value) > parseInt(priceToInput.value)) {
        priceToInput.value = priceFromInput.value;
        document.getElementById('max_value').innerHTML = priceFromInput.value + "&#8381;";
    }
    lastChanged = 'price_from';
    if (filterLink.href.includes('?')) {
        filterLink.href = filterLink.href.includes('price_from') ? filterLink.href.replace(/price_from=[^&]*/, `${newLink}`) : filterLink.href + `&${newLink}`;
    } else {
        filterLink.href = filterLink.href.includes('price_from') ? filterLink.href.replace(/price_from=[^&]*/, `${newLink}`) : filterLink.href + `?${newLink}`;
    }
});

priceToInput.addEventListener('change', () => {
    let newLink = `price_to=${document.getElementById('max_value').textContent.replace('₽', '')}`;
    console.log(newLink);
    if (lastChanged === 'price_from' && parseInt(priceToInput.value) < parseInt(priceFromInput.value)) {
        priceFromInput.value = priceToInput.value;
        document.getElementById('min_value').innerHTML = priceToInput.value + "&#8381;";
    }
    lastChanged = 'price_to';
    if (filterLink.href.includes('?')) {
        filterLink.href = filterLink.href.includes('price_to') ? filterLink.href.replace(/price_to=[^&]*/, `${newLink}`) : filterLink.href + `&${newLink}`;
    } else {
        filterLink.href = filterLink.href.includes('price_to') ? filterLink.href.replace(/price_to=[^&]*/, `${newLink}`) : filterLink.href + `?${newLink}`;
    }
});
