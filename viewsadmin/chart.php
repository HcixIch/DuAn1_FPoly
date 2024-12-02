<h1>Biểu đồ bán hàng sản phẩm</h1>
    <canvas id="productChart" width="400" height="200"></canvas>

<script>
    const dataFromPHP = <?= json_encode($products); ?>;
    const labels = dataFromPHP.map(item => item.name_product); 
    const data = dataFromPHP.map(item => item.quantity_product); 
    const ctx = document.getElementById('productChart');
    new Chart(ctx, {
        type: "pie",
        data: {
            labels: labels,
            datasets: [{
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ],
            data: data
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Biểu đồ bán hàng sản phẩm"
                }
            }
        }
        });
</script>