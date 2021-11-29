<?= $this->extend('Indoor/TemplateIndoor/Content') ?>

<?= $this->section('sectioncontent') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="">
                    <ul class="nav nav-pills">
                    </ul>
                </div>
                <div id="chart" style="margin-left:30px; margin-right:30px;">
                    <div class="row d-flex align-items-stretch">
                        <?= $this->include('Indoor/TemplateIndoor/Range') ?>

                        <!-- start slider -->
                        <div class="slideshow-container">
                            <?php foreach ($theLastData as $lastData) : ?>
                                <div class="mySlides faded">
                                    <div class="col-sm-12 p-3">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h2 class=""><?= @$title . ' STASIUN ' . $lastData['station_id'] ?></h2>
                                                <div class="row bg-white">
                                                    <div class="col-sm-12">
                                                        <p style="font-size: 20px;"><b>ISPU <?= '(' . @$bantargerbangispu->waktu . ')' ?></b></p>
                                                        <canvas id="<?= $lastData['station_id'] ?>" width="100" height="100"></canvas>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <p style="font-size: 20px;"><b>DATA<?= '(' . @$bantargerbangdata->waktu . ')' ?></b></p>
                                                        <canvas id="bantargerbangdata" width="100" height="100"></canvas>
                                                        <table border="0" width="100%" style="margin-left: 22px; margin-top: -10px; font-size: 18px;">
                                                            <tr>

                                                                <td width="29" class="btn-secondary"><?= @$bantargerbangdata->pm10 ?></td>
                                                                <td width="1"></td>
                                                                <td width="29" class="btn-secondary"><?= @$bantargerbangdata->pm25 ?></td>
                                                                <td width="1"></td>
                                                                <td width="29" class="btn-secondary"><?= round(@$bantargerbangdata->so2 / 10) ?></td>
                                                                <td width="1"></td>
                                                                <td width="29" class="btn-secondary"><?= @$bantargerbangdata->co ?></td>
                                                                <td width="1"></td>
                                                                <td width="29" class="btn-secondary"><?= @$bantargerbangdata->o3 ?></td>
                                                                <td width="1"></td>
                                                                <td width="29" class="btn-secondary"><?= @$bantargerbangdata->no2 ?></td>
                                                                <td width="15"></td>
                                                            </tr>
                                                        </table><br>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <?php foreach ($aqmParams as $param) : ?>
                                                        <?php if ($param->station_id == $lastData['station_id']) : ?>
                                                            <div class="col-sm">
                                                                <div class="card bg-info">
                                                                    <p><?= $param->pname ?></p>
                                                                    <h1><?= $lastData['data'][$param->param] ?></h1> <?= $param->uname ?>
                                                                </div>
                                                            </div>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <div style="text-align:center">
                                <?php foreach ($theLastData as $lastData) : ?>
                                    <span class="dot"></span>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <!-- end slider -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('sectionjs') ?>
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" activeshow", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " activeshow";
        setTimeout(showSlides, 10000); // Change image every 2 seconds
    }
</script>

<?php foreach ($theLastData as $lastData) : ?>
    <script>
        $(function() {
            const data = [
                <?php foreach ($aqmParams as $param) : ?>
                    <?php if ($param->station_id == $lastData['station_id']) : ?>
                        <?= @$lastData['ispu'][$param->param] >= '350' ? '350' : @$lastData['ispu'][$param->param] ?>,
                    <?php endif ?>
                <?php endforeach ?>
            ];
            const colours = data.map((value) => value > 0 && value <= 50 ? '#28a745' : value > 50 && value <= 100 ? '#007bff' : value > 100 && value <= 200 ? '#ffc107' : value > 200 && value <= 300 ? '#dc3545' : value > 300 ? '#343a40' : 'purple');

            var color = Chart.helpers.color;
            var UserVsMyAppsData = {
                labels: [
                    <?php foreach ($aqmParams as $param) : ?>
                        <?php if ($param->station_id == $lastData['station_id']) : ?> "<?= $param->name ?>",
                        <?php endif ?>
                    <?php endforeach ?>
                ],
                datasets: [{
                    label: '# ISPU',
                    backgroundColor: colours,
                    borderColor: colours,
                    borderWidth: 1,
                    data: data
                }]

            };

            var UserVsMyAppsCtx = document.getElementById('<?= $lastData['station_id'] ?>').getContext('2d');
            var UserVsMyApps = new Chart(UserVsMyAppsCtx, {
                type: 'bar',
                data: UserVsMyAppsData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                        display: false,

                    },
                    "hover": {
                        "animationDuration": 0
                    },
                    "animation": {
                        "duration": 1,
                        "onComplete": function() {
                            var chartInstance = this.chart,
                                ctx = chartInstance.ctx;

                            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';

                            this.data.datasets.forEach(function(dataset, i) {
                                var meta = chartInstance.controller.getDatasetMeta(i);
                                meta.data.forEach(function(bar, index) {
                                    var data = dataset.data[index];
                                    ctx.fillText(data, bar._model.x, bar._model.y - 5);
                                });
                            });
                        }
                    },
                    title: {
                        display: false,
                        text: ''
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                suggestedMin: 0,
                                stepSize: 50,
                                suggestedMax: 350,
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 22
                            }
                        }]
                    }
                }
            });
        });
    </script>
<?php endforeach ?>
<?= $this->endSection() ?>