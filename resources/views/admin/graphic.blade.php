@extends('admin.master_admin')
@section('title', 'Grafis')
@section('main-content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Grafis</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Grafis</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <!-- Bar chart -->
          <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    Total Pendaftar Anggota
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
              </div>

              <div class="card-body">
                  <div class="overlay-wrapper" id="bar-chart-by-month-loader">
                    <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Memuat ...</div></div>
                  </div>

                  <div id="bar-chart-by-month" style="height: 300px;">
                  </div>
              </div>
              <!-- /.card-body-->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <!-- Donut chart -->
        <div class="col-md-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Donut Chart
              </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <div id="donut-chart" style="height: 200px;"></div>
            </div>
          <!-- /.card-body-->
        </div>
      </div>

        <div class="col-md-6">
          <!-- Donut chart -->
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Top 5 Active User
              </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div id="donut-chart-b" style="height: 200px;"></div>
            </div>
            <!-- /.card-body-->
          </div>
        </div>
          <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('js-script')
  <script>
    function updateBarTotalRegistration(){
      let userMonth = [];
      $.ajax({
        type: "GET",
        url: "{{ route('admin.graphic.bar_users') }}",
        data: [],
        async: false,
        dataType: "JSON",
        success: function (response) {
          userMonth = response;
        }
      });

      var bar_data = {
        data: userMonth,
        bars: {
          show: true
        }
      }

      $.plot('#bar-chart-by-month', [bar_data], {
        grid: {
          borderWidth: 1,
          borderColor: '#f3f3f3',
          tickColor: '#f3f3f3'
        },
        series: {
          bars: {
            show: true,
            barWidth: 0.5,
            align: 'center',
          },
        },
        colors: ['#3c8dbc'],
        xaxis: {
          ticks: [
            [1, 'January'],
            [2, 'February'],
            [3, 'March'],
            [4, 'April'],
            [5, 'May'],
            [6, 'June'],
            [7, 'July'],
            [8, 'August'],
            [9, 'September'],
            [10, 'October'],
            [11, 'November'],
            [12, 'December']
          ]
        }
      });

      setTimeout(function(){
        $('#bar-chart-by-month-loader').addClass('sr-only');
      },1000);
    }

    $(function () {
      updateBarTotalRegistration();
      /*
      * DONUT CHART
      * -----------
      */

      var donutData = [{
          label: 'Product a',
          data: 30,
          color: '#3c8dbc'
        },
        {
          label: 'Product b',
          data: 20,
          color: '#0073b7'
        },
        {
          label: 'Product c',
          data: 50,
          color: '#00c0ef'
        },
        {
          label: 'Product d ',
          data: 50,
          color: '#00c0ef'
        },
        {
          label: 'Product e',
          data: 50,
          color: '#00c0ef'
        }
      ]
      $.plot('#donut-chart', donutData, {
        series: {
          pie: {
            show: true,
            radius: 1,
            innerRadius: 0.5,
            label: {
              show: true,
              radius: 2 / 3,
              formatter: labelFormatter,
              threshold: 0.1
            }

          }
        },
        legend: {
          show: false
        }
      })
      /*
       * END DONUT CHART
       */

      /*
       * DONUT CHART
       * -----------
       */

      var donutDatab = [{
          label: 'Iron Man',
          data: 30,
          color: '#3c8dbc'
        },
        {
          label: 'Wonder Woman',
          data: 20,
          color: '#0073b7'
        },
        {
          label: 'Thor',
          data: 50,
          color: '#00c0ef'
        },
        {
          label: 'Superman',
          data: 50,
          color: '#00c0ef'
        },
        {
          label: 'Batman',
          data: 50,
          color: '#00c0ef'
        }
      ]
      $.plot('#donut-chart-b', donutDatab, {
        series: {
          pie: {
            show: true,
            radius: 1,
            innerRadius: 0.2,
            label: {
              show: true,
              radius: 2 / 3,
              formatter: labelFormatterb,
              threshold: 0.1
            }

          }
        },
        legend: {
          show: false
        }
      })
      /*
       * END DONUT CHART
       */

    })


    /*
    * Custom Label formatter
    * ----------------------
    */
    function labelFormatter(label, series) {
      return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
        label +
        '<br>' +
        Math.round(series.percent) + '</div>'
    }

    /*
    * Custom Label formatter
    * ----------------------
    */
    function labelFormatterb(label, series) {
      return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
        label +
        '<br>' +
        'Total : ' + Math.round(series.percent) + ' item </div>'
    }
  </script>
  <!-- /.content -->
@endsection
