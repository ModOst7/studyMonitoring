$(document).ready(function(){
  window.scrollTo(0,0);
  function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

    $("#go").on('click', function() {
    $.ajax({
      url: "http://yaneho.hol.es/statistic/json"
    }).done(function(data){
      $('#chartDiv').empty();
      decodedData = JSON.parse(data);

      var groupQuality = [];
      var groupPerfomance = [];
      var groupLegend = [];

      var groupesData = decodedData[0]['groupes']['data'];
      for(var key in groupesData){
        groupQuality.push({
          value:"#groupes.data["+key+"].quality#",
                        item: {
                          radius: 0,
                          borderColor: "#aaaaaa",
                          color: "#bbbbbb"
                        },
                        line: {
                          color: getRandomColor(),
                          width: 2
                        },
                        tooltip: {
                          template: "#groupes.data["+key+"].quality#"
                        }
        });

        groupPerfomance.push({
          value:"#groupes.data["+key+"].academicPerfomance#",
                        item: {
                          radius: 0,
                          borderColor: "#aaaaaa",
                          color: "#bbbbbb"
                        },
                        line: {
                          color: getRandomColor(),
                          width: 2
                        },
                        tooltip: {
                          template: "#groupes.data["+key+"].academicPerfomance#"
                        }
        });

        groupLegend.push({text:decodedData[0].groupes.data[key].groupName});
      }


      webix.ui({
        container:"chartDiv",
        rows: [
            {
              cols:[
                  {
                    template: "<div style='font-weight:bold'>Качество знаний по курсам</div>",
                    height: 40
                  },
                  {
                    template: "<div style='font-weight:bold'>Успеваемость по курсам</div>",
                    height: 40
                  }
              ]
            },
            {
              cols:[
                {
                  view:"chart",
                  type:"line",
                  xAxis:{
                      template: function(value){
                        value.toString();
                        return value.date.slice(0,4);//.date.replace(/\d\d\.\d\d\./, "");
                        //return value;
                      }
                  },
                  yAxis:{
                      start:0,
                      end:100,
                      step:10,
                      title: "%"
                  },
                  offset:0,
                  preset: "plot",
                  legend:{
                      values:[{text:"1 курс"},{text:"2 курс"},{text:"3 курс"},{text:"4 курс"}],
                      align:"right",
                      valign:"middle",
                      layout:"y",
                      width: 100,
                      margin: 8,
                      marker:{
                          type: "item",
                        width: 18
                      }
                  },
                  series: [
                      {
                        value:"#courses.data[0].quality#",
                        item: {
                          radius: 0,
                          borderColor: "#aaaaaa",
                          color: "#bbbbbb"
                        },
                        line: {
                          color: "#990000",
                          width: 2
                        },
                        tooltip: {
                          template: "#courses.data[0].quality#"
                        }
                      },
                      {
                        value:"#courses.data[1].quality#",
                        item: {
                          radius: 0,
                          borderColor: "#aaaaaa",
                          color: "#990000"
                        },
                        line: {
                          color: "#009900",
                          width: 2
                        },
                        tooltip: {
                          template: "#courses.data[1].quality#"
                        }
                      },
                      {
                        value:"#courses.data[2].quality#",
                        item: {
                          radius: 0,
                          borderColor: "#aaaaaa",
                          color: "#990000"
                        },
                        line: {
                          color: "#000099",
                          width: 2
                        },
                        tooltip: {
                          template: "#courses.data[2].quality#"
                        }
                      },
                      {
                        value:"#courses.data[3].quality#",
                        item: {
                          radius: 0,
                          borderColor: "#aaaaaa",
                          color: "#990000"
                        },
                        line: {
                          color: "#000000",
                          width: 2
                        },
                        tooltip: {
                          template: "#courses.data[3].quality#"
                        }
                      }
                  ],
                  data: decodedData
                },
                {
              view:"chart",
              type:"line",
              xAxis:{
                  template: function(value){
                    value.toString();
                    return value.date.slice(0,4);
                    //return value;
                  }
              },
              yAxis:{
                  start:0,
                  end:100,
                  step:10,
                  title: "%"
              },
              offset:0,
              preset: "plot",
              legend:{
                  values:[{text:"1 курс"},{text:"2 курс"},{text:"3 курс"},{text:"4 курс"}],
                  align:"right",
                  valign:"middle",
                  layout:"y",
                  width: 100,
                  margin: 8,
                  marker:{
                      type: "item",
                    width: 18
                  }
              },
              series: [
                  {
                    value:"#courses.data[0].academicPerfomance#",
                    item: {
                      radius: 0,
                      borderColor: "#aaaaaa",
                      color: "#bbbbbb"
                    },
                    line: {
                      color: "#990000",
                      width: 2
                    },
                    tooltip: {
                      template: "#courses.data[0].academicPerfomance#"
                    }
                  },
                  {
                    value:"#courses.data[1].academicPerfomance#",
                    item: {
                      radius: 0,
                      borderColor: "#aaaaaa",
                      color: "#990000"
                    },
                    line: {
                      color: "#009900",
                      width: 2
                    },
                    tooltip: {
                      template: "#courses.data[1].academicPerfomance#"
                    }
                  },
                  {
                    value:"#courses.data[2].academicPerfomance#",
                    item: {
                      radius: 0,
                      borderColor: "#aaaaaa",
                      color: "#990000"
                    },
                    line: {
                      color: "#000099",
                      width: 2
                    },
                    tooltip: {
                      template: "#courses.data[2].academicPerfomance#"
                    }
                  },
                  {
                    value:"#courses.data[3].academicPerfomance#",
                    item: {
                      radius: 0,
                      borderColor: "#aaaaaa",
                      color: "#990000"
                    },
                    line: {
                      color: "#000000",
                      width: 2
                    },
                    tooltip: {
                      template: "#courses.data[3].academicPerfomance#"
                    }
                  }
              ],
              data: decodedData
            }
              ]
            },
            {
              cols:[
                  {
                    template: "<div style='font-weight:bold'>Качество знаний по специальностям</div>",
                    height: 40
                  },
                  {
                    template: "<div style='font-weight:bold'>Успеваемость по специальностям</div>",
                    height: 40
                  }
              ]
            },
            {
              cols:[
                {
                  view:"chart",
                  type:"line",
                  xAxis:{
                      template: function(value){
                        value.toString();
                        return value.date.slice(0,4);
                      }
                  },
                  yAxis:{
                      start:0,
                      end:100,
                      step:10,
                      title: "%"
                  },
                  offset:0,
                  preset: "plot",
                  legend:{
                      values:groupLegend,
                      align:"right",
                      valign:"middle",
                      layout:"y",
                      width: 100,
                      margin: 8,
                      marker:{
                          type: "item",
                        width: 18
                      }
                  },
                  series:groupQuality,
                  data: decodedData
                },
                {
              view:"chart",
              type:"line",
              xAxis:{
                  template: function(value){
                    value.toString();
                    return value.date.slice(0,4);
                    //return value;
                  }
              },
              yAxis:{
                  start:0,
                  end:100,
                  step:10,
                  title: "%"
              },
              offset:0,
              preset: "plot",
              legend:{
                  values:groupLegend,
                  align:"right",
                  valign:"middle",
                  layout:"y",
                  width: 100,
                  margin: 8,
                  marker:{
                      type: "item",
                    width: 18
                  }
              },
              series:groupPerfomance, 
              data: decodedData
            }
              ]
            }
            ]
        });
    })
  })
});
