<h2>Biểu đồ bán hàng sản phẩm</h2>
<h4>Biểu đồ sản phẩm đồ nam</h4>
    <canvas id="productMenChart" width="2px" height="3px"></canvas>
<h4>Biểu đồ sản phẩm đồ nữ</h4>
<canvas id="productWonemChart" width="2px" height="3px"></canvas>
<h4>Biểu đồ sản phẩmm phụ kiện</h4>
<canvas id="productAccessoryChart" width="2px" height="3px"></canvas>
<h4>Biểu đồ sản phẩm đồ lưu niệm</h4>
<canvas id="productSouvenirsChart" width="2px" height="3px"></canvas>
<script>

    const dataFromPHP1 = <?= json_encode($productmen); ?>;
    const labels1 = dataFromPHP1.map(item => item.name_product); 
    const data1 = dataFromPHP1.map(item => item.sold_product);

    const dataFromPHP2 = <?= json_encode($productwomen); ?>;
    const labels2 = dataFromPHP2.map(item => item.name_product); 
    const data2 = dataFromPHP2.map(item => item.sold_product); 

    const dataFromPHP3 = <?= json_encode($productaccessory); ?>;
    const labels3 = dataFromPHP3.map(item => item.name_product); 
    const data3 = dataFromPHP3.map(item => item.sold_product); 

    const dataFromPHP4 = <?= json_encode($productsouvenirs); ?>;
    const labels4 = dataFromPHP4.map(item => item.name_product); 
    const data4 = dataFromPHP4.map(item => item.sold_product); 

    const ctx1 = document.getElementById('productMenChart');
    const ctx2 = document.getElementById('productWonemChart');
    const ctx3 = document.getElementById('productAccessoryChart');
    const ctx4 = document.getElementById('productSouvenirsChart');

    new Chart(ctx1, {
        type: "bar",
        data: {
            labels: labels1,
            datasets: [{
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                ],
            data: data1
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

        new Chart(ctx2, {
        type: "bar",
        data: {
            labels: labels2,
            datasets: [{
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                ],
            data: data2
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

        new Chart(ctx3, {
        type: "bar",
        data: {
            labels: labels3,
            datasets: [{
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                ],
            data: data3
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

        new Chart(ctx4, {
        type: "bar",
        data: {
            labels: labels4,
            datasets: [{
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                ],
            data: data4
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