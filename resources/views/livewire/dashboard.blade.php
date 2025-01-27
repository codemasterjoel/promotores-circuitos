 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Circuitos</p>
                    <h5 class="font-weight-bolder mb-0">{{$circuitos->count()}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Circuitos con Promotores</p>
                    <h5 class="font-weight-bolder mb-0">{{$cargados}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">MUJERES</p>
                    <h5 class="font-weight-bolder mb-0"> {{$promotores->where('genero', 2)->count()}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">HOMBRES</p>
                    <h5 class="font-weight-bolder mb-0">{{$promotores->where('genero', 1)->count()}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-4">
          <div class="card">
            <div class="card-body p-3">
              <h5 class=" font-bold text-uppercase">promotores por genero</h5>
              <div class="row">
                <div class="ms-auto text-center mt-5 mt-lg-0">
                  <div class=" border-radius-lg h-100">
                    <canvas id="genero"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-12">
                  <div class="d-flex flex-column h-100">
                    <p class="font-bold">PROMOTORES POR MISIONES</p>
                    <div class="row">
                      <div class="ms-auto text-center mt-5 mt-lg-0">
                        <div class=" border-radius-lg h-100">
                          <canvas id="misiones"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <h5 class="font-bold">PROMOTORES POR CIRCUITO</h5>
              <div class="row">
                <div class="ms-auto text-center mt-5 mt-lg-0">
                  <div class=" border-radius-lg h-100">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>PARROQUIA</th>
                          <th>CIRCUITO</th>
                          <th>PROMOTORES</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($promotoresxcircuito as $promotor)
                          <tr>
                            <td>{{$promotor->parroquias}}</td>
                            <td>{{$promotor->circuito}}</td>
                            <td>{{$promotor->promotores}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script type="text/javascript">
    var misiones = document.getElementById('misiones').getContext('2d');
    var myChartMisiones = new Chart(misiones, {
        type: 'bar',
        data: {
            labels: [
                @foreach ($promotoresxmisiones as $misiones)
                    "{{ $misiones->nombre }}",
                @endforeach
            ],
            datasets: [{
                label: 'PROMOTRES POR MISIONES',
                borderRadius: 4,
                borderWidth: 4,
                borderSkipped: false,
                data: [
                @foreach ($promotoresxmisiones as $misiones)
                  {{ $misiones->total }},
                @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(166, 101, 80, 0.2)',
                    'RGBA(78, 147, 191, 0.2)',
                    'RGBA(78,147,93, 0.2)',
                    'RGBA(78,146,159, 0.2)',
                    'RGBA(78,73,159, 0.2)',
                    'RGBA(78,171,24, 0.2)',
                    'RGBA(184,76,24, 0.2)',
                    'RGBA(184,76,255, 0.2)',
                    'RGBA(184,174,164, 0.2)',
                    'RGBA(245,174,164, 0.2)',
                    'RGBA(194,239,164, 0.2)',
                    'RGBA(255,0,0, 0.2)'
  
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(166, 101, 80, 1)',
                    'RGBA(78, 147, 191, 1)',
                    'RGBA(78,147,93, 1)',
                    'RGBA(78,146,159, 1)',
                    'RGBA(78,73,159, 1)',
                    'RGBA(78,171,24, 1)',
                    'RGBA(184,76,24, 1)',
                    'RGBA(184,76,255, 1)',
                    'RGBA(184,174,164, 1)',
                    'RGBA(245,174,164, 1)',
                    'RGBA(194,239,164, 1)',
                    'RGBA(255,0,0,1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
          scales: {
            x: {
                ticks: {
                    autoSkip: true,
                    crossAlign: 'center',
                }
            },
          },
          responsive: true,
          plugins: {
            datalabels:{
              align: 'end',
              anchor: 'end',
              font: function(context) {
                var w = context.chart.width;
                return {
                  size: w < 512 ? 12 : 14,
                  weight: 'bold',
                };
              },
              color: function(context) {
                  return context.dataset.borderColor;
              },
            },
            legend: {
              display: false,
              position: 'top',
            },
            title: {
              display: false,
              text: 'Chart.js Bar Chart'
            }
          }
        }
    });
  </script>

  <script type="text/javascript">
    var genero = document.getElementById('genero').getContext('2d');
    var myChartGenero = new Chart(genero, {
        type: 'doughnut',
        data: {
            labels: [
              "Femenina", "Masculino"
            ],
            datasets: [{
                label: 'INTEGRANTES POR ESTADO',
                borderRadius: Number.MAX_VALUE,
                borderWidth: 4,
                borderSkipped: false,
                data: ["{{$promotores->where('genero', 2)->count()}}", "{{$promotores->where('genero', 1)->count()}}"],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',

                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
          responsive: true,
          plugins: {
            datalabels:{
              align: 'end',
              anchor: 'end',
              font: function(context) {
                var w = context.chart.width;
                return {
                  size: w < 512 ? 12 : 14,
                  weight: 'bold',
                };
              },
              color: function(context) {
                  return context.dataset.borderColor;
              },
            },
            legend: {
              position: 'bottom',
            },
            title: {
              display: false,
              text: 'Chart.js Bar Chart'
            }
          }
        }
    });
  </script>