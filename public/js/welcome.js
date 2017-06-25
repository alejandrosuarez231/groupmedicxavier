
$(function () {

    $.ajax({
        url: 'estadisticas/totalVisitorsAndPageViews',
        dataType: 'json',
    })
    .done(function(data) {
        var visitas = []
        var fechas = []
        var paginas = []
        var fecha
        visitas.push('Visitantes');
        paginas.push('Páginas');
        fechas.push('x');
        $.each(data, function(index, val) {
            paginas.push(val.pageViews)
            visitas.push(val.visitors);
            fecha = moment(val.date.date, 'YYYY-MM-DD');
            fecha = fecha.format('YYYY-M-D')
            fechas.push(fecha);
            
        });


        var chart = c3.generate({
            bindto: '#visitors',
            data: {
                type: 'spline',
                x: 'x',
                columns: [
                fechas,
                visitas,
                ]
            },
            axis: {
                x: {
                    type: 'timeseries',
                    tick: {
                        format: '%d-%m'
                    }
                }
            }
        });

        var chart = c3.generate({
            bindto: '#pageViews',
            data: {
                type: 'spline',
                x: 'x',
                columns: [
                fechas,
                paginas,
                ]
            },
            axis: {
                x: {
                    type: 'timeseries',
                    tick: {
                        format: '%d-%m'
                    }
                }
            }
        });
    })
    .fail(function() {
        console.log("error");
    })




});