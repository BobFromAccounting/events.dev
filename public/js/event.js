(function () {
    'use strict';

    var app = angular.module("event", []);

    const TOKEN = $("meta[name=csrf-token]").attr("content");

    app.constant("CSRF_TOKEN", TOKEN);

    app.config(["$httpProvider", "CSRF_TOKEN", function($httpProvider, CSRF_TOKEN) {
        $httpProvider.defaults.headers.common["X-Csrf-Token"] = CSRF_TOKEN;
        $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    }]);

    app.filter('phpDate', function() {
    
        return function(input, format) {
            var date = moment.tz(input.date, input.timezone);

            if (format == "human") {
                return date.fromNow();
            } else {
                return date.format(format);
            }
        };
    });

    app.controller("EventsController", ["$http", "$log", "$scope", function($http, $log, $scope) {
        
    }]);
})();