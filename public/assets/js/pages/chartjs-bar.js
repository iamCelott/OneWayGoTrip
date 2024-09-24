/**
 * Theme: Attex - Responsive Tailwind CSS 3 Admin Dashboard
 * Author: Coderthemes
 * Module/App: Chartjs Bar
 */

class ChartjsBar {

    constructor() {
        this.body = document.getElementsByTagName('body')[0]
        this.charts = [];
        this.defaultColors = ["#3e60d5", "#47ad77", "#fa5c7c", "#ffbc00"];
        Chart.defaults.font.family = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
        Chart.defaults.color = "#8391a2";
        Chart.defaults.scale.grid.color = "#8391a2";
    }

    initborderRadiusExample() {
        var chartElement = document.getElementById('border-radius-example');
        var dataColors = chartElement.getAttribute('data-colors');
        var colors = dataColors ? dataColors.split(",") : this.defaultColors;
        var ctx = chartElement.getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar', data: {
                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June'], datasets: [{
                    label: 'Fully Rounded',
                    data: [12, -19, 14, -15, 12, -14],
                    borderColor: colors[0],
                    backgroundColor: hexToRGB(colors[0], .3),
                    borderWidth: 2,
                    borderRadius: Number.MAX_VALUE,
                    borderSkipped: false,
                }, {
                    label: 'Small Radius',
                    data: [-10, 19, -15, -8, 12, -7],
                    backgroundColor: hexToRGB(colors[1], .3),
                    borderColor: colors[1],
                    borderWidth: 2,
                    borderRadius: 5,
                    borderSkipped: false,
                }]
            }, options: {
                responsive: true, maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false,

                        position: 'top',
                    },

                }, scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    }, y: {
                        grid: {
                            display: false
                        }
                    },
                }
            },
        });

        this.charts.push(chart);
    }


    initfloatingBarExample() {
        var chartElement = document.getElementById('floating-example');
        var dataColors = chartElement.getAttribute('data-colors');
        var colors = dataColors ? dataColors.split(",") : this.defaultColors
        var ctx = chartElement.getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar', data: {
                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June'], datasets: [{
                    label: 'Fully Rounded', data: [12, -19, 14, -15, 12, -14], backgroundColor: colors[0],
                }, {
                    label: 'Small Radius', data: [-10, 19, -15, -8, 12, -7], backgroundColor: colors[1],
                }]
            }, options: {
                responsive: true, maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false,

                        position: 'top',
                    },

                }, scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    }, y: {
                        grid: {
                            display: false
                        }
                    },
                }
            },
        });

        this.charts.push(chart)
    }

    inithorizontalExample() {
        var chartElement = document.getElementById('horizontal-example');
        var dataColors = chartElement.getAttribute('data-colors');
        var colors = dataColors ? dataColors.split(",") : this.defaultColors
        var ctx = chartElement.getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar', data: {
                labels: ['Jan', 'Feb', 'March', 'April'], datasets: [{
                    label: 'Fully Rounded',
                    data: [12, -19, 14, -15],
                    borderColor: colors[0],
                    backgroundColor: hexToRGB(colors[0], 0.3),
                    borderWidth: 1,
                }, {
                    label: 'Small Radius',
                    data: [-10, 19, -15, -8],
                    backgroundColor: hexToRGB(colors[1], 0.3),
                    borderColor: colors[1],
                    borderWidth: 1,
                }]
            }, options: {
                indexAxis: 'y', responsive: true, maintainAspectRatio: false, plugins: {
                    legend: {
                        display: false,

                        position: 'top',
                    },

                }, scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    }, y: {
                        grid: {
                            display: false
                        }
                    },
                }
            },
        });
        this.charts.push(chart)

    }

    initstackedExample() {
        var chartElement = document.getElementById('stacked-example');
        var dataColors = chartElement.getAttribute('data-colors');
        var colors = dataColors ? dataColors.split(",") : this.defaultColors
        var ctx = chartElement.getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar', data: {
                labels: ['Jan', 'Feb', 'March', 'April'], datasets: [{
                    label: 'Dataset 1', data: [12, -19, 14, -15], backgroundColor: colors[0],
                }, {
                    label: 'Dataset 2', data: [-10, 19, -15, -8], backgroundColor: colors[1],
                }, {
                    label: 'Dataset 3', data: [-10, 19, -15, -8], backgroundColor: colors[2],
                }]
            }, options: {
                responsive: true, maintainAspectRatio: false, plugins: {
                    legend: {
                        display: false,

                        position: 'top',
                    },

                }, scales: {
                    x: {
                        stacked: true,

                        grid: {
                            display: false
                        }
                    }, y: {
                        stacked: true,

                        grid: {
                            display: false
                        }
                    },
                }
            },
        });
        this.charts.push(chart)
    }

    initgroupStackedExample() {
        var chartElement = document.getElementById('group-stack-example');
        var dataColors = chartElement.getAttribute('data-colors');
        var colors = dataColors ? dataColors.split(",") : this.defaultColors
        var ctx = chartElement.getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar', data: {
                labels: ['Jan', 'Feb', 'March', 'April'], datasets: [{
                    label: 'Dataset 1', data: [12, -19, 14, -15], backgroundColor: colors[0], stack: 'Stack 0',

                }, {
                    label: 'Dataset 2', data: [-10, 19, -15, -8], backgroundColor: colors[1], stack: 'Stack 0',

                }, {
                    label: 'Dataset 3', data: [-10, 19, -15, -8], backgroundColor: colors[2], stack: 'Stack 1',

                }]
            }, options: {
                responsive: true, maintainAspectRatio: false, plugins: {
                    legend: {
                        display: false,

                        position: 'top',
                    },

                }, scales: {
                    x: {
                        stacked: true,

                        grid: {
                            display: false
                        }
                    }, y: {
                        stacked: true,

                        grid: {
                            display: false
                        }
                    },
                }
            },
        });
        this.charts.push(chart)
    }

    initverticalExample() {
        var chartElement = document.getElementById('vertical-example');
        var dataColors = chartElement.getAttribute('data-colors');
        var colors = dataColors ? dataColors.split(",") : this.defaultColors
        var ctx = chartElement.getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar', data: {
                labels: ['Jan', 'Feb', 'March', 'April'], datasets: [{
                    label: 'Dataset 1', data: [12, -19, 14, -15], backgroundColor: colors[0],

                }, {
                    label: 'Dataset 2', data: [-10, 19, -15, -8], backgroundColor: colors[1],

                }]
            }, options: {
                responsive: true, maintainAspectRatio: false, plugins: {
                    legend: {
                        display: false,

                        position: 'top',
                    },

                }, scales: {
                    x: {

                        grid: {
                            display: false
                        }
                    }, y: {

                        grid: {
                            display: false
                        }
                    },
                }
            },
        });
        this.charts.push(chart)
    }


    init() {
        this.initborderRadiusExample();
        this.initfloatingBarExample();
        this.inithorizontalExample();
        this.initstackedExample();
        this.initgroupStackedExample();
        this.initverticalExample();
    }

}

new ChartjsBar().init();

/* utility function */

function hexToRGB(hex, alpha) {
    var r = parseInt(hex.slice(1, 3), 16), g = parseInt(hex.slice(3, 5), 16), b = parseInt(hex.slice(5, 7), 16);

    if (alpha) {
        return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
    } else {
        return "rgb(" + r + ", " + g + ", " + b + ")";
    }
}