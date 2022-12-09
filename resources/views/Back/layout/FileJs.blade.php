<script>
    var xValues = ["مقالات", "کاربران", "کامنتهای دریافتی", "دسته بندی ها"];
    var yValues = [{{$article}}, {{$users}}, {{$comments}}, {{$categories}}];
    var barColors = ["red", "green","blue","orange","pink","black"];

    new Chart("myChart", {
        type: "bar",

        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "آمار کلی سایت"
            }
        }
    });
</script>
