<?= $this->renderSection('slide1') ?>
<div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="p-4 border-bottom bg-light">
                    <h4 class="card-title mb-0">Line Chart</h4>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center pb-4">
                      <h4 class="card-title mb-0">Sales Performance</h4>
                      <div id="line-traffic-legend"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <h2 class="mb-0 font-weight-medium">$5,341</h2>
                        <p class="mb-5 text-muted">Sales</p>
                      </div>
                      <div class="col-md-3">
                        <h2 class="mb-0 font-weight-medium">$1,334</h2>
                        <p class="mb-5 text-muted">Profits</p>
                      </div>
                    </div>
                    <canvas id="lineChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
<?= $this->endSection() ?>
