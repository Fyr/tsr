/*------------------------------------------------------------------
 [Morrisjs  Trigger Js]

 Project     :	Fickle Responsive Admin Template
 Version     :	1.0
 Author      : 	AimMateTeam
 URL         :   http://aimmate.com
 Support     :   aimmateteam@gmail.com
 Primary use :   use on Morrisjs
 -------------------------------------------------------------------*/




jQuery(document).ready(function($) {
    'use strict';
    two_Line_graph();
});

var resizeIdMorris;
$(window).resize(function() {
    clearTimeout(resizeIdMorris);
    resizeIdMorris= setTimeout(doneResizingMorris, 600);

});
function doneResizingMorris(){
    $('#2LineGraph').html('');
    two_Line_graph();
}

var year_data = [
    {"period": "2012", "licensed": 3407, "sorned": 660},
    {"period": "2011", "licensed": 3351, "sorned": 629},
    {"period": "2010", "licensed": 3269, "sorned": 618},
    {"period": "2009", "licensed": 3246, "sorned": 661},
    {"period": "2008", "licensed": 3257, "sorned": 667},
    {"period": "2007", "licensed": 3248, "sorned": 627},
    {"period": "2006", "licensed": 3171, "sorned": 660},
    {"period": "2005", "licensed": 3171, "sorned": 676},
    {"period": "2004", "licensed": 3201, "sorned": 656},
    {"period": "2003", "licensed": 3215, "sorned": 622}
];
function two_Line_graph(){
    'use strict';

    Morris.Line({
        element: '2LineGraph',
        data: year_data,
        xkey: 'period',
        ykeys: ['licensed', 'sorned'],
        labels: ['Licensed', 'SORN'],
        lineColors: [$fillColor2, $redActive, $greenActive, $textColor],
        resize: true
    });
}
