(function() {
   'use strict';

    angular
        .module('app.cloud')
        .config(getRoutes);

    getRoutes.$inject = ['$stateProvider'];

    function getRoutes($stateProvider) {
      $stateProvider
        .state('clouds.cloud', {
          url: "/:cloudId",
          templateUrl: "build/views/cloud/cloud.html",
          controller: "Cloud",
          controllerAs: "vm"
        });
    }
})();