var global = global || {};

global.performance_lab = {

    init: function () {
        this.laod_tablesorter();
    },

    laod_tablesorter: function () {
        $(document).ready(function(){
            $(".table-sorter").tablesorter();
        });
    }
}