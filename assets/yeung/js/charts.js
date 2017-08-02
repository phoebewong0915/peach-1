 $(document).ready(function()
            {
            /*************************************************************************************************
              * @ TOTAL COUNT (ORIGINAL DASHBOARD)
              * @ GENDER CHART
              * @ LOGIN METHOD
              * @ LOGIN PROPORTATION
              * @ AP RANKING
              * @ VISIT REVISIT
              * @ USAGE INPUT OUTPUT
	      * @ I Love peach!!
            /*************************************************************************************************/
			
				 $( "#alert_container" ).fadeOut( 1000, function() {});

                $.ajax({
                url : "./../reporting/json_flush_gender_proportion/",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("ampie_gender", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"Precentage",
                        titleField:"Gender",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut Chart
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[Gender]]",
                    }
                    );
                } 
                });



                $.ajax({
                url : "./../reporting/json_flush_loginMethod_proportion",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("ampie_method", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"loginType_count",
                        titleField:"login_type",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut chat elements
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[login_type]]",
                    }
                    );
                } 
                });

                $.ajax({
                url : "./../reporting/json_flush_login_propotion",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("ampie_login", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"Precentage",
                        titleField:"Login_Status",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut chat elements
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[Login_Status]]",
                    }
                    );
                } 
                });



                $.ajax({
                url : "./../reporting/json_flush_topAP_Ranking",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("ambar_topAP", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"ap_mac_count",
                        titleField:"ap_mac",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut chat elements
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[ap_mac]]",
                    }
                    );
                } 
                });
                
                $.ajax({
                url : "./../reporting/json_flush_Usage_inout",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e= AmCharts.makeChart("ambar_inputOutput", {
                    type:"serial",
                    theme:"light",
                    color:"#888888",
                    dataProvider:response, 

                    valueAxes:[{axisAlpha: 0, position: "left"}],
                    
                    graphs:[ 
                    { bullet: "",bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] Sum:<b>[[value]]</b></span>", lineColorField: "lineColor", title: "Input", valueField: "input"},

                    { bullet: "", bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] Sum:<b>[[value]]</b></span>", lineColorField: "lineColor", title: "Output", valueField: "output"} ],
                    chartScrollbar: {},
                    chartCursor: {
                        categoryBalloonDateFormat: "YYYY MMM DD", cursorAlpha: 0, zoomable: !1
                    }
                    , dataDateFormat:"YYYY-MM-DD", categoryField:"Date", categoryAxis: {
                    dateFormats:[ {
                    period: "DD", format: "DD"
                    }
                    , {
                    period: "WW", format: "MMM DD"
                    }
                    , {
                    period: "MM", format: "MMM"
                    }
                    , {
                    period: "YYYY", format: "YYYY"
                    }
                    ], parseDates:!0, autoGridCount:!1, axisColor:"#555555", gridAlpha:0, gridCount:50}


                    });

                    AmCharts.checkEmptyData = function(e) {
                          if (0 == e.dataProvider.length) {
                            // set min/max on the value axis
                            e.valueAxes[0].minimum = 0;
                            e.valueAxes[0].maximum = 100;

                            // add dummy data point
                            var dataPoint = {
                              dummyValue: 0
                            };
                            dataPoint[e.categoryField] = '';
                            e.dataProvider = [dataPoint];

                            // add label
                            e.addLabel(0, '50%', 'The chart contains no data', 'center');

                            // set opacity of the chart div
                            e.chartDiv.style.opacity = 0.5;

                            // redraw it
                            e.validateNow();
                          }
                        }

                        AmCharts.checkEmptyData(e);

                }       
                });


                $.ajax({
                url : "./../reporting/json_flush_adv_count",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e= AmCharts.makeChart("ambar_adv_count", {
                        type:"serial", 
                        theme:"light",  
                        color:"#888", 
                        dataProvider:response, 
                        valueAxes:[ {
                            axisAlpha: 0, position: "left"
                        }
                        ], 
                        startDuration:1, 
                        graphs:[ {
                            alphaField: "alpha", balloonText: "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>", dashLengthField: "dashLengthColumn", fillAlphas: 1, title: "count", type: "column", valueField: "count"
                        }
                        
                        ], 
                        categoryField:"name", categoryAxis: {
                            gridPosition: "start",labelRotation: 45, axisAlpha: 0
                        }


                    });

                    AmCharts.checkEmptyData = function(e) {
                          if (0 == e.dataProvider.length) {
                            // set min/max on the value axis
                            e.valueAxes[0].minimum = 0;
                            e.valueAxes[0].maximum = 100;

                            // add dummy data point
                            var dataPoint = {
                              dummyValue: 0
                            };
                            dataPoint[e.categoryField] = '';
                            e.dataProvider = [dataPoint];

                            // add label
                            e.addLabel(0, '50%', 'The chart contains no data', 'center');

                            // set opacity of the chart div
                            e.chartDiv.style.opacity = 0.5;

                            // redraw it
                            e.validateNow();
                          }
                        }

                        AmCharts.checkEmptyData(e);

                }       
                });


                $.ajax({
                url : "./../reporting/json_flush_weekly_visit",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e= AmCharts.makeChart("amline_visitRevisit", {
                    type:"serial",
                    theme:"light",
                    color:"#888888",
                    dataProvider:response, 

                    valueAxes:[{axisAlpha: 0, position: "left"}],
                    
                    graphs:[ 
                    { bullet: "",bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>", lineColorField: "lineColor", title: "Total", valueField: "Total"},

                    { bullet: "", bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>", lineColorField: "lineColor", title: "newJoin", valueField: "newJoin"},

                    { bullet: "", bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>", lineColorField: "lineColor", title: "revisit", valueField: "revisit"} ],
                    chartScrollbar: {},
                    chartCursor: {
                        categoryBalloonDateFormat: "YYYY MMM DD", cursorAlpha: 0, zoomable: !1
                    }
                    , dataDateFormat:"YYYY-MM-DD", categoryField:"Date", categoryAxis: {
                    dateFormats:[ {
                    period: "DD", format: "DD"
                    }
                    , {
                    period: "WW", format: "MMM DD"
                    }
                    , {
                    period: "MM", format: "MMM"
                    }
                    , {
                    period: "YYYY", format: "YYYY"
                    }
                    ], parseDates:!0, autoGridCount:!1, axisColor:"#555555", gridAlpha:0, gridCount:50}


                    });

                    AmCharts.checkEmptyData = function(e) {
                          if (0 == e.dataProvider.length) {
                            // set min/max on the value axis
                            e.valueAxes[0].minimum = 0;
                            e.valueAxes[0].maximum = 100;

                            // add dummy data point
                            var dataPoint = {
                              dummyValue: 0
                            };
                            dataPoint[e.categoryField] = '';
                            e.dataProvider = [dataPoint];

                            // add label
                            e.addLabel(0, '50%', 'The chart contains no data', 'center');

                            // set opacity of the chart div
                            e.chartDiv.style.opacity = 0.5;

                            // redraw it
                            e.validateNow();
                          }
                        }

                        AmCharts.checkEmptyData(e);

                }       
                });


            /*************************************************************************************************
              * @ 1 DATY COUNT 
              * @ GENDER CHART
              * @ LOGIN METHOD
              * @ LOGIN PROPORTATION
              * @ AP RANKING
              * @ VISIT REVISIT
              * @ USAGE INPUT OUTPUT
            /*************************************************************************************************/
            

                $.ajax({
                url : "./../reporting/json_flush_daily_gender",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("1day_gender", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"Precentage",
                        titleField:"Gender",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut Chart
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[Gender]]",
                    }
                    );

                        }


                });

                $.ajax({
                url : "./../reporting/json_flush_daily_loginMethod",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("1day_loginMethod", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"loginType_count",
                        titleField:"login_type",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut chat elements
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[login_type]]",
                    }
                    );

                } 
                });

                $.ajax({
                url : "./../reporting/json_flush_daily_login",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("1day_login", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"Precentage",
                        titleField:"Login_Status",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut chat elements
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[Login_Status]]",
                    }
                    );

                } 
                });

                $.ajax({
                url : "./../reporting/json_flush_topAP_Ranking_daily",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("1day_topAP", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"ap_mac_count",
                        titleField:"ap_mac",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut chat elements
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[ap_mac]]",
                    }
                    );
                } 
                });

                $.ajax({
                url : "./../reporting/json_flush_Usage_inout_daily",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e= AmCharts.makeChart("1day_inputOutput", {
                    type:"serial",
                    theme:"light",
                    color:"#888888",
                    dataProvider:response, 

                    valueAxes:[{axisAlpha: 0, position: "left"}],
                    
                    graphs:[ 
                    { bullet: "",bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] Sum:<b>[[value]]</b></span>", lineColorField: "lineColor", title: "Input", valueField: "input"},

                    { bullet: "", bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] Sum:<b>[[value]]</b></span>", lineColorField: "lineColor", title: "Output", valueField: "output"} ],
                    chartScrollbar: {},
                    chartCursor: {
                        categoryBalloonDateFormat: "YYYY MMM DD", cursorAlpha: 0, zoomable: !1
                    }
                    , dataDateFormat:"YYYY-MM-DD", categoryField:"Date", categoryAxis: {
                    dateFormats:[ {
                    period: "DD", format: "DD"
                    }
                    , {
                    period: "WW", format: "MMM DD"
                    }
                    , {
                    period: "MM", format: "MMM"
                    }
                    , {
                    period: "YYYY", format: "YYYY"
                    }
                    ], parseDates:!0, autoGridCount:!1, axisColor:"#555555", gridAlpha:0, gridCount:50}


                    });

                    AmCharts.checkEmptyData = function(e) {
                          if (0 == e.dataProvider.length) {
                            // set min/max on the value axis
                            e.valueAxes[0].minimum = 0;
                            e.valueAxes[0].maximum = 100;

                            // add dummy data point
                            var dataPoint = {
                              dummyValue: 0
                            };
                            dataPoint[e.categoryField] = '';
                            e.dataProvider = [dataPoint];

                            // add label
                            e.addLabel(0, '50%', 'The chart contains no data', 'center');

                            // set opacity of the chart div
                            e.chartDiv.style.opacity = 0.5;

                            // redraw it
                            e.validateNow();
                          }
                        }

                        AmCharts.checkEmptyData(e);

                }       
                });

                $.ajax({
                url : "./../reporting/json_flush_Daily_visit",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e= AmCharts.makeChart("1day_visitRevisit", {
                    type:"serial",
                    theme:"light",
                    color:"#888888",
                    dataProvider:response, 

                    valueAxes:[{axisAlpha: 0, position: "left"}],
                    
                    graphs:[ 
                    { bullet: "",bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>", lineColorField: "lineColor", title: "Total", valueField: "Total"},

                    { bullet: "", bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>", lineColorField: "lineColor", title: "newJoin", valueField: "newJoin"},

                    { bullet: "", bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>", lineColorField: "lineColor", title: "revisit", valueField: "revisit"} ],
                    chartScrollbar: {},
                    chartCursor: {
                        categoryBalloonDateFormat: "YYYY MMM DD", cursorAlpha: 0, zoomable: !1
                    }
                    , dataDateFormat:"YYYY-MM-DD", categoryField:"Date", categoryAxis: {
                    dateFormats:[ {
                    period: "DD", format: "DD"
                    }
                    , {
                    period: "WW", format: "MMM DD"
                    }
                    , {
                    period: "MM", format: "MMM"
                    }
                    , {
                    period: "YYYY", format: "YYYY"
                    }
                    ], parseDates:!0, autoGridCount:!1, axisColor:"#555555", gridAlpha:0, gridCount:50}


                    });

                    AmCharts.checkEmptyData = function(e) {
                          if (0 == e.dataProvider.length) {
                            // set min/max on the value axis
                            e.valueAxes[0].minimum = 0;
                            e.valueAxes[0].maximum = 100;

                            // add dummy data point
                            var dataPoint = {
                              dummyValue: 0
                            };
                            dataPoint[e.categoryField] = '';
                            e.dataProvider = [dataPoint];

                            // add label
                            e.addLabel(0, '50%', 'The chart contains no data', 'center');

                            // set opacity of the chart div
                            e.chartDiv.style.opacity = 0.5;

                            // redraw it
                            e.validateNow();
                          }
                        }

                        AmCharts.checkEmptyData(e);

                }       
                });


            /*************************************************************************************************
              * @ 7 DATY COUNT 
              * @ GENDER CHART
              * @ LOGIN METHOD
              * @ LOGIN PROPORTATION
              * @ AP RANKING
              * @ VISIT REVISIT
              * @ USAGE INPUT OUTPUT
            /*************************************************************************************************/

                $.ajax({
                url : "./../reporting/json_flush_weekly_gender",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("7day_gender", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"Precentage",
                        titleField:"Gender",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut Chart
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[Gender]]",
                    }
                    );
                } 
                });

                $.ajax({
                url : "./../reporting/json_flush_weekly_loginMethod",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("7day_loginMethod", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"loginType_count",
                        titleField:"login_type",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut chat elements
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[login_type]]",
                    }
                    );
                } 
                });

                $.ajax({
                url : "./../reporting/json_flush_weekly_login",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("7day_login", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"Precentage",
                        titleField:"Login_Status",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut chat elements
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[Login_Status]]",
                    }
                    );
                } 
                });

                $.ajax({
                url : "./../reporting/json_flush_topAP_Ranking_weekly",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("7day_topAP", {
                        type:"pie",
                        theme:"light",
                        dataProvider:response,
                        valueField:"ap_mac_count",
                        titleField:"ap_mac",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut chat elements
                        labelRadius: 5,
                        radius: "36%",
                        innerRadius: "60%",
                        labelText: "[[ap_mac]]",
                    }
                    );
                } 
                });

                $.ajax({
                url : "./../reporting/json_flush_Usage_inout_weekly",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e= AmCharts.makeChart("7day_inputOutput", {
                    type:"serial",
                    theme:"light",
                    color:"#888888",
                    dataProvider:response, 

                    valueAxes:[{axisAlpha: 0, position: "left"}],
                    
                    graphs:[ 
                    { bullet: "",bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] Sum:<b>[[value]]</b></span>", lineColorField: "lineColor", title: "Input", valueField: "input"},

                    { bullet: "", bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] Sum:<b>[[value]]</b></span>", lineColorField: "lineColor", title: "Output", valueField: "output"} ],
                    chartScrollbar: {},
                    chartCursor: {
                        categoryBalloonDateFormat: "YYYY MMM DD", cursorAlpha: 0, zoomable: !1
                    }
                    , dataDateFormat:"YYYY-MM-DD", categoryField:"Date", categoryAxis: {
                    dateFormats:[ {
                    period: "DD", format: "DD"
                    }
                    , {
                    period: "WW", format: "MMM DD"
                    }
                    , {
                    period: "MM", format: "MMM"
                    }
                    , {
                    period: "YYYY", format: "YYYY"
                    }
                    ], parseDates:!0, autoGridCount:!1, axisColor:"#555555", gridAlpha:0, gridCount:50}


                    });

                    AmCharts.checkEmptyData = function(e) {
                          if (0 == e.dataProvider.length) {
                            // set min/max on the value axis
                            e.valueAxes[0].minimum = 0;
                            e.valueAxes[0].maximum = 100;

                            // add dummy data point
                            var dataPoint = {
                              dummyValue: 0
                            };
                            dataPoint[e.categoryField] = '';
                            e.dataProvider = [dataPoint];

                            // add label
                            e.addLabel(0, '50%', 'The chart contains no data', 'center');

                            // set opacity of the chart div
                            e.chartDiv.style.opacity = 0.5;

                            // redraw it
                            e.validateNow();
                          }
                        }

                        AmCharts.checkEmptyData(e);

                }       
                });

                $.ajax({
                url : "./../reporting/json_flush_week_visit",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e= AmCharts.makeChart("7day_visitRevisit", {
                    type:"serial",
                    theme:"light",
                    color:"#888888",
                    dataProvider:response, 

                    valueAxes:[{axisAlpha: 0, position: "left"}],
                    
                    graphs:[ 
                    { bullet: "",bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>", lineColorField: "lineColor", title: "Total", valueField: "Total"},

                    { bullet: "", bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>", lineColorField: "lineColor", title: "newJoin", valueField: "newJoin"},

                    { bullet: "", bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]",balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>", lineColorField: "lineColor", title: "revisit", valueField: "revisit"} ],
                    chartScrollbar: {},
                    chartCursor: {
                        categoryBalloonDateFormat: "YYYY MMM DD", cursorAlpha: 0, zoomable: !1
                    }
                    , dataDateFormat:"YYYY-MM-DD", categoryField:"Date", categoryAxis: {
                    dateFormats:[ {
                    period: "DD", format: "DD"
                    }
                    , {
                    period: "WW", format: "MMM DD"
                    }
                    , {
                    period: "MM", format: "MMM"
                    }
                    , {
                    period: "YYYY", format: "YYYY"
                    }
                    ], parseDates:!0, autoGridCount:!1, axisColor:"#555555", gridAlpha:0, gridCount:50}


                    });

                    AmCharts.checkEmptyData = function(e) {
                          if (0 == e.dataProvider.length) {
                            // set min/max on the value axis
                            e.valueAxes[0].minimum = 0;
                            e.valueAxes[0].maximum = 100;

                            // add dummy data point
                            var dataPoint = {
                              dummyValue: 0
                            };
                            dataPoint[e.categoryField] = '';
                            e.dataProvider = [dataPoint];

                            // add label
                            e.addLabel(0, '50%', 'The chart contains no data', 'center');

                            // set opacity of the chart div
                            e.chartDiv.style.opacity = 0.5;

                            // redraw it
                            e.validateNow();
                          }
                        }

                        AmCharts.checkEmptyData(e);

                }       
                });


            /*************************************************************************************************
              * @ 30 DATY COUNT  (NEW DASHBOARD)
              * @ GENDER CHART
              * @ LOGIN METHOD
              * @ LOGIN PROPORTATION
              * @ AP RANKING
              * @ VISIT REVISIT
              * @ USAGE INPUT OUTPUT
            /*************************************************************************************************/
               


                $.ajax({
                url : "./../reporting/json_flush_monthly_gender",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("30day_gender", {
                        type:"pie",
                        theme:"light",
                        marginRight: 40,
                        marginLeft: 40,
                        dataProvider:response,
                        valueField:"Precentage",
                        titleField:"Gender",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut Chart
                        labelRadius: 5,
                        radius: "28%",
                        innerRadius: "60%",
                        labelText: "[[Gender]]",
                    }
                    );
                } 
                });

                $.ajax({
                url : "./../reporting/json_flush_monthly_loginMethod",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("30day_loginMethod", {
                        "type": "serial",
                        "theme": "light",
                        "dataProvider": response,
                        "valueAxes": [{
                            "minimum": 0,
                            "axisAlpha": 0,
                            "position": "left"
                        }],
                        "startDuration": 1,
                        "graphs": [{
                            "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
                            "bulletOffset": 10,
                            "bulletSize": 52,
                            "colorField": "color",
                            "cornerRadiusTop": 8,
                            "customBulletField": "bullet",
                            "fillAlphas": 0.8,
                            "lineAlpha": 0,
                            "type": "column",
                            "valueField": "loginType_count"
                        }],
                        "marginTop": 40,
                        "marginRight": 40,
                        "marginLeft": 40,
                        "marginBottom": 40,
                        "autoMargins": false,
                        "categoryField": "login_type",
                        "categoryAxis": {
                            "axisAlpha": 0,
                            "gridAlpha": 0,
                            "inside": true,
                            "tickLength": 0
                        },
                        "export": {
                            "enabled": true
                         }

                    }
                    );

                    AmCharts.checkEmptyData = function(e) {
                          if (0 == e.dataProvider.length) {
                            // set min/max on the value axis
                            e.valueAxes[0].minimum = 0;
                            e.valueAxes[0].maximum = 100;

                            // add dummy data point
                            var dataPoint = {
                              dummyValue: 0
                            };
                            dataPoint[e.categoryField] = '';
                            e.dataProvider = [dataPoint];

                            // add label
                            e.addLabel(0, '50%', 'The chart contains no data', 'center');

                            // set opacity of the chart div
                            e.chartDiv.style.opacity = 0.5;

                            // redraw it
                            e.validateNow();
                          }
                        }

                        AmCharts.checkEmptyData(e);
                } 
                });

                $.ajax({
                url : "./../reporting/json_flush_monthly_login",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("30day_login", {
                        type:"pie",
                        theme:"light",
                        marginRight: 40,
                        marginLeft: 40,
                        dataProvider:response,
                        valueField:"Precentage",
                        titleField:"Login_Status",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut chat elements
                        labelRadius: 5,
                        radius: "28%",
                        innerRadius: "60%",
                        labelText: "[[Login_Status]]",
                    }
                    );
                } 
                });

                $.ajax({
                url : "./../reporting/json_flush_topAP_Ranking_monthly",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e=AmCharts.makeChart("30day_topAP", {
                        type:"pie",
                        theme:"light",
                        marginRight: 40,
                        marginLeft: 40,
                        dataProvider:response,
                        valueField:"ap_mac_count",
                        titleField:"ap_mac",
                        //outlineAlpha: 0.4,
                        //depth3D: 15,
                        //angle: 30,
                        //Donut chat elements
                        labelRadius: 5,
                        radius: "28%",
                        innerRadius: "60%",
                        labelText: "[[ap_mac]]",
                    }
                    );
                } 
                });


                 $.ajax({
                url : "./../reporting/json_flush_Usage_inout_monthly",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e= AmCharts.makeChart("30day_inputOutput", {
                            "type": "serial",
                            "theme": "light",
                            "marginRight": 40,
                            "marginLeft": 50,
                            "mouseWheelZoomEnabled":false,
                            "dataDateFormat": "YYYY-MM-DD",
                            "valueAxes": [{
                                "axisAlpha": 0,
                                "position": "left",
                                "ignoreAxisWidth":true,
                                "labelFunction": function(value) {
                                  return Math.abs(value);
                                }
                            }],
                            graphs: [{
                                bullet: "",
                                bulletBorderAlpha: 1,
                                bulletColor: "#FFFFFF",
                                bulletSize: 5,
                                hideBulletsCount: 50,
                                lineThickness: 2,
                                title: "Input",
                                useLineColorForBulletBorder: true,
                                valueField: "input",
                                balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>",
                                "balloonFunction": function(item) {
                                  return "Input" + ": " + Math.abs(item.values.value) + "MB";
                                }
                            },
                            {
                                bullet: "",
                                bulletBorderAlpha: 1,
                                bulletColor: "#FFFFFF",
                                bulletSize: 5,
                                hideBulletsCount: 50,
                                lineThickness: 2,
                                title: "Output",
                                useLineColorForBulletBorder: true,
                                valueField: "output",
                                balloonText: "<span style='font-size:10px;'>[[title]] :[[value]]MB</span>",
                            }
                            ],
                            "chartCursor": {
                                "pan": true,
                                "valueLineEnabled": true,
                                "valueLineBalloonEnabled": true,
                                "cursorAlpha":1,
                                "cursorColor":"#258cbb",
                                "limitToGraph":"g1",
                                "valueLineAlpha":0.2,
                                "valueZoomable":true
                            },
                            "valueScrollbar":{
                              
                            },
                            categoryField:"Date",
                            "categoryAxis": {
                                "parseDates": true,
                                "dashLength": 1,
                                "minorGridEnabled": true
                            },
                            "export": {
                                "enabled": true
                            },
                            "dataProvider":response

                    });

                    AmCharts.checkEmptyData = function(e) {
                          if (0 == e.dataProvider.length) {
                            // set min/max on the value axis
                            e.valueAxes[0].minimum = 0;
                            e.valueAxes[0].maximum = 100;

                            // add dummy data point
                            var dataPoint = {
                              dummyValue: 0
                            };
                            dataPoint[e.categoryField] = '';
                            e.dataProvider = [dataPoint];

                            // add label
                            e.addLabel(0, '50%', 'The chart contains no data', 'center');

                            // set opacity of the chart div
                            e.chartDiv.style.opacity = 0.5;

                            // redraw it
                            e.validateNow();
                          }
                        }

                        AmCharts.checkEmptyData(e);

                }       
                });


                $.ajax({
                url : "./../reporting/json_flush_monthly_visit",
                cache : false,
                dataType: 'json',
                success : function(response){
                    var e= AmCharts.makeChart("30day_visitRevisit", {
                            "type": "serial",
                            "theme": "light",
                            "marginRight": 40,
                            "marginLeft": 40,
                            "mouseWheelZoomEnabled":false,
                            "dataDateFormat": "YYYY-MM-DD",
                            "valueAxes": [{
                                "axisAlpha": 0,
                                "position": "left",
                                "ignoreAxisWidth":true
                            }],
                            graphs: [{
                                bullet: "",
                                bulletBorderAlpha: 1,
                                bulletColor: "#FFFFFF",
                                bulletSize: 5,
                                hideBulletsCount: 50,
                                lineThickness: 2,
                                title: "Total",
                                useLineColorForBulletBorder: true,
                                valueField: "Total",
                                balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>"
                            },
                            {
                                bullet: "",
                                bulletBorderAlpha: 1,
                                bulletColor: "#FFFFFF",
                                bulletSize: 5,
                                hideBulletsCount: 50,
                                lineThickness: 2,
                                title: "newJoin",
                                useLineColorForBulletBorder: true,
                                valueField: "newJoin",
                                balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>"
                            },
                            {
                                bullet: "",
                                bulletBorderAlpha: 1,
                                bulletColor: "#FFFFFF",
                                bulletSize: 5,
                                hideBulletsCount: 50,
                                lineThickness: 2,
                                title: "revisit",
                                useLineColorForBulletBorder: true,
                                valueField: "revisit",
                                balloonText: "<span style='font-size:10px;'>[[title]] :<b>[[value]]</b></span>"
                            }
                            ],
                            "chartCursor": {
                                "pan": true,
                                "valueLineEnabled": true,
                                "valueLineBalloonEnabled": true,
                                "cursorAlpha":1,
                                "cursorColor":"#258cbb",
                                "limitToGraph":"g1",
                                "valueLineAlpha":0.2,
                                "valueZoomable":true
                            },
                            "valueScrollbar":{
                              
                            },
                            categoryField:"Date",
                            "categoryAxis": {
                                "parseDates": true,
                                "dashLength": 1,
                                "minorGridEnabled": true
                            },
                            "export": {
                                "enabled": true
                            },
                            "dataProvider":response

                    });

                    AmCharts.checkEmptyData = function(e) {
                          if (0 == e.dataProvider.length) {
                            // set min/max on the value axis
                            e.valueAxes[0].minimum = 0;
                            e.valueAxes[0].maximum = 100;

                            // add dummy data point
                            var dataPoint = {
                              dummyValue: 0
                            };
                            dataPoint[e.categoryField] = '';
                            e.dataProvider = [dataPoint];

                            // add label
                            e.addLabel(0, '50%', 'The chart contains no data', 'center');

                            // set opacity of the chart div
                            e.chartDiv.style.opacity = 0.5;

                            // redraw it
                            e.validateNow();
                          }
                        }

                        AmCharts.checkEmptyData(e);


                }     
                });



                

});
