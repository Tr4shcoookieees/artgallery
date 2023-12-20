const categories = Array.from(document.querySelectorAll('input[name="category"]'));
const styles = Array.from(document.querySelectorAll('input[name="style"]'));
const themes = Array.from(document.querySelectorAll('input[name="theme"]'));
const colors = Array.from(document.querySelectorAll('input[name="color"]'));
const materials = Array.from(document.querySelectorAll('input[name="material"]'));
const priceFromInput = document.getElementById('price_from');
const priceToInput = document.getElementById('price_to');
let filterLink = document.getElementById('filter_link');
let styleParams = filterLink.href.includes('style') ? Array.from(filterLink.href.match(/style=([^&]*)/)[1].split('%25')) : [];
let colorParams = filterLink.href.includes('color') ? Array.from(filterLink.href.match(/color=([^&]*)/)[1].split('%25')) : [];
let materialParams = filterLink.href.includes('material') ? Array.from(filterLink.href.match(/material=([^&]*)/)[1].split('%25')) : [];
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

    category.onclick = function (e) {
        if (e.ctrlKey) {
            this.checked = false;
        }
    }
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

    theme.onclick = function (e) {
        if (e.ctrlKey) {
            this.checked = false;
        }
    }
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

materials.forEach(material => {
    material.addEventListener('change', (filter) => {
        filter.target.checked ? materialParams.push(filter.target.value) : materialParams.splice(materialParams.indexOf(filter.target.value), 1);
        let newLink = `material=${materialParams.join('%25')}`;
        if (newLink === 'material=') {
            filterLink.href = filterLink.href.replace(/material=[^&]*/, '');
            console.log(filterLink.href);
            return;
        }
        if (filterLink.href.includes('?')) {
            filterLink.href = filterLink.href.includes('material') ? filterLink.href.replace(/material=[^&]*/, `${newLink}`) : filterLink.href + `&${newLink}`;
        } else {
            filterLink.href = filterLink.href.includes('material') ? filterLink.href.replace(/material=[^&]*/, `${newLink}`) : filterLink.href + `?${newLink}`;
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

// Price slider
const minValue = document.getElementById('min_value');
const maxValue = document.getElementById('max_value');

const rangeFill = document.getElementById('range_fill');

function validateRange() {
    let minPrice = parseInt(inputElements[0].value);
    let maxPrice = parseInt(inputElements[1].value);

    if (minPrice > maxPrice) {
        let tempValue = maxPrice;
        maxPrice = minPrice;
        minPrice = tempValue;
    }

    const minPercentage = ((minPrice - 100) / 699900) * 100;
    const maxPercentage = ((maxPrice - 100) / 699900) * 100;

    rangeFill.style.left = minPercentage + "%";
    rangeFill.style.width = maxPercentage - minPercentage + "%";

    minValue.innerHTML = minPrice + "&#8381;";
    maxValue.innerHTML = maxPrice + "&#8381;";
}

const inputElements = document.querySelectorAll('input[type="range"]');

inputElements.forEach((element) => {
    element.addEventListener("input", validateRange);
});

validateRange();
// Sorting
const sortingItems = document.querySelectorAll('.sorting-item');

sortingItems.forEach(item => {
    item.addEventListener('click', (event) => {
        event.preventDefault();
        let svg = item.querySelector('svg');
        if (svg) {
            svg.style.transform = svg.style.transform === 'rotate(180deg)' ? 'rotate(0deg)' : 'rotate(180deg)';
        }
        let newLink = `sort=${item.dataset.sortingType}%25${item.href.includes(`sort=${item.dataset.sortingType}%25desc`) ? 'asc' : 'desc'}`;
        if (location.href.includes('?')) {
            item.setAttribute('href', item.href.includes('sort') ? item.href.replace(/sort=[^&]*/, `${newLink}`) : item.href + `&${newLink}`);
        } else {
            item.setAttribute('href', item.href.includes('sort') ? item.href.replace(/sort=[^&]*/, `${newLink}`) : item.href + `?${newLink}`);
        }
        window.location.href = item.href;
    });
})
