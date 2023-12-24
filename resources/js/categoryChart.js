import Chart from 'chart.js/auto';
import axios from 'axios';

const response = await axios.get('/api/v1/categories')
    .then(response => response.data)
    .catch(error => console.log(error));

const ctx = document.getElementById("myChart");
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: response.data.map(category => category.name.charAt(0).toUpperCase() + category.name.slice(1)),
        datasets: [{
            label: 'Categories',
            data: response.data.map(category => category.artworks),
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(255, 159, 64)',
            ],
            hoverOffset: 4,
        }]
    },
    options: {
        plugins: {
            legend: {
                position: 'left',
            },
        },
    },
});
